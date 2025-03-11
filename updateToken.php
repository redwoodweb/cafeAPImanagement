<?php
include 'dbinfo.php';

$sql = "UPDATE cafe24api SET access_token='".$_GET['access_token']."' WHERE id=1";

echo $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
$conn->close();
header('Location: ./dashboard.html');
?>