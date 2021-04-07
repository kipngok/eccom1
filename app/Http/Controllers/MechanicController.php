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
        $users = User::all();
        $make = Make::all();
        $mechanics = Mechanic::orderBy('created_at','desc')->paginate(20);
        return view('mechanic.index',compact('mechanics','make','users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', mechanic::class);
        $user = User::all();
        $make = Make::all();
        $mechanic= Mechanic::all();
        return view('mechanic.create', compact('mechanic','make','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
         // 'id','location','latitude','longitude','make_id','status','approved','user_id'
        $this->validate(request(),[
        'location'=>'required',
        'latitude'=>'required',
        'longitude'=>'required',
        'make_id'=>'required',
        'status'=>'required',
        'approved'=>'required'
        ]);
        $input = $request->all();
        Mechanic::create( $input);
        return redirect('/mechanic/');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $this->authorize('mechanic.show', $mechanic);
        $make = Make::all();
        $mechanic=Mechanic::find($id);
        // dd($mechanic);
        return view('mechanic.show', compact('mechanic','make'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mechanic=Mechanic::find($id);
        $make = Make::all();
        return view('mechanic.edit', compact('mechanic','make'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $this->authorize('update', $categorys);
        $this->validate($request(),[
        'location'=>'required',
        'latitude'=>'required',
        'longitude'=>'required',
        'status'=>'required',
        'approved'=>'required'
        ]);
        $input = $request->all();
        Mechanics::update( $input);
        return redirect('/mechanic/'.$mechanic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
         
        $mechanic=Mechanic::find($id);
        $this->authorize('delete', $mechanic);
        $mechanic->delete();
        return redirect('/mechanic');
    }
}
