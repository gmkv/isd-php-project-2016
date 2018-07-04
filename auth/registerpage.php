<?php 
    require_once '../includes/head.php';
    require_once '../includes/nav.php';
    require_once '../includes/init.php';
    require_once '../auth/registerform.php';
    if (isset($_SESSION['Username'])) {
        header('location: ../home.php');
    }
    
    require_once '../includes/footer.php';
?>