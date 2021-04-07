<?php

namespace App\Http\Controllers;

use App\Models\Banner;
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
        $banners= Banner::all();
        return view('banner.create', compact('banners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        // 'id','title','image','url','location'
        $this->authorize('create', Banner::class);
        $this->validate(request(), [

        'title'=>'required',
        'url'=>'required',
        'location'=>'required',
        'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);
    
        $fileName = null;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName =md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./public/images/',$fileName);
        }
       $banners=Banner::create([
            'title' => request()->get('title'),
            'url' => request()->get('url'),
            'location' => request()->get('location'),
            'image'=>$fileName

        ]);
        return redirect('/banner/'.$banners->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function show($id, Banner $banners)
    {
        //
        $this->authorize('view', $banners);
        $banners=Banner::find($id);
        return view('banner.show', compact('banners'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Banner $banners)
    {   
        $this->authorize('update', $banners);
        $banners=Banner::find($id);
        return view('banner.edit', compact('banners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Banner $banners)
    {
        //

        $this->authorize('update', $banner);
         $this->validate(request(), [
        'title'=>'required',
        'url'=>'required',
        'location'=>'required',
        'image'=>'required|image|mimes:jpg,jpeg,png,gif'
        ]);
    
        $fileName = null;
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $fileName =md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./public/images/',$fileName);
        }
       $banners=Banner::create([
            'title' => request()->get('title'),
            'url' => request()->get('url'),
            'location' => request()->get('location'),
            'image'=>$fileName

        ]);
        return redirect('/banner/'.$banners->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Banner $banners){

        $this->authorize('delete', $banners);
        $banners=Banner::find($id);
        $banners->delete();
        return redirect('/banner');
    }
}
