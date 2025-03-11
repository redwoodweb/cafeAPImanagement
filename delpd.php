<?php
include './global.php';
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://ecudemo339998.cafe24api.com/api/v2/admin/products/'.$_GET['pd_no'].'',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'Access-Control-Allow-Origin: '.$origin_uri,
    'Authorization: Bearer '.$access_token,
    'Content-Type: application/json',
    'X-Cafe24-Api-Version: 2024-06-01'
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  curl_close($curl);
  echo $response;
  header('Location: ./dashboard.html');
  exit();
}
