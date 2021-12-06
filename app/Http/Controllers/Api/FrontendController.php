<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Make;
use App\Models\VehicleModel;
use App\Models\User;
use App\Models\SpareRequest;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ReveiwResource;
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
      
        $products=Product::orderBy('created_at','desc')->paginate(6);
         return response(['products' => ProductResource::collection($products), 'message' => 'Retrieved successfully']);
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

    public function newproduct(){
         $newProducts=Product::orderBy('created_at','desc')->take(8)->get();
         return response(['products' => ProductResource::collection($newProducts), 'message' => 'Retrieved successfully']);
    }
    public function featuredproduct(){
         $newProducts=Product::where('featured','=','1')->orderBy('created_at','asc')->take(8)->get();
         return response(['products' => ProductResource::collection($newProducts), 'message' => 'Retrieved successfully']);
    }
     public function thumbBanner(){
        $thumbBanners=Banner::where('location','=','Thumbnail Banner')->where('status','=','Active')->orderBy('created_at','desc')->take(3)->get();
         return response()->json($thumbBanners);
    }
    public function featuredMakes(){
        $featuredProducts=Product::where('featured','=','1')->orderBy('created_at','desc')->take(25)->get();
         return response()->json($featuredProducts);
    }
    public function categories(){
        $categories=Category::all();
         return response()->json($categories);
    }
   public function singleProduct($id){
    $product=Product::find($id);
    $similarProducts = Product::where('sub_category_id','=',$product->sub_category_id)->orderBy('created_at','desc')->take(6)->get();
    $reviews=$product->reviews()->orderBy('created_at','desc')->paginate(3);
    return response(['product' => new ProductResource($product), 'similarProducts' => ProductResource::collection($similarProducts),'reviews'=>ReveiwResource::collection($reviews), 'message' => 'Retrieved successfully']);
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
    //  */
    public function filterMake(){
         $categories=Category::all();
         $makes=Make::orderBy('order','asc')->get();
         $categoryD=array();
         foreach($categories as $category){
            $categoryD[$category->id]=$category->name;
         }

         $makeD=array();
         foreach($makes as $make){
            $makeD[$make->id]=$make->name;
         }
        return response(['makes' => $makeD, 'categories' => $categoryD, 'message' => 'Retrieved successfully']);
    }
    public function filterSubCategories($id){
        $subCategories=SubCategory::where('category_id','=',$id)->get();
        $subCategoryD=array();
         foreach($subCategories as $subCategory){
            $subCategoryD[$subCategory->id]=$subCategory->name;
         }
        return response(['subCategories' => $subCategoryD, 'message' => 'Retrieved successfully']);
    }

    public function filterModels($id){
       
        $models=VehicleModel::where('make_id','=',$id)->get();
        $modelD=array();
        
         foreach($models as $model){
            $modelD[$model->id]=$model->name;
         }
        return response(['models' => $modelD, 'message' => 'Retrieved successfully']);
    }

    public function shop(){
    
        $products= Product::paginate(16);
        $categories=Category::all();
        $makes=Make::orderBy('order','asc')->get();
        $sideBanner=Banner::where('location','=','Side Menu Banner')->where('status','=','Active')->orderBy('created_at','desc')->first();
        return view('frontend.shoppage', compact('products','categories','sideBanner','makes'));
    }


    public function search(Request $request){
        $input=$request->all();
        $products= Product::where('name','LIKE','%'.$input['search'].'%')->limit(30)->paginate(21);
         return response(['products' => ProductResource::collection($products), 'message' => 'Retrieved successfully']);
        
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
        $makes=Make::orderBy('order','asc')->get();
        $categories=Category::all();
        return view('frontend.spareRequest',compact('makes','categories'));
    }
    
    public function storeSpareRequest(Request $request){
           
        
        
        $input=$request->all();
        $input['status']='Pending';
        $photo=$input['photo'];
        unset($input['photo']);
        $spareRequest=SpareRequest::create($input);
        if(isset($photo)){
            /*$base64code=$this->getBase64Content($photo);*/
            $spareRequest->addMediaFromBase64($photo)
                ->usingFileName('spareRequest.png')
                ->toMediaCollection();
        }
        return response()->json($spareRequest);
    }
    public function getBase64Content($data)
    {
    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);
    $data = base64_decode($data);
    return $data;
    }
    
    private function saveFileFromBase64($filename, $data)
    {
    $data = $this->getBase64Content($data);
    file_put_contents($filename, $data);
    $file = new File($filename);
    return $file;
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
