<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('viewAny', Coupon::class);
        $coupons = Coupon::orderBy('created_at','desc')->paginate(20);
        return view('coupon.index',compact('coupons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Coupon::class);
        $coupon= Coupon::all();
        return view('coupon.create', compact('coupon'));
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
        'code'=>'required',
        'type'=>'required',
        'value'=>'required',
        'expiry_date'=>'required'
        ]);
        $input = $request->all();
        $coupon = Coupon::create($input);
        return redirect('/coupon/'.$coupon->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $coupon=Coupon::find($id);
        $this->authorize('view', $coupon);
     
        return view('coupon.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon=Coupon::find($id);
        return view('coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //'id','name','slug','order'
    $this->authorize('update', $coupon);
   $this->validate($request(), [
        'code'=>'required',
        'type'=>'required',
        'value'=>'required',
        'expiry_date'=>'required'
        ]);
        $input = $request->all();
        Category::update( $input);
        return redirect('/coupon/'.$coupon->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        $coupon=Coupon::find($id);
        $this->authorize('delete', $coupon);
        $coupon->delete();
        return redirect('/coupon');
    }
}
