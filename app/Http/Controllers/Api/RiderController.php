<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Rider;
use Illuminate\Http\Request;
use App\Http\Resources\RiderResource;
use Illuminate\Support\Facades\Validator;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $riders = Rider::all();
        return response(['riders' => RiderResource::collection($riders), 'message' => 'Retrieved successfully']);
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
        //
        $input = $request->all(); 
         $validator = Validator::make($input, [
             'user_id'=>'required',
             'reg_no'=>'required',
             'type'=>'required',
             'status'=>'required',
             'place_id'=>'required',
             'longitude'=>'required',
             'latitude'=>'required'
                 ]);
         if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
         }
         $rider = Rider::create($input);
         return response()->json($rider);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function show(Rider $rider)
    {
        //
         return response()->json($rider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function edit(Rider $rider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rider $rider)
    {
        //
         $rider->update($request->all());
         return response()->json($rider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rider $rider)
    {
        //
        $rider->delete();
        return response(['message' => 'Deleted']);
    }
}
