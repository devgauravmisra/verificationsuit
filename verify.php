<?php

// Authorization
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
                'x-client-id:CF137647CN0HKA8K53DJ5ENIPQT0',
                'x-client-secret:cfsk_ma_test_fdb6effc7b7c708040d8e60f7d25b90d_444da427'
            )
        );

        $result = curl_exec($ch);
        $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $resp = json_decode($result, true);
        $token = $resp['data']['token'];
        return $respdata =  bankVerification($token);
        
       
    }


//Verify Token

function  verifytoken($token){
       $url = "https://payout-gamma.cashfree.com/payout/v1/verifyToken";
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL, "$url");
        curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch1, CURLOPT_POST, true);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt(
            $ch1,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Authorization: Bearer ' .$token
            )
        );
        $result1 = curl_exec($ch1);
        $returnCode = (int)curl_getinfo($ch1, CURLINFO_HTTP_CODE);
        curl_close($ch1);
        $resp1 = json_decode($result1, true);
        bankVerification($token);
    }

     // BAV
      
     function bankVerification($token){
    
    $bankDetail = array(
        "bankAccount"   =>$_POST['bankac'],
        "ifsc"          => $_POST['ifsc']
    );
    $bankDetails = http_build_query($bankDetail);
   print_r($bankDetail);
     $url = "https://payout-gamma.cashfree.com/payout/v1/validation/bankDetails" . '?' . $bankDetails;
  
     $ch3 = curl_init();
     curl_setopt($ch3, CURLOPT_URL, "$url");
     curl_setopt($ch3, CURLOPT_POSTFIELDS, $bankDetails);
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
     
     $returnCode = (int)curl_getinfo($ch3, CURLINFO_HTTP_CODE);
     curl_close($ch3);
     $resp3 = json_decode($result1, true);
     print_r( $resp3);

     return  $resp3;
    }
 
    authorize();

?>


