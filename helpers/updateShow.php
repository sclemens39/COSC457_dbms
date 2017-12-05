<?php 
session_start();
include "../mysqli_connect.php";
$q = $db->prepare("UPDATE Performance SET Performance_date = ?, Duration = ?, WHERE Performance_id = ?");
$q->bind_param("sss", $_POST['data'][3],$_POST['data'][4],$_POST['data'][0]);
$q->execute();
if ($db->affected_rows == 1) {
    echo "Successfully updated!";
}
else{
    echo "Error!";
}
$q->close();
?>