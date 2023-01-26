<?php
include("functions/init.php");

$mobile = "09010484986,09121132025";

// convert the string to an array of numbers
$numbers = explode(",", $mobile);

// use array_map to format each number
$formatted_numbers = array_map(function($number) {
    return '+234'.ltrim($number, '0');
}, $numbers);

//print_r($formatted_numbers);


admin_details();

// Initialize variables ( set your variables here )
$token      = $GLOBALS['t_admins']['token'];
$instanceid = $GLOBALS['t_admins']['instanceid'];


$mg = "jsut a test";




$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ultramsg.com/instance30269/messages/chat",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "token=$token&to=$formatted_numbers&body=$msg&priority=1&referenceId=",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}