<?php
include './dbTest.php';
foreach($out as $key => $value){//데이터 테스트 출력
    if($key ==='info'){
        foreach($value as $arrayNum){
            foreach ($arrayNum as $k => $v){
                if($k === 'nickname'){
                    echo 'nickname:'.$v.', ';
                }
            }
        }
    }
}
?>