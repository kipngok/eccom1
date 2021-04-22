<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Traits\SMS;
use App\Traits\Ipay;
use URL;
use Carbon\Carbon;

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
        /*$amount=$order->total;*/
        $amount=1;
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

        //SEND SUCCESS EMAILS
        /*Mail::send(new OrderPlaced($order));
        Mail::send(new OrderPlaced2($order));*/
        //
        return view('payment.success',compact('order'));
        }
        else{
            return redirect('/payment/'.$order->id)->with('success_message', 'Failed! Your payment was not processed succesfully!');
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

    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = config('app.mpesa_pass_key');
        $BusinessShortCode = config('app.mpesa_shortcode');
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }

    /**
     * Lipa na M-PESA STK Push method
     * @param Request $request
     * @return bool|string
     */

    public function customerMpesaSTKPush(Request $request)
    {
        $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
        $phone = '254'.substr($request->phone, -9);
        $curl_post_data = [
            //Fill in the request parameters with valid values
            'BusinessShortCode' => config('app.mpesa_shortcode'),
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => 1,
            'PartyA' => $phone, // replace this with your phone number
            'PartyB' => config('app.mpesa_shortcode'),
            'PhoneNumber' => $phone, // replace this with your phone number
            'CallBackURL' => 'https://sukispares.com/mpesa/completePayment/'.$request->order_id,
            'AccountReference' => "SukiSpares",
            'TransactionDesc' => "Sukispares stk push "
        ];
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        return $curl_response;
       
    }

    public function generateAccessToken()
    {
        $consumer_key=config('app.mpesa_consumer_key');
        $consumer_secret=config('app.mpesa_consumer_secret');
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }


    public function completePayment(Request $request, $id){
        $order=Order::find($id);
        $orderA=array();
        $orderA['status']='Pending';
        $orderA['payment_gateway']='Mpesa';
        $order->update($orderA);
    } 
}
