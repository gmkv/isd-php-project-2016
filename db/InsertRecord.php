<?php
require_once '../includes/init.php';
$RecordName = $_POST['RecordName'];
$RecordPrice = $_POST['RecordPrice'];
$RecordImageName = $_POST['RecordImageName'];
$query= "INSERT INTO record (RecordID, RecordName, RecordPrice, RecordImageName) VALUES ('','$RecordName','$RecordPrice','$RecordImageName')";
mysqli_query($connection, $query);
header("Location: {$_SERVER['HTTP_REFERER']}");
?>