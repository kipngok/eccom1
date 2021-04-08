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
        $mechanicRequests = MechanicRequest::orderBy('created_at','desc')->paginate(20);
        return view('mechanicrequest.index',compact('mechanicrequests'))
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
        return view('mechanicrequest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->authorize('create', MechanicRequest::class);
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
        $mechanicRequest=MechanicRequest::create( $input);
        return redirect('/mechanicrequest/'.$mechanicRequest->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MechanicRequest  $mechanicRequest
     * @return \Illuminate\Http\Response
     */
    public function show(MechanicRequest $mechanicRequest)
    {
        //
        $this->authorize('view', $mechanicRequest);
        return view('mechanicrequest.show', compact('mechanicRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MechanicRequest  $mechanicRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(MechanicRequest $mechanicRequest)
    {
        $this->authorize('update', $mechanicRequest);
        return view('mechanicrequest.edit', compact('mechanicRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MechanicRequest  $mechanicRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MechanicRequest $mechanicRequest)
    {
        $this->authorize('update', $mechanicRequest);
        $this->validate($request(),[
        'mechanic_id'=>'required',
        'notes'=>'required',
        'make_id'=>'required',
        'model_id'=>'required',
        'status'=>'required',
        'approved'=>'required',
        
        ]);
        $input = $request->all();
        $mechanicRequest->update( $input);
        return redirect('/mechanicRequest/'.$mechanicRequest->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MechanicRequest  $mechanicRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MechanicRequest $mechanicRequest){
        //
        $this->authorize('delete', $mechanicRequest);
        $mechanicRequest->delete();
        return redirect('/mechanicRequest');
    }
}
