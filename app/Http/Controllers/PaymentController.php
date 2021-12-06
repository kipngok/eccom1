<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Traits\SMS;
use App\Traits\Ipay;
use URL;
use Carbon\Carbon;
use App\Mail\OrderPlaced;
use App\Mail\OrderPlaced2;

class PaymentController extends Controller
{
    use SMS;
    use Ipay;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $order=Order::find($id);
        $oid=$order->id;
        $inv=$order->id;
        $amount=$order->total;
        $phone=$order->phone;
        $email=$order->email;
        $successURL=URL::to('/')."/order/payment/success/".$order->id."";
        $failURL=URL::to('/')."/order/payment/fail/".$order->id."";
        $returnD=$this->generateIpayInstance($oid,$inv,$amount,$phone,$email,$successURL,$failURL);
        $fields=$returnD['fields'];
        $generated_hash=$returnD['generated_hash'];
        return view('payment.show',compact('order','fields','generated_hash'));
    }
    public function success($id)
    {
        //
        $order=Order::find($id);
        $totalDue=$order->total;

        $status=$this->confirmPayment();
        if($status=='fe2707etr5s4wq' || $status=='dtfi4p7yty45wq' || !isset($status)){
        //FAILED PAYMENT
        return redirect('/payment/'.$order->id)->with('status','The payment was not processed succesfully. Contact our support team on +254 727 787878 /+254 783 111333');
        }
        elseif($status=='aei7p7yrx4ae34' || $status=='cr5i3pgy9867e1' || $status=='eq3i7p5yt7645e' || $status=='bdi6p2yy76etrs'){
    //SUCCESSFUL PAYMENT

            $orderA=array();
            $orderA['status']='Pending';
            $orderA['is_paid']=1;
            $order->update($orderA);
            return redirect('/order/payment/confirmed/'.$order->id);
        }

    }

    public function confirmed($id)
    {
        //
        $order=Order::find($id);

        if($order->status == 'Pending'){
        $success='Payment was successful';
        //SEND SUCCESS SMS
        $phone=$order->phone;
        $sms='Thank you for your purchase. Your order has been received successfully. ORDER ID:'.$order->id.'.';
        $this->sendAfricasTalkingSMS($sms, $phone);
        
        $sms='A new order has been placed .. kindly attend to it. ORDER ID:'.$order->id.'.';
        $this->sendAfricasTalkingSMS($sms, '0707606060');
        $this->sendAfricasTalkingSMS($sms, '0728840729');

        //SEND SUCCESS EMAILS
        Mail::send(new OrderPlaced($order));
        Mail::send(new OrderPlaced2($order));
        //
        return redirect('/paymentSuccess/'.$order->id);
        }
        else{
            return redirect('/payment/'.$order->id)->with('status', 'Failed! Your payment was not processed succesfully!');
        }
    }

    public function fail($id)
    {
        $order=Order::find($id);
        return redirect('/payment/'.$order->id)->with('status','The payment was not processed succesfully. Contact our support team on +254 727 787878 /+254 783 111333');
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
        
        $sms='A new order has been placed .. kindly attend to it. ORDER ID:'.$order->id.'.';
        $this->sendAfricasTalkingSMS($sms, '0707606060');
        $this->sendAfricasTalkingSMS($sms, '0728840729');
        
        Mail::send(new OrderPlaced($order));
        Mail::send(new OrderPlaced2($order));

        return view('payment.success',compact('order'));
    }
    public function paymentSuccess($id)
    {
        $order=Order::find($id);
        return view('payment.success',compact('order'));
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
