<?php
require_once '../includes/init.php';
$RecordID=$_POST['RecordID'];
$RecordName=$_POST['RecordName'];
$RecordPrice=$_POST['RecordPrice'];
$RecordImageName=$_POST['RecordImageName'];
$query = "UPDATE record SET RecordName='$RecordName', RecordPrice=$RecordPrice, RecordImageName='$RecordImageName' WHERE RecordID=$RecordID";
mysqli_query($connection, $query);
header( 'Location: ../auth/loginpage.php' );
?>
