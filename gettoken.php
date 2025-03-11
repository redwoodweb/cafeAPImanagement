<?php
session_start();
include './global.php';
$data = http_build_query(array(// application/x-www-form-urlencoded type
    'grant_type' => 'authorization_code',
    'code' => $_GET['authorization_code'],
    'redirect_uri' => urldecode($redirect_uri)
  ));

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://ecudemo339998.cafe24api.com/api/v2/oauth/token',
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    'Access-Control-Allow-Origin: '.$origin_uri,
    'Authorization: Bearer '.$base64_encode,
    'Content-Type: application/x-www-form-urlencoded',
    'X-Cafe24-Api-Version: 2024-06-01'
  ),
  CURLOPT_RETURNTRANSFER => true // 이 옵션을 추가하여 반환 값을 문자열로 받음
));

/*
curl 데이터 값 전달:
 curl_exec는 setopt으로 http요청을 하여 화면에 결과 값을 전달한다  화면에는 값과 불리언타입으로 1(성공),0(실패)불리언 타입으로 반환된다.
 실제 데이터를 출력하고 싶다면 curl 옵션에서 curlopt_returntransfer를 'true'로 설정하면 실제 데이터 값을 스트링으로 반환한다.

다른 페이지로 데이터 전달 :
1. session 으로 전달
2. url 파다라미터로 전달
*/


$response = curl_exec($curl);
$err = curl_error($curl);
if ($err) {
  echo 'cURL Error #:' . $err;
}
curl_close($curl);
$_SESSION['response'] = $response;
header('Location: ./gettoken.html');//url 파라미터로 받아 올 수 있다.
// header('Location: ./gettoken.html?token='.urldecode($response));//url 파라미터로 받아 올 수 있다.
exit();
?>