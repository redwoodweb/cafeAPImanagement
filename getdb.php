<?php
include './global.php';
// CORS 문제를 방지하기 위해 모든 출처에 대해 허용
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "https://ecudemo366466.cafe24api.com/api/v2/admin/products?since_product_no=1&limit=100");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Access-Control-Allow-Origin: '.$origin_uri,
    'Authorization: Bearer '.$access_token,
    'Content-Type: application/json',
    // 'X-Cafe24-Api-Version: 2024-06-01'
));

$response = curl_exec($curl);
if(curl_errno($curl)) {
    echo 'Error:' . curl_error($curl);
}
curl_close($curl);
echo $response;
exit();
?>