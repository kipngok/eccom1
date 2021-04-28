<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Make;
use App\Models\User;
use App\Models\SpareRequest;
use Illuminate\Http\Request;
use Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners=Banner::all();
        $products=Product::all();
        return view('frontend.homepage', compact('banners','products'));
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function help(){
        return view('frontend.help');
    }
    public function return(){
        return view('frontend.return');
    }
    public function terms(){
        return view('frontend.terms');
    }
    public function about(){
        return view('frontend.about');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function welcome()
    {
        //
         $sliders=Banner::where('location','=','slider')->where('status','=','Active')->orderBy('created_at','desc')->take(4)->get();
         $thumbBanners=Banner::where('location','=','Thumbnail Banner')->where('status','=','Active')->orderBy('created_at','desc')->take(3)->get();
         $stretchBanner=Banner::where('location','=','Stretch Banner')->where('status','=','Active')->orderBy('created_at','desc')->first();
         $newProducts=Product::orderBy('created_at','desc')->take(25)->get();
         $featuredProducts=Product::where('featured','=','1')->orderBy('created_at','desc')->take(25)->get();
         $featuredMakes=Make::where('is_featured','=','1')->get();
         $categories=Category::all();
         return view('welcome',compact('sliders', 'thumbBanners', 'newProducts', 'featuredProducts', 'featuredMakes','categories','stretchBanner'));
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singleProduct($slug)
    {
        //
        $product=Product::where('slug','=',$slug)->first();
        if(!isset($product)){abort(404);}
        $categories=Category::all();
        $similarProducts = Product::where('sub_category_id','=',$product->sub_category_id)->orderBy('created_at','desc')->take(16)->get();
        $reviews=$product->reviews()->orderBy('created_at','desc')->paginate(3);
        $sideBanner=Banner::where('location','=','Side Menu Banner')->where('status','=','Active')->orderBy('created_at','desc')->first();
        return view('frontend.singleproduct', compact('similarProducts','product','categories','reviews','sideBanner'));
    }


    public function category($slug){
    
        $subCategory=SubCategory::where('slug','=',$slug)->first();
        if(!isset($subCategory)){abort(404);}
        $products= Product::where('sub_category_id','=',$subCategory->id)->paginate(21);
        $categories=Category::all();
        $makes=Make::all();
        $sideBanner=Banner::where('location','=','Side Menu Banner')->where('status','=','Active')->orderBy('created_at','desc')->first();
        return view('frontend.shoppage', compact('products','categories','sideBanner','makes'));
    }

    public function filter(Request $request){
        $input=$request->all();
        $make_id=$input['make_id'];
        $model_id=$input['model_id'];
        $year=$input['year'];
        $engine=$input['engine'];

        $products= Product::when($make_id, function ($query, $make_id) {
                                    return $query->where('make_id', '=', $make_id);
                                })
                            ->when($model_id, function ($query, $model_id) {
                                    return $query->where('model_id', '=', $model_id);
                                })
                            ->when($year, function ($query, $year) {
                                    return $query->where('year', '=', $year);
                                })
                            ->when($engine, function ($query, $engine) {
                                    return $query->where('engine', '=', $engine);
                                })
                            ->paginate(21);
        $categories=Category::all();
        $makes=Make::all();
        $sideBanner=Banner::where('location','=','Side Menu Banner')->where('status','=','Active')->orderBy('created_at','desc')->first();
        return view('frontend.shoppage', compact('products','categories','sideBanner','makes'));
    }

    public function shop(){
    
        $products= Product::paginate(16);
        $categories=Category::all();
        $makes=Make::all();
        $sideBanner=Banner::where('location','=','Side Menu Banner')->where('status','=','Active')->orderBy('created_at','desc')->first();
        return view('frontend.shoppage', compact('products','categories','sideBanner','makes'));
    }


    public function search(Request $request){
    
        $input=$request->all();
        $category_id=$input['category_id'];
        $products= Product::where('name','LIKE','%'.$input['query'].'%')
                            ->when($category_id, function ($query, $category_id) {
                                    return $query->where('category_id', '=', $category_id);
                                })
                            ->limit(30)->get();
        $categories=Category::all();
        $makes=Make::all();
        $sideBanner=Banner::where('location','=','Side Menu Banner')->where('status','=','Active')->orderBy('created_at','desc')->first();
        return view('frontend.shoppage', compact('products','categories','sideBanner','makes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function requestSpare()
    {
        $makes=Make::all();
        $categories=Category::all();
        return view('frontend.spareRequest',compact('makes','categories'));
    }

    public function storeSpareRequest(Request $request){
        $this->validate(request(),[
        'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'email'=>'required',
        'phone'=>'required',
        'notes'=>'required',
        'make_id'=>'required',
        'model_id'=>'required',
        'sub_category_id'=>'required',
        'category_id'=>'required'
        ]);

        if(isset($input['photo'])){$product->addMediaFromRequest('photo')->toMediaCollection('spareRequests');}
        $input=$request->all();
        $user=User::where('email','=',$input['email'])->first();
        if(Auth::user()){
            $input['user_id']=Auth::user()->id;
        }
        elseif(isset($user)){
            $input['user_id']=$user->id;
        }
        $input['status']='Pending';
        $spareRequest=SpareRequest::create($input);
        return redirect('/requestSpare')->with('status','Your application was saved successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
