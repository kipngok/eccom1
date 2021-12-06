<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('viewAny', Banner::class);
        $banners = Banner::orderBy('created_at','desc')->paginate(20);
        return view('banner.index',compact('banners'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $this->authorize('create', Banner::class);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        
        return view('banner.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->authorize('create', Banner::class);
        $this->validate(request(), [
        'title'=>'required',
        'url'=>'required',
        'location'=>'required',
        'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);
       $input=$request->all();
       $banner=Banner::create($input);
       $banner->addMediaFromRequest('image')->toMediaCollection('banners');
       return redirect('/banner/'.$banner->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
        $this->authorize('view', $banner);
        return view('banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {   
        $this->authorize('update', $banner);
        return view('banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //

        $this->authorize('update', $banner);
        $input=$request->all();
        if(isset($input['image'])){
            $banner->clearMediaCollection('banners');
            $banner->addMediaFromRequest('image')->toMediaCollection('banners');}
            $banner->update($input);
       return redirect('/banner/'.$banner->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner){

        $this->authorize('delete', $banner);
        $banner->delete();
        return redirect('/banner');
    }
}
