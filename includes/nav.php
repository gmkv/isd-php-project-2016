<nav>
    <ul class="flex-container">
        <li class="flex-item"><a href="/assignment/home.php">Home</a></li>
        <li class="flex-item"><a href="/assignment/auth/loginpage.php">
                    <?php if(isset($_SESSION['Username']))
                            echo 'Account';
                          else 
                            echo 'Login';
                          
                    ?></a></li>
        <li class="flex-item"><a href="/assignment/list.php">The List</a></li>
        <li class="flex-item"><a href=<?php 
        if (isset($_SESSION['Username'])) { // if user is logged in, the favs link will point them to the correct page
            echo "/assignment/favourites.php";
        } else {                            // if user is not logged in, the favs link will point them to the login page
            echo "/assignment/auth/loginpage.php";
        }
        ?>
        >Favourites</a></li>
    </ul>
    <?php if($_SESSION['AdminPrivilege']) {
        echo '<div id="admin"><strong><em>You have administrator privileges! 
        You can edit the places <a href="/assignment/auth/loginpage.php">here</a>.</em></strong></div>';
    }
    ?>
</nav>