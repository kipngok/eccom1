<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Resources\BannerResource;
use Illuminate\Support\Facades\Validator;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rectangleBanners = Banner::where('location','=','Mobile Banner Rectangle')->get();
        $squareBanners = Banner::where('location','=','Mobile Banner Square')->get();
        return response(['rectangleBanners' => BannerResource::collection($rectangleBanners),'squareBanners' => BannerResource::collection($squareBanners), 'message' => 'Retrieved successfully']);

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //media collectio
        $input = $request->all(); 
         $validator = Validator::make($input, [
                'title'=>'required',
                'url'=>'required',
                'location'=>'required',
                'status'=>'required',
                'heading'=>'required',
                'subHeading'=>'required',
                'content'=>'required',
                ]);
         if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
         }
         $banner = Banner::create($input);
         return response()->json($banner);
        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
        return response()->json($banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
        $banner->update($request->all());
         return response()->json($banner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
        $banner->delete();
        return response(['message' => 'Deleted']);
    }
}
 
 
