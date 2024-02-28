<?php
   
   function verifyupidetails(){
    
    $UpiDetail = array(
        "mobile_number"   =>$_POST['mobile'],
        "verification_id" => $_POST['verificationid']
    );

    $UpiDetails =   json_encode($UpiDetail); 
     $url = "https://sandbox.cashfree.com/verification/upi/mobile";
  
     $ch3 = curl_init();
     curl_setopt($ch3, CURLOPT_URL, "$url");
     curl_setopt($ch3, CURLOPT_POSTFIELDS, $UpiDetails);
     curl_setopt($ch3, CURLOPT_CONNECTTIMEOUT, 20);
     curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, "POST");
     curl_setopt($ch3, CURLOPT_POST, true);
     curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt(
         $ch3,
         CURLOPT_HTTPHEADER,
         array(
            'Accept: application/json',
            'Content-Type: application/json',
            'x-client-id:CF1376dgdfgK53DJ5ENIPQT0',
            'x-client-secret:cfsk_ma_test_fdbsdgds40d8e60f7d25b90d_444da427'
        )
     );

     $result1 = curl_exec($ch3);
     print_r($result1);
     $returnCode = (int)curl_getinfo($ch3, CURLINFO_HTTP_CODE);
     curl_close($ch3);
     $resp4 = json_decode($result1, true);
  
     return  $resp4;
    }
 
    verifyupidetails();

?>


