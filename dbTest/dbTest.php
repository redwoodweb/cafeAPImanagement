<?php
$servername ="";
$username ="";
$password ="";
$dbname ="";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not connect: '.$conn->connect_error);
}

// $out = array('error' => false);
$out = array();
$sql = "SELECT id, nickname, textinformation, sex, date FROM user_board ORDER BY id DESC";
$result = $conn->query($sql);

// echo '데이터의 개수: '.$result->num_rows;

if($result->num_rows > 0){// 데이터의 개수가 존재할때
    // echo $result->fetch_assoc();//데이터를 배열형태로 바꾸어 반환하는 함수
    $rowsData = array();    
    while( $row = $result->fetch_assoc() ){
        array_push($rowsData, $row);
        // echo $row['nickname'];
    }
    // $out['info'] = $rowsData;//객체를 담기
    $out = $rowsData;//객체를 담기
}else {
    echo 'result 0';
}

$conn->close();
// foreach($out as $key => $value){//데이터 테스트 출력
//     if($key ==='info'){
//         foreach($value as $arrayNum){
//             foreach ($arrayNum as $k => $v){
//                 if($k === 'nickname'){
//                     echo 'nickname:'.$v.', ';
//                 }
//             }
//         }
//     }
// }

header("Content-type: application/json");
echo json_encode($out, JSON_UNESCAPED_UNICODE);//유니코드로 변환되는것을 막고 json 데이터로 출력
die();
?>