<?php
echo '<h2>Manage Records</h2> 

<div id="adminpanel" class="flex-container">';

$query="SELECT * FROM record";
$result = mysqli_query($connection, $query);
echo '
<table border="1" id="admintable">
    <tr>
        <th>Record name</th>
        <th>Entry Price</th>
        <th>Image</th>
        <th>Amend</th>
        <th>Delete</th>
    </tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '
    <tr>
        <td>'.$row['RecordName'].'</td>
        <td>'.$row['RecordPrice'].'</td>
        <td><img src="../images/'.$row['RecordImageName'].'"></td>
        <td><a href="../db/AmendRecord.php?RecordID='.$row['RecordID'].'">Amend</a></td>
        <td><a href="../db/DeleteRecord.php?RecordID='.$row['RecordID'].'">Delete</a></td>
    </tr>';
    }
echo '</table>';
?>
<form action="../db/InsertRecord.php" method="POST" id="adminform">
    <fieldset>
    <legend>Enter new record details</legend>
        Record name: <br>
        <input type="text" name="RecordName"> <br>
        Price: <br>
        <input type="text" name="RecordPrice"> <br>
        Image filename:     (e.g. record.jpg ) <br>
        <input type="text" name="RecordImageName"> <br> <br>
        <input type="submit" value="Submit">
        <input type="reset" value="Clear">
    </fieldset>
</form>
</div>
