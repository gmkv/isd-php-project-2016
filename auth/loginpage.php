<?php 
    require_once '../includes/head.php';
    require_once '../includes/init.php';
    require_once '../includes/nav.php';
    if (!isset($_SESSION['Username'])) {
        require_once 'loginform.php';
        echo '<h3>'.$_SESSION['Error'].'</h3>';
    } 
    else {
        echo '<h3>Welcome, '.$_SESSION['Username'].'</h3><a href="./logout.php">Log out</a>';
        if ( $_SESSION['AdminPrivilege'] == 1 ) {
            echo '<h1> You have administrator privileges!</h1>';
            require_once '../db/EditPlaces.php';
        }
    }
    require_once '../includes/footer.php';    
?>