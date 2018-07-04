<?php 
if ($_SESSION['Favourites'][0] == 0) {
    echo "<h2>Your favourites list is empty!</h2>";
}
$ListFavourites = 'SELECT record.* 
                FROM record, favourite 
                WHERE favourite.UserID = '.$_SESSION['UserID'].' 
                    AND favourite.RecordID = record.RecordID;';

    $result = mysqli_query($connection,$ListFavourites);
    echo "<ul class=\"flex-container list\">";
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['RecordID'];
        $imgsrc = $row['RecordImageName'];
        $imgtitle = $row['RecordName'];
        $p = $row['RecordName'];
        $price = $row['RecordPrice'];
        $price = number_format($price, 2);
            if ($price == 0) {
                $price = "Free entry";
            }
        echo "
            <li class=\"flex-item\">
                <img src=\"images/$imgsrc\" alt=\"Photo of $imgtitle\">
                <p>$p <span>Entry price: $price</span> </p>
                <a href=\"db/RemoveFavourites.php?RecordID=$id\">Remove from favourites</a>
            </li>
            ";
        }
    echo '</ul>';
?>