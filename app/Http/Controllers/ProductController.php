<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Make;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('viewAny', Product::class);
        $products = Product::with('media')->get();
        $categories = Category::all();
        $makes = Make::all();
        $models = VehicleModel::all();
        $subCategories = SubCategory::all(); 
        $products = Product::orderBy('created_at','desc')->paginate(20);
        return view('product.index',compact('products','makes','categories','subCategories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
     public function filtered($category_id, $sub_category_id)
    {
        //
        $this->authorize('viewAny', Product::class);
        if($category_id=='All'){
            $category_id=NULL;
        }
        if($sub_category_id=='All'){
            $sub_category_id=NULL;
        }
        $categories=Category::all();
        $subCategories=SubCategory::all();
        $products = Product::when($category_id, function ($query, $category_id) {
                    return $query->where('category_id','=', $category_id);
                })->when($sub_category_id, function ($query, $sub_category_id) {
                    return $query->where('sub_category_id','=', $sub_category_id);
                })
                ->orderBy('created_at','desc')
                ->paginate(20);
        $filters=array();
        $filters['category']=$category_id;
        $filters['subCategory']=$sub_category_id;

            return view('product.filtered',compact('products','categories','subCategories','filters'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $models = VehicleModel::all();
        $subCategories = SubCategory::all();
        $makes = Make::all();
        return view('product.create', compact('makes','categories','subCategories','models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->authorize('create', Product::class);
        $this->validate(request(), [
        'slug'=>'required|unique:products'
        ]);
        
        $input = $request->all();
        $product = Product::create($input);
        if(isset($input['image1'])){$product->addMediaFromRequest('image1')->toMediaCollection('products');}
        if(isset($input['image2'])){$product->addMediaFromRequest('image2')->toMediaCollection('products');}
        if(isset($input['image3'])){$product->addMediaFromRequest('image3')->toMediaCollection('products');}
        if(isset($input['image4'])){$product->addMediaFromRequest('image4')->toMediaCollection('products');}
        return redirect('/product/'.$product->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        $this->authorize('view', $product);
        $reviews=$product->reviews()->orderBy('created_at','desc')->paginate(5);
        return view('product.show',compact('product','reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $makes = Make::all();
        $models = VehicleModel::all();
        return view('product.edit', compact('product','categories','subCategories','makes','models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    { 
        $this->authorize('update', $product);
        $input = $request->all();
        $product->update($input);
        $mediaItems = $product->getMedia();
        
        if(isset($input['image1'])){
            if(isset($mediaItems[0])){$mediaItems[0]->delete();}
            $product->addMediaFromRequest('image1')->toMediaCollection('products');}
        if(isset($input['image2'])){
            if(isset($mediaItems[1])){$mediaItems[1]->delete();}
            $product->addMediaFromRequest('image2')->toMediaCollection('products');}
        if(isset($input['image3'])){
            if(isset($mediaItems[2])){$mediaItems[2]->delete();}
            $product->addMediaFromRequest('image3')->toMediaCollection('products');}
        if(isset($input['image4'])){
            if(isset($mediaItems[3])){$mediaItems[3]->delete();}
            $product->addMediaFromRequest('image4')->toMediaCollection('products');}

        return redirect('/product/'.$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product){
        //
        $this->authorize('delete', $product);
        $product->delete();
        return redirect('/product');
    }
}
