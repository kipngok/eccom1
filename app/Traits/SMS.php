<?php
namespace App\Traits;
use URL;
use App\SMSLogs;
use App\SmsTemplate;
use AfricasTalking\SDK\AfricasTalking;

trait SMS
{
    /**
     * If the attribute is in the encryptable array
     * then decrypt it.
     *
     * @param  $key
     *
     * @return $value
     */
    public function sendAdvantaSMS($sms, $phone)
    {
        $url = config('app.advanta_url');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); //setting custom header
        $curl_post_data = array(
          //Fill in the request parameters with valid values
         'partnerID' => config('app.advanta_partnerid'),
         'apikey' => config('app.advanta_apikey'),
         'mobile' => $phone,
         'message' => $sms,
         'shortcode' => config('app.advanta_shortcode'),
         'pass_type' => 'plain', //bm5 {base64 encode} or plain
        );

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        $status = json_decode($curl_response, true);
        if(isset($status['responses'][0])){
        return $status['responses'][0];}
        
   }


   public function sendAfricasTalkingSMS($sms, $phone)
    {
        if(config('app.sms_shortcode_enabled') == 'true'){ $from=config('app.sms_shortcode'); }
        else{ $from=config('app.africastalking_from'); }
        $username = config('app.africastalking_username');
        $apiKey   = config('app.africastalking_apiKey');
        $AT= new AfricasTalking($username, $apiKey);
        $newSMS= $AT->sms();
        $result   = $newSMS->send([
            'to'      => $phone,
            'from' =>$from,
            'message' => $sms
        ]);
    }

}