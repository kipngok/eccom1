<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\MpesaTransaction;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Traits\SMS;
use App\Mail\OrderPlaced;
use App\Mail\OrderPlaced2;

class MpesaController extends Controller
{
	use SMS;
    /**
     * Lipa na M-PESA password
     * */
    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = config('app.mpesa_passkey');
        $BusinessShortCode = config('app.mpesa_shortcode');
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }
    /**
     * Lipa na M-PESA STK Push method
     * */
    public function customerMpesaSTKPush(Request $request)
    {
        $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
        $phone = '254'.substr($request->phone, -9);
        $order=Order::find($request->order_id);
        $orderD=array();
        $orderD['paying_number']=$request->phone;
        $order->update($orderD);
        $curl_post_data = [
            //Fill in the request parameters with valid values
            'BusinessShortCode' => config('app.mpesa_shortcode'),
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerBuyGoodsOnline',
            'Amount' => $order->total,
            'PartyA' => $phone, // replace this with your phone number
            'PartyB' => 5414365,
            'PhoneNumber' => $phone, // replace this with your phone number
            'CallBackURL' => url('/').'/api/transaction/confirmation',
            'AccountReference' => "".$request->order_id,
            'TransactionDesc' => "Testing stk push on api"
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
    /**
     * J-son Response to M-pesa API feedback - Success or Failure
     */
    public function createValidationResponse($result_code, $result_description){
        $result=json_encode(["ResultCode"=>$result_code, "ResultDesc"=>$result_description]);
        $response = new Response();
        $response->headers->set("Content-Type","application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }
    /**
     *  M-pesa Validation Method
     *  Safaricom will only call your validation if you have requested by writing an official letter to them
     */
    public function mpesaValidation(Request $request)
    {
        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }

    /**
     * M-pesa Transaction confirmation method, we save the transaction in our databases
     */
    public function mpesaConfirmation(Request $request)
    {
        $content=json_decode($request->getContent());
        $mpesa_transaction = new MpesaTransaction();
        $mpesa_transaction->TransactionType = $content->TransactionType;
        $mpesa_transaction->TransID = $content->TransID;
        $mpesa_transaction->TransTime = $content->TransTime;
        $mpesa_transaction->TransAmount = $content->TransAmount;
        $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
        $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
        $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
        $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
        $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
        $mpesa_transaction->MSISDN = $content->MSISDN;
        $mpesa_transaction->FirstName = $content->FirstName;
        $mpesa_transaction->MiddleName = $content->MiddleName;
        $mpesa_transaction->LastName = $content->LastName;
        $mpesa_transaction->save();
        // Responding to the confirmation request
        $response = new Response();
        $response->headers->set("Content-Type","text/xml; charset=utf-8");
        $response->setContent(json_encode(["C2BPaymentConfirmationResult"=>"Success"]));
        
        $order=Order::where('status','=','Created')->where('paying_number','LIKE','%'.substr($mpesa_transaction->MSISDN, -9).'%')->orderBy('created_at','desc')->first();
        if(isset($order)){
            $orderD=array();
            $orderD['status']='Pending';
            $orderD['is_paid']=1;
            $order->update($orderD);
        }
        return $response;
    }
    /**
     * M-pesa Register Validation and Confirmation method
     */
    public function mpesaRegisterUrls()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: Bearer '. $this->generateAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            'ShortCode' => config('app.mpesa_shortcode'),
            'ResponseType' => 'Completed',
            'ConfirmationURL' => url('/')."/api/transaction/confirmation",
            'ValidationURL' => url('/')."/api/validation"
        )));
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }

    public function confirmedMpesaPayment(Request $request, $id)
    {
        //
        $order=Order::find($id);
        $transaction=MpesaTransaction::where('TransID','=',$request->transactionID)->first();
        if(isset($transaction)){
        	$orderA=array();
            $orderA['status']='Pending';
            $orderA['is_paid']=1;
            $order->update($orderA);
        $success='Payment was successful';
        //SEND SUCCESS SMS
        $phone=$order->phone;
        $sms='Thank you for your purchase. Your order has been received successfully. ORDER ID:'.$order->id.'.';
        $this->sendAfricasTalkingSMS($sms, $phone);
        //SMS TO ADMINS
        $sms='A new order has been placed .. kindly attend to it. ORDER ID:'.$order->id.'.';
        $this->sendAfricasTalkingSMS($sms, '0707606060');
        $this->sendAfricasTalkingSMS($sms, '0728840729');
        
        //SEND SUCCESS EMAILS
        Mail::send(new OrderPlaced($order));
        Mail::send(new OrderPlaced2($order));

        //
        return redirect('/paymentSuccess/'.$order->id)->with('status', 'Thank you! Your payment has been successfully accepted!');
        }
        
        else{
            return redirect('/payment/'.$order->id)->with('status', 'Failed! Your payment was not processed succesfully!');
        }
    }
}