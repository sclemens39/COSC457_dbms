<?php 
session_start();
include "../mysqli_connect.php";
$q = $db->prepare("UPDATE Band SET Band_Name = ?, Formation_Date = ?, Breakup_Date = ? WHERE Band_id = ?");
$q->bind_param("ssss", $_POST['data'][1],$_POST['data'][2],$_POST['data'][3],$_POST['data'][0]);
$q->execute();
if ($db->affected_rows == 1) {
    echo "Successfully updated!";
}
else{
    echo "Error! Contact DB Administrator";
}
$q->close();
?>