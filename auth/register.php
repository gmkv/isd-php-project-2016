<?php
require_once '../includes/init.php';
require_once '../includes/functions.php';
$Username = CleanString($_POST['Username']);
$Password = CleanString($_POST['Password']);
$Email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
$AgeRange = $_POST['AgeRange'];

$query = "INSERT INTO user (UserID,Username,Password,Email,AgeRange,AdminPrivilege)
VALUES ('','$Username','$Password','$Email','$AgeRange','0');";
mysqli_query($connection, $query);
$_SESSION['Username'] = $Username;
$_SESSION['AdminPrivilege'] = 0;
header('location: loginpage.php');

?>
