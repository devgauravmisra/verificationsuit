<?php

//Pan details
function authorize(){

       
    $url = "https://payout-gamma.cashfree.com/payout/v1/authorize";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$url");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Accept: application/json',
            'Content-Type: application/json',
            'x-client-id:CF137647dg0',
            'x-client-secret:cfsk_ma_test_sdfg0d8e60f7d25b90d_444da427'
        )
    );

    $result = curl_exec($ch);
    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $resp = json_decode($result, true);
    $token = $resp['data']['token'];
    return $respdata =  upiidverification($token);
    
   
}


   function upiidverification($token){

    $upi =  $_POST['upiid'];

    $vpa = array(
        "vpa"   =>$upi
      
    );
    $upidetails =   json_encode($vpa); 
     $url = "https://payout-gamma.cashfree.com/payout/v1/validation/upiDetails";
  
     $ch3 = curl_init();
     curl_setopt($ch3, CURLOPT_URL, "$url");
     curl_setopt($ch3, CURLOPT_POSTFIELDS, $upidetails);
     curl_setopt($ch3, CURLOPT_CONNECTTIMEOUT, 20);
     curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, "GET");
     curl_setopt($ch3, CURLOPT_POST, true);
     curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt(
         $ch3,
         CURLOPT_HTTPHEADER,
         array(
             'Content-Type: application/json',
             'Authorization: Bearer '.$token,
         )
     );
     
     $result1 = curl_exec($ch3);
     print_r($result1);
     $returnCode = (int)curl_getinfo($ch3, CURLINFO_HTTP_CODE);
     curl_close($ch3);
     $resp4 = json_decode($result1, true);
     print_r($resp4);
     return  $resp4;
    }
 
    authorize();

?>


