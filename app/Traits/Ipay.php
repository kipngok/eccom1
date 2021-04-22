<?php
namespace App\Traits;
use Illuminate\Http\Request;
use URL;

trait Ipay
{
    /**
     * If the attribute is in the encryptable array
     * then decrypt it.
     *
     * @param  $key
     *
     * @return $value
     */

public function generateIpayInstance($oid,$inv,$amount,$phone,$email,$successURL,$failURL){
  $fields = array("live"=> "1",
                "oid"=> $oid,
                "inv"=> $inv,
                "ttl"=> $amount,
                "tel"=> $phone,
                "eml"=> $email,
                "vid"=> config('app.ipay_vendor_id'),
                "curr"=> config('app.ipay_currency'),
                "p1"=> "",
                "p2"=> "",
                "p3"=> "",
                "p4"=> "",
                "cbk"=> $successURL,
                "cst"=> "1",
                "lbk"=> $failURL,
                "crl"=> "0"
                );
/*
----------------------------------------------------------------------------------------------------
************(b.) GENERATING THE HASH PARAMETER FROM THE DATASTRING *********************************
---------------------------------------------------------------------------------------------------
The datastring IS concatenated from the data above
*/
$datastring =  $fields['live'].$fields['oid'].$fields['inv'].$fields['ttl'].$fields['tel'].$fields['eml'].$fields['vid'].$fields['curr'].$fields['p1'].$fields['p2'].$fields['p3'].$fields['p4'].$fields['cbk'].$fields['cst'].$fields['crl'];
$hashkey =config('app.ipay_hash_key');

/********************************************************************************************************
* Generating the HashString sample
*/
$generated_hash = hash_hmac('sha1',$datastring , $hashkey);

$returnD=array();
$returnD['fields']= $fields;
$returnD['generated_hash']=$generated_hash;
return  $returnD;
}


public function confirmPayment()
    {
    //CONFIRM PAYMENT
$val = config('app.ipay_vendor_id'); //assigned iPay Vendor ID... hard code it here.
/*
these values below are picked from the incoming URL and assigned to variables that we
will use in our security check URL
*/
$val1 = request()->id;
$val2 = request()->ivm;
$val3 = request()->qwh;
$val4 = request()->afd;
$val5 = request()->poi;
$val6 = request()->uyt;
$val7 = request()->ifd;

$ipnurl = "https://www.ipayafrica.com/ipn/?vendor=".$val."&id=".$val1."&ivm=".
$val2."&qwh=".$val3."&afd=".$val4."&poi=".$val5."&uyt=".$val6."&ifd=".$val7;
$fp = fopen($ipnurl, "rb");
$status = stream_get_contents($fp, -1, -1);
fclose($fp);
return $status;
}
}
