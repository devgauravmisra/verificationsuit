<?php

//Pan details verification
   
   function panverify(){

    $pandtl= $_POST['pan'];

    $pankDetail = array(
        "pan"   =>$pandtl
      
    );
     $pan =   json_encode($pankDetail); 
     $url = "https://sandbox.cashfree.com/verification/pan";
  
     $ch3 = curl_init();
     curl_setopt($ch3, CURLOPT_URL, "$url");
     curl_setopt($ch3, CURLOPT_POSTFIELDS, $pan);
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
            'x-client-id:CF137647CN0HKA8K53DJ5ENIPQT0',
            'x-client-secret:cfsk_ma_test_fdb6effc7b7c708040d8e60f7d25b90d_444da427'
        )
     );

     $result1 = curl_exec($ch3);
     print_r($result1);die('here');
     $returnCode = (int)curl_getinfo($ch3, CURLINFO_HTTP_CODE);
     curl_close($ch3);
     $resp4 = json_decode($result1, true);
     print_r($resp4);
     return  $resp4;
    }
 
    panverify();

?>


