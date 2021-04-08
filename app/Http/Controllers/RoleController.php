<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('viewAny', Role::class);
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('role.index',compact('roles'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Role::class);   
        $permissions = Permission::all();
        return view('role.create',compact('permissions'));
        //
        // $this->authorize('create', Role::class);
        // $roles = Role::all();
        // return view('role.create', compact('roles'));
    }



    public function select($id)
    {
        
        $role = Role::find($id);
        $permissions = Permission::get();
        return view('role.select',compact('role','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Role::class);   
        $this->validate($request, [
            'name' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));
        return redirect('/role/'.$role->id);
       
                      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $this->authorize('view', $role);
        $permissions=Permission::all();
        return view('role.show',compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $this->authorize('update', $role);
        $permissions = Permission::all();
        return view('role.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $this->authorize('update', $role);
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input=$request->all();
        $role->update($input);
        $role->syncPermissions($request->input('permissions'));

        return redirect('/role/'.$role->id)->with('Role updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $this->authorize('delete', $role);
        $roles->delete();
        return redirect('/role');
    }
}
