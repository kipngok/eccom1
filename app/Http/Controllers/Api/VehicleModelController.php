<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Make;
use App\Models\VehicleModel;
use App\Http\Resources\VehicleModelResource;
use Illuminate\Support\Facades\Validator;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $models = VehicleModel::all();
        return response(['models' => VehicleModelResource::collection($models), 'message' => 'Retrieved successfully']);
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
    public function models($id){
        $models=VehicleModel::where('make_id','=',$id)->get();
         return response(['models' => VehicleModelResource::collection($models), 'message' => 'Retrieved successfully']);
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
            'name'=>'required',
            'make_id'=>'required'
                ]);
         if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
         }
         $vehicleModel = VehicleModel::create($input);
         return response()->json($vehicleModel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleModel $vehicleModel)
    {
        //

         return response()->json($vehicleModel);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, VehicleModel $vehicleModel)
    {
        //
        $make->update($request->all());
         return response()->json($vehicleModel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function destroy(VehicleModel $vehicleModel)
    {
        //
        $vehicleModel->delete();
        return response(['message' => 'Deleted']);
    }
}
