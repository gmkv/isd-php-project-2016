<?php
require_once '../includes/init.php';
$RecordID = $_GET['RecordID'];
$query = "DELETE FROM record WHERE RecordID=$RecordID";
mysqli_query($connection, $query);

if (mysqli_affected_rows($connection) > 0) {
      /* jore: success, rows have been affected, redirecting back
         to calling page(stored in the server variables) */
      header("Location: {$_SERVER['HTTP_REFERER']}");

} else {
      // print error message = no rows have been affected by the query
      echo "Error in query: $query. " . mysqli_error($connection);
      exit() ;
}		
?>
