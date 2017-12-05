<?php 
session_start();
include "../mysqli_connect.php";
$q = $db->prepare("UPDATE Song SET Song.Name = ?, Album = ?, Duration = ?, Year_Released = ? WHERE Song_id = ?");
$q->bind_param("sssss", $_POST['data'][2],$_POST['data'][3],$_POST['data'][4],$_POST['data'][5],$_POST['data'][0]);
$q->execute();
if ($db->affected_rows == 1) {
    echo "Successfully updated!";
}
else{
    echo "Error! Contact DB Administrator";
}
$q->close();
?>