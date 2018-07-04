<?php
require '../includes/init.php';
require '../includes/functions.php';
$RecordID = $_GET['RecordID'];
$query = 'DELETE FROM favourite WHERE UserID = '.$_SESSION['UserID'].' AND RecordID = '.$RecordID.';';
mysqli_query($connection, $query);
GetFavourites();
header("Location: {$_SERVER['HTTP_REFERER']}");
?>