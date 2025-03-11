<?php
include './global.php';
// CORS 문제를 방지하기 위해 모든 출처에 대해 허용
header("Access-Control-Allow-Origin: https://ecudemo339998.cafe24.com/");
header("Content-Type: application/json");
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://ecudemo339998.cafe24api.com/api/v2/admin/products/count',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
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
  echo $response;
}