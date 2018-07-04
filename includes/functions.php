<?php
function GetFavourites() {
    require_once 'init.php';
    $ListFavourites = 'SELECT record.RecordID 
                        FROM record, favourite 
                        WHERE favourite.UserID = '.$_SESSION['UserID'].' 
                            AND favourite.RecordID = record.RecordID;';
    $result = mysqli_query($connection, $ListFavourites);
    if (mysqli_num_rows($result) == 0 ) {   // checks if user has any favs already
        $_SESSION['Favourites'][0] = 0;     // if they dont, it prepares the first element of sesh[favs] to prevent calling undefined indeces
        return;                             // exits func as there are no favs (yet) to be appended to the array
    }
    if(isset($_SESSION['Favourites'])) {                 // checks if array has already been set, if yes -> then unsets it
        for ($i=0;count($_SESSION['Favourites']);$i++) { // as it causes the last values from any previous version of the
            unset($_SESSION['Favourites'][$i]);             // favs list to be left out
        }
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) { // copies favs from db to session array, used to change 'add to favs' links
        $_SESSION['Favourites'][$i++] = $row['RecordID']; 
    }
}
function CleanString($string) {
    $string = strip_tags($string);
    $string = trim($string);
    return $string;
}

?>