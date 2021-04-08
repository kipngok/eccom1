<?php

namespace App\Http\Controllers;

use App\Models\SpareRequest;
use Illuminate\Http\Request;

class SpareRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('viewAny', SpareRequest::class);
        $sparerRquests = SpareRequest::orderBy('created_at','desc')->paginate(20);
        return view('spareRequest.index',compact('spareRequests'))->with('i', (request()->input('page', 1) - 1) * 5);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', SpareRequest::class);
        return view('spareRequest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->authorize('create', SpareRequest::class);
        $this->validate($request(),[
        'photo'=>'required',
        'email'=>'required',
        'notes'=>'required',
        'make_id'=>'required',
        'model_id'=>'required',
        'status'=>'required',
        'sub_category_id'=>'required',
        'category_id'=>'required'
        ]);
        $input = $request->all();
        $spareRequest=SpareRequest::create( $input);
        return redirect('/spareRequest/'.$spareRequest->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpareRequest  $spareRequest
     * @return \Illuminate\Http\Response
     */
    public function show(SpareRequest $spareRequest)
    {
        //
        $this->authorize('view', $spareRequest);
        return view('spareRequest.show', compact('spareRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpareRequest  $spareRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(SpareRequest $spareRequest)
    {
        $this->authorize('update', $spareRequest);
        return view('spareRequest.edit', compact('spareRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpareRequest  $spareRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpareRequest $spareRequest)
    { 
        $this->authorize('update', $spareRequest);
        $this->validate($request(),[
        'photo'=>'required',
        'email'=>'required',
        'notes'=>'required',
        'make_id'=>'required',
        'model_id'=>'required',
        'status'=>'required',
        'sub_category_id'=>'required',
         'category_id'=>'required'
        ]);
        $input = $request->all();
        $spareRequest->update($input);
        return redirect('/spareRequest/'.$spareRequest->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpareRequest  $spareRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpareRequest $spareRequest){
        //
        $this->authorize('delete', $spareRequest);
        $spareRequest->delete();
        return redirect('/spareRequest');
    }
}
