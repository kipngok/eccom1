<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('viewAny', Order::class);
        $orders = Order::orderBy('created_at','desc')->paginate(20);
        return view('order.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function landing(){
        return view('order.landing');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Order::class);
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->authorize('create', Order::class);
        $this->validate($request(),[
        'user_id'=>'required',
        'billing_email'=>'required',
        'billing_name'=>'required',
        'billing_address'=>'required',
        'billing_city'=>'required',
        'billing_postalcode'=>'required',
        'billing_phone'=>'required',
        'billing_discount'=>'required',
        'billing_discount_code'=>'required',
        'billing_subtotal'=>'required',
        'billing_tax'=>'required',
        'billing_total'=>'required',
        'shipping_city'=>'required',
        'shipping_location'=>'required',
        'shipping_latitude'=>'required',
        'shipping_longitude'=>'required',
        'payment_gateway'=>'required',
        'status'=>'required',
        'rider_id'=>'required'
        ]);
        $input = $request->all();
        $input['user_id']=Auth::user()->id;
        $order=Order::create($input);
        return redirect('/order/'.$order->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        $this->authorize('view', $order);
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $this->authorize('update', $order);
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $this->authorize('update', $order);
        $input = $request->all();
        $order->update( $input);
        return redirect('/order/'.$order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order){
        //
        $this->authorize('delete', $order);
        $order->delete();
        return redirect('/order');
    }
}
