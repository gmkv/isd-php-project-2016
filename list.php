<?php
        require_once 'includes/init.php';
        require_once 'includes/head.php';
        require_once 'includes/nav.php'; ?>
    <section>
    <h2>Georgi's recommended sights to be seen:</h2>
    
    <?php require_once 'db/DisplayRecords.php'; ?>
    
    <small>This list is not extensive, of course, but it is a good starting ground!</small>
    </section>

<?php require_once 'includes/footer.php';?>