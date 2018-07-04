<?php
    require_once '../includes/init.php';
    require_once '../includes/functions.php';
    $Username = CleanString($_POST['Username']);
    $Password = CleanString($_POST['Password']);
    $query = "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'";
    $result = mysqli_query($connection, $query);
    if ( $row = mysqli_fetch_assoc($result)) {
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['UserID'] = $row['UserID'];
        GetFavourites();
        $_SESSION['AdminPrivilege'] = $row['AdminPrivilege'];
        header('location: loginpage.php');
        }
    else {
        $_SESSION['Error'] = 'Unrecognised credentials';
        header('location: loginpage.php');
    }
?>
