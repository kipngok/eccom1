<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use App\Models\Make;
use App\Models\User;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {   
        $this->authorize('viewAny', Mechanic::class);
        $mechanics = Mechanic::orderBy('created_at','desc')->paginate(20);
        return view('mechanic.index',compact('mechanics'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Mechanic::class);
        $users = User::all();
        $makes = Make::all();
        return view('mechanic.create', compact('makes','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
         $this->authorize('create', Mechanic::class);
        $this->validate(request(),[
        'location'=>'required',
        'latitude'=>'required',
        'longitude'=>'required',
        'make_id'=>'required',
        'status'=>'required',
        'approved'=>'required'
        ]);
        $input = $request->all();
        $input['make_ids']=implode(',', $input['make_id']);
        $mechanic=Mechanic::create( $input);
        return redirect('/mechanic/'.$mechanic->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        //
        $this->authorize('view', $mechanic);
        return view('mechanic.show', compact('mechanic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        $this->authorize('update', $mechanic);
        $makes = Make::all();
        return view('mechanic.edit', compact('mechanic','makes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic){

        $this->authorize('update', $mechanic);
        $this->validate($request(),[
        'location'=>'required',
        'latitude'=>'required',
        'longitude'=>'required',
        'status'=>'required',
        'approved'=>'required'
        ]);
        $input = $request->all();
        $input['make_ids']=implode(',', $input['make_id']);
        $mechanic->update( $input);
        return redirect('/mechanic/'.$mechanic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic){
        //
        $this->authorize('delete', $mechanic);
        $mechanic->delete();
        return redirect('/mechanic');
    }
}
