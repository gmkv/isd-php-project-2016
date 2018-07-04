<?php
require_once '../includes/init.php';
require_once '../includes/functions.php';
$RecordID = $_GET['RecordID'];
$query = 'INSERT INTO favourite (UserID, RecordID) VALUES ('.$_SESSION['UserID'].','.$RecordID.');';
mysqli_query($connection, $query);
GetFavourites();
header("Location: {$_SERVER['HTTP_REFERER']}");
?>