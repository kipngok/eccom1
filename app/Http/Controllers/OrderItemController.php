<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {   
        $this->authorize('viewAny', Orderitem::class);
        $orderitems = OrderItem::orderitemBy('created_at','desc')->paginate(20);
        return view('orderitem.index',compact('orderitems'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', orderitem::class);
     
        return view('orderitem.create', compact('orderitem'));
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
        'product_id'=>'required',
        'orderitem_id'=>'required',
        'qty'=>'required',
        'price'=>'required',
        'amount'=>'required'
        ]);
        $input = $request->all();
        OrderItem::create( $input);
        return redirect('/orderitem/'.$orderitems->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\orderitems\orderitems  $orderitems
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $this->authorize('orderitem.show', $orderitems);
        $orderitem=OrderItem::find($id);
        return view('orderitem.show', compact('orderitem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orderitems\orderitems  $orderitems
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderitem=OrderItem::find($id);
        return view('orderitem.edit', compact('orderitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orderitems\orderitems  $orderitems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $this->authorize('update', $orderitem);
        $this->validate($request(),[
        'product_id'=>'required',
        'orderitem_id'=>'required',
        'qty'=>'required',
        'price'=>'required',
        'amount'=>'required'
        ]);
        $input = $request->all();
        OrderItem::update( $input);
        return redirect('/orderitem/'.$orderitem->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orderitems\orderitems  $orderitems
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        $this->authorize('delete', $orderitem);
        $orderitem=OrderItem::find($id);
        $orderitem->delete();
        return redirect('/orderitem');
    }
}
