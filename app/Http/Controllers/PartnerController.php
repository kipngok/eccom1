<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         // $this->authorize('viewAny', Partner::class);
        $partners = Partner::orderBy('created_at','desc')->paginate(20);
        return view('partner.index',compact('partners'))->with('i', (request()->input('page', 1) - 1) * 5); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $this->authorize('create', Partner::class);
        return view('partner.create');
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
         // $this->authorize('create', Partner::class);
        $this->validate(request(),[
        'name'=>'required',
        'logo'=>'required|image|mimes:jpg,jpeg,png,gif',
        'description'=>'required',
        ]);
        $input = $request->all();
        $partner=Partner::create($input);
        $partner->addMediaFromRequest('logo')->toMediaCollection('partners');
        return redirect('/partner/'.$partner->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
         // $this->authorize('view', $partner);
        return view('partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
         // $this->authorize('update', $partner);
        return view('partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
        // $this->authorize('update', $partner);
        $this->validate(request(),[
        'name'=>'required',
        'logo'=>'required',
        'description'=>'required',
        ]);
        $input = $request->all();
        $partner->update($input);

        return redirect('/partner/'.$partner->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
        // $this->authorize('delete', $partner);
        $partner->delete();
        return redirect('/partner');
    }
}
