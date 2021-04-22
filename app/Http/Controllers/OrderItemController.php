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
        $this->authorize('viewAny', OrderItem::class);
        $orderItems = OrderItem::orderBy('created_at','desc')->paginate(20);
        return view('orderItem.index',compact('orderItems'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', OrderItem::class);
        return view('orderItem.create', compact('orderItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->authorize('create', OrderItem::class);
        $this->validate(request(),[
        'product_id'=>'required',
        'orderItem_id'=>'required',
        'qty'=>'required',
        'price'=>'required',
        'amount'=>'required'
        ]);
        $input = $request->all();
        $orderItem=OrderItem::create($input);
        return redirect('/orderItem/'.$orderItem->id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItems
     * @return \Illuminate\Http\Response
     */
    public function show(Orderitem $orderItem)
    {
        //
        $this->authorize('view', $orderItem);
        return view('orderItem.show', compact('orderItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItems
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderitem $orderItem)
    {
        $this->authorize('update', $orderItem);
        return view('orderItem.edit', compact('orderItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderItem  $orderItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderitem $orderItem)
    { 
        $this->authorize('update', $orderItem);
        $this->validate(request(),[
        'product_id'=>'required',
        'orderItem_id'=>'required',
        'qty'=>'required',
        'price'=>'required',
        'amount'=>'required'
        ]);
        $input = $request->all();
        $orderItem->update( $input);
        return redirect('/orderItem/'.$orderItem->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderItem  $orderItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderitem $orderItem){
        //
        $this->authorize('delete', $orderItem);
        $orderItem->delete();
        return redirect('/orderItem');
    }
}
