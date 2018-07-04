<?php
require_once '../includes/init.php';
$RecordID = $_GET['RecordID'];
$query = "SELECT * FROM record WHERE RecordID=$RecordID";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
?>
<form action="UpdateRecord.php" method="post">
    <fieldset>
        <legend>Update details for the product</legend>
        <input type="hidden" value="<?php echo $row['RecordID']; ?>" name="RecordID" >
        Product name: <br>
        <input type="text" value="<?php echo $row['RecordName']; ?>" name="RecordName" > <br>
        Product price: <br>
        <input type="text" value="<?php echo $row['RecordPrice']; ?>" name="RecordPrice" > <br>
        Image filename: <br>
        <input type="text" value="<?php echo $row['RecordImageName']; ?>" name="RecordImageName"> <br> <br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </fieldset>
</form>
