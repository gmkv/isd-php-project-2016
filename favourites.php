<?php
        require_once 'includes/init.php';
        require_once 'includes/head.php';
        require_once 'includes/nav.php';
        if(!isset($_SESSION['Username'])) {
            header("Location: home.php");
        }
?>
    <section>
    <h2>Your favourite places:</h2>
    
    <?php 
    
    
    
    ?>
    <?php require_once 'db/DisplayFavourites.php'; ?>
    <small>This list is not extensive, of course, but it is a good starting ground!</small>
    </section>

<?php require_once 'includes/footer.php';?>