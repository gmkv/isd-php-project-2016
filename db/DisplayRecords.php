<?php 
    require_once 'includes/functions.php';
    $OrderCheck = FALSE;
    if(isset($_GET['order_by'])){
        $Order = CleanString($_GET['order_by']);
        $OrderCheck = TRUE; // confirms that the isset check has gone through, else multiple errors will be shown in the html source
    }
    $SearchCheck = FALSE;
    if(!empty($_GET['search'])){
        $word = CleanString($_GET['search']);
        $word = mysqli_real_escape_string($connection, $word);
        $SearchCheck = TRUE;
    }
?>
<section>
    <form id="orderform" class="flex-container" method="get" action="">
        <div class="flex-container">
            <label for="order_by">Sort list by:</label>        
            <select name="order_by">
                <option value="date_asc" <?php if($OrderCheck && $Order == 'date_asc') echo ' selected'; ?>>Date added ascending</option>
                <option value="date_desc" <?php if($OrderCheck && $Order== 'date_desc') echo ' selected'; ?>>Date added descending</option>
                <option value="fee_asc" <?php if($OrderCheck && $Order== 'fee_asc') echo ' selected'; ?>>Entry fee ascending</option>
                <option value="fee_desc"<?php if($OrderCheck && $Order== 'fee_desc') echo ' selected'; ?>>Entry fee descending</option>
                <option value="name_asc" <?php if($OrderCheck && $Order == 'name_asc') echo ' selected'; ?>>Name ascending</option>
                <option value="name_desc" <?php if($OrderCheck && $Order== 'name_desc') echo ' selected'; ?>>Name descending</option>
            </select>
            <input type="text" placeholder="Search for places..." name="search">
            <input type="submit" value="Submit">
        </div>
    </form>
</section>
<?php
    if (isset($Order)) {
            $Select = "SELECT * FROM record ";
            if ($SearchCheck && !empty($word) ) {
                $Select .= "WHERE RecordName LIKE '%$word%' OR RecordPrice LIKE '%$word%' ";
            }
            $ListRecords = "";
            switch ($Order) {
                case "date_asc":
                    $ListRecords = $Select."ORDER BY RecordID ASC";
                    break;
                case "date_desc":
                    $ListRecords = $Select."ORDER BY RecordID DESC";
                    break;
                case "fee_asc":
                    $ListRecords = $Select."ORDER BY RecordPrice ASC;";
                    break;
                case "fee_desc":
                    $ListRecords = $Select."ORDER BY RecordPrice DESC;";
                    break;
                case "name_asc":
                    $ListRecords = $Select."ORDER BY RecordName ASC;";
                    break;
                case "name_desc":
                    $ListRecords = $Select."ORDER BY RecordName DESC;";
                    break;                 
                default:
                    $ListRecords = $Select.';';
        }
    } else {
        $ListRecords = "SELECT * FROM record;";
    }
    
    if ($SearchCheck) { // a search is made
        if (!strcasecmp($word, 'free') || !strcasecmp($word, 'free entry')) { // checks if search is for free places
            $word = "0";
        }
    };
    $result = mysqli_query($connection,$ListRecords);
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
        echo    "<li class=\"flex-item\">
                <img src=\"images/$imgsrc\" alt=\"Photo of $imgtitle\">
                <p>$p <span>Entry price: $price</span> </p>";
        if(isset($_SESSION['Username'])) { // will add "add to favs"/"remove from favs" links if user is logged
            $FoundKey = FALSE; // prevents the "remove from favs" link subsitution if user has no favourites
            if( array_key_exists(0, $_SESSION['Favourites']) ) {
                $key = array_search($id, $_SESSION['Favourites']); // checks if the $RecordID is found in the Favourites array
                $FoundKey = TRUE;
            }
            if( $FoundKey && $id == $_SESSION['Favourites'][$key] ) {
                echo "<a href=\"db/RemoveFavourites.php?RecordID=$id\">Remove from favourites</a></li>"; } // if found, puts a "remove from favs" link
            else {
                echo "<a href=\"db/AddFavourites.php?RecordID=$id\">Add to favourites</a></li>"; } // if not found, then it's not in the user's favs
        } else {
            echo "</li>"; // if user is not logged in, will just close the li to maintain valid markup
        }
    }
    echo '</ul>';
?>