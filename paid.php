<?php
include("functions/init.php");

admin_details();

if(!isset($_GET['ref'])) {

    redirect("./expiry");

    die();
}

  $skkey = $t_admins['skkey'];
  $ref = clean(escape($_GET['ref'])); 

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer $skkey",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {

    echo "There was an error processing your payment <br> <a href='./expiry'>Click here to go back</a>";
    
  } else {

    $res = json_decode($response);
    $status = $res->data->status;

    if($status == 'success') {

        afterpayment();
        
    } else {

        echo "There was an error processing your payment <br> <a href='./expiry'>Click here to go back</a>";

    }

  }
?>