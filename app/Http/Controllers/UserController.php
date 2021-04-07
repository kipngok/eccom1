<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        //

        $users = User::orderBy('created_at','desc')->paginate(20);
        return view('user.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions=Permission::all();
        $roles=Role::all();
        return view('user.create',compact('permissions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $user=User::create($input);
        $user->syncPermissions($request->input('permissions'));
        return redirect('/user/'.$user->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user=User::find($id);
        $permissions=Permission::all();
        return view('user.show', compact('user','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::find($id);
        $permissions=Permission::all();
        $roles=Role::all();
        return view('user.edit', compact('user','permissions','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user=User::find($id);
        $input=$request->all();
        if(!empty($input['password'])){
            $input['password']=Hash::make($input['password']);
        }else{
            unset($input['password']);
        }
        $user->update($input);
        $user->syncPermissions($request->input('permissions'));
        return redirect('/user/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::find($id);
        $user->delete();
        return redirect('/user');
    }
}
