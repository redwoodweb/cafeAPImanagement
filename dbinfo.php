<?php
$servername ="";
$username ="";
$password ="";
$dbname ="";

// access_token database에서 가져오기
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not connect: '.$conn->connect_error);
}
?>