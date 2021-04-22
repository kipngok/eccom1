<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Make;
use App\Models\VehicleModel;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('viewAny', VehicleModel::class);
        $models = VehicleModel::orderBy('created_at','desc')->paginate(20);
        return view('model.index',compact('models'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', VehicleModel::class);
        $makes=Make::all();
        return view('model.create', compact('makes'));
    }

    public function models($id){
        $models=VehicleModel::where('make_id','=',$id)->get();
        return view('model.get',compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->authorize('create', VehicleModel::class);
        $this->validate(request(),[
        'name'=>'required',
        'make_id'=>'required'
        ]);
        $input = $request->all();
        $model=VehicleModel::create($input);
        return redirect('/model/'.$model->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleModels\model  $model
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleModel $model)
    {
        //
        $this->authorize('view', $model);
        $model=VehicleModel::find($id);
        return view('model.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleModels\model  $model
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleModel $model)
    {
        $this->authorize('update', $model);
        $makes=Make::all();
        return view('model.edit', compact('model','makes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleModels\model  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleModel $model)
    {
        $this->authorize('update', $model);
         $this->validate(request(),[
        'name'=>'required',
        'make_id'=>'required'
        ]);
        $input = $request->all();
        $model->update( $input);
        return redirect('/model/'.$model->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleModel\model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleModel $model){
        //
        $this->authorize('delete', $model);
        $model->delete();
        return redirect('/model');
    }
}
