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
        // $this->authorize('viewAny', VehicleModel::class);
        $makes= Make::all();
        $models = VehicleModel::orderBy('created_at','desc')->paginate(20);
        return view('model.index',compact('models','makes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', model::class);
        $model= VehicleModel::all();
        $make= Make::all();
        return view('model.create', compact('model','make'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->validate(request(),[
        'name'=>'required',
        'make_id'=>'required'
        ]);
        $input = $request->all();
        VehicleModel::create( $input);
        return redirect('/model/');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleModels\model  $model
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $this->authorize('model.show', $model);
        $model=VehicleModel::find($id);
        return view('model.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleModels\model  $model
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=VehicleModel::find($id);
        return view('model.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleModels\model  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', $model);
         $this->validate($request(),[
        'name'=>'required',
        'make_id'=>'required'
        ]);
        $input = $request->all();
        VehicleModel::update( $input);
        return redirect('/model/'.$model->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleModel\model  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        $this->authorize('delete', $model);
        $model=VehicleModel::find($id);
        $model->delete();
        return redirect('/model');
    }
}
