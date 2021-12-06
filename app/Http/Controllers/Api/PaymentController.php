<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Traits\SMS;
use App\Traits\Ipay;
use URL;
use Carbon\Carbon;
use App\Mail\OrderPlaced;
use App\Mail\OrderPlaced2;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function cod(Request $request,$id)
    {
        $order=Order::find($id);
        $input=$request->all();
        $phone=$order->phone;
        $input['status']='Pending';
        $order->update($input);
        $sms='Thank you for your purchase. Your order has been received successfully. ORDER ID:'.$order->id.'.';
        $this->sendAfricasTalkingSMS($sms, $phone);
        Mail::send(new OrderPlaced($order));
        Mail::send(new OrderPlaced2($order));
        return view('payment.success',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
