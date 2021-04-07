<?php

namespace App\Http\Controllers;

use App\Models\MechanicRequest;
use App\Models\User;
use App\Models\Mechanic;
use App\Models\Make;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class MechanicRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        // $this->authorize('viewAny', MechanicRequest::class);
        $user= User::all();
        $mechanics= Mechanic::all();
        $makes = Make::all();
        $models = VehicleModel::all();
        $mechanicrequests = MechanicRequest::orderBy('created_at','desc')->paginate(20);
        return view('mechanicrequest.index',compact('mechanicrequests','user','mechanics','makes','models'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', MechanicRequest::class);
        $mechanicrequest= MechanicRequest::all();
        return view('mechanicrequest.create', compact('mechanicrequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
       // 'id','mechanic_id','user_id','notes','make_id','model_id','status','approved'
        $this->validate($request(),[
        'mechanic_id'=>'required',
        'notes'=>'required',
        'make_id'=>'required',
        'model_id'=>'required',
        'status'=>'required',
        'approved'=>'required',
        
        ]);
        $input = $request->all();
        MechanicRequest::create( $input);
        return redirect('/mechanicrequest/'.$mechanicrequest->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mechanicrequest  $mechanicrequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $this->authorize('MechanicRequest.show', $mechanicrequest);
        $mechanicrequest=MechanicRequest::find($id);
        return view('mechanicrequest.show', compact('mechanicrequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mechanicrequest  $mechanicrequest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mechanicrequest=MechanicRequest::find($id);
        return view('mechanicrequest.edit', compact('mechanicrequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mechanicrequest  $mechanicrequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', $mechanicrequest);
        $this->validate($request(),[
        'mechanic_id'=>'required',
        'notes'=>'required',
        'make_id'=>'required',
        'model_id'=>'required',
        'status'=>'required',
        'approved'=>'required',
        
        ]);
        $input = $request->all();
        $input['user_id']=Auth::user()->id;
        MechanicRequest::update( $input);
        return redirect('/MechanicRequest/'.$mechanicrequest->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mechanicrequest  $mechanicrequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        $this->authorize('delete', $mechanicrequest);
        $mechanicrequest=MechanicRequest::find($id);
        $mechanicrequest->delete();
        return redirect('/mechanicrequest');
    }
}
