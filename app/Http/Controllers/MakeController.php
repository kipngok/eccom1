<?php

namespace App\Http\Controllers;

use App\Models\Make;
use Illuminate\Http\Request;

class MakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('viewAny', Make::class);
        $makes = Make::orderBy('created_at','desc')->paginate(20);
        return view('make.index',compact('makes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Make::class);
        return view('make.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->validate(request(), [
        'name'=>'required',
        'order'=>'required'
        ]);
        $input = $request->all();
        Make::create( $input);
        return redirect('/make/'.$make->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\make  $make
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $make=Make::find($id);
        $this->authorize('view', $make);
        return view('make.show', compact('make'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\make  $make
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $make=Make::find($id);
        return view('make.edit', compact('make'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\make  $make
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->authorize('update', $make);
      $this->validate(request(), [
        'name'=>'required',
        'order'=>'required'
        ]);
        $input = $request->all();
        Make::update( $input);
        return redirect('/make/'.$make->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\make  $make
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        
        $make=Make::find($id);
        $this->authorize('delete', $make);
        $make->delete();
        return redirect('/make');
    }
}
