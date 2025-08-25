<?php
include './dbinfo.php';
// $out = array('error' => false);
$sql = "SELECT access_token FROM cafe24api ORDER BY id DESC";
$result = $conn->query($sql);

// echo '데이터의 개수: '.$result->num_rows;
$row = $result->fetch_assoc();

foreach( $row as $key => $val ){
    if($key == 'access_token'){
        $access_token = $val;
    }
}

// 고정정보들
$client_id = '';// 클라이어트 id
$base64_encode = '';// 클라이언트 id + 시크릿 id base64 코드로 인코딩
$redirect_uri = 'https://wizard99v.cafe24.com/cafe24apitest/auth.html'; // 설정된 리다이렉트 주소 
$conn->close();
?>
