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
        $sparerequests = SpareRequest::orderBy('created_at','desc')->paginate(20);
        return view('sparerequest.index',compact('sparerequests'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', sparerequest::class);
        $sparerequest= SpareRequest::all();
        return view('sparerequest.create', compact('sparerequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        
        $this->validate($request(),[
        'photo'=>'required',
        'email'=>'required',
        'notes'=>'required',
        'make_id'=>'required',
        'model_id'=>'required',
        'status'=>'required',
        'subcategory_id'=>'required',
         'category_id'=>'required'
        ]);
        $input = $request->all();
        SpareRequest::create( $input);
        return redirect('/sparerequest/'.$sparerequest->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\sparerequest\sparerequest  $sparerequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $this->authorize('sparerequest.show', $sparerequest);
        $sparerequest=SpareRequest::find($id);
        return view('sparerequest.show', compact('sparerequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sparerequest\sparerequest  $sparerequest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sparerequest=SpareRequest::find($id);
        return view('sparerequest.edit', compact('sparerequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sparerequest\sparerequest  $sparerequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $this->authorize('update', $sparerequest);
        $this->validate($request(),[
        'photo'=>'required',
        'email'=>'required',
        'notes'=>'required',
        'make_id'=>'required',
        'model_id'=>'required',
        'status'=>'required',
        'subcategory_id'=>'required',
         'category_id'=>'required'
        ]);
        $input = $request->all();
        SpareRequest::update( $input);
        return redirect('/sparerequest/'.$sparerequest->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sparerequest\sparerequest  $sparerequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        $this->authorize('delete', $sparerequest);
        $sparerequest=SpareRequest::find($id);
        $sparerequest->delete();
          return redirect('/sparerequest');
    }
}
