<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Rider;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {   
        $this->authorize('viewAny', Rider::class);
        $riders = Rider::orderBy('created_at','desc')->paginate(20);
        return view('rider.index',compact('riders'))->with('i', (request()->input('page', 1) - 1) * 5); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Rider::class);
        $users=User::all();
        return view('rider.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->authorize('create', Rider::class);
        $this->validate(request(),[
        'user_id'=>'required',
        'reg_no'=>'required',
        'type'=>'required',
        'status'=>'required',
        'city'=>'required',
        'longitude'=>'required',
        'latitude'=>'required'
        ]);
        $input = $request->all();
        $rider=Rider::create($input);
        return redirect('/rider/'.$rider->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\rider\rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function show(Rider $rider)
    {
        //
        $this->authorize('view', $rider);
        return view('rider.show', compact('rider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rider\rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function edit(Rider $rider)
    {
        $this->authorize('update', $rider);
        return view('rider.edit', compact('rider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rider\rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rider $rider)
    { 
        $this->authorize('update', $rider);
        $this->validate(request(),[
        'user_id'=>'required',
        'reg_no'=>'required',
        'type'=>'required',
        'status'=>'required',
        'city'=>'required',
        'longitude'=>'required',
        'latitude'=>'required'
        ]);
        $input = $request->all();
        $rider->update($input);

        return redirect('/rider/'.$rider->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rider\rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rider $rider){
        //
        $this->authorize('delete', $rider);
        $rider->delete();
        return redirect('/rider');
    }
}
