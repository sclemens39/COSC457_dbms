<?php
    session_start();
    include("../mysqli_connect.php");
        $id = $_GET["id"];
        $q = $db->prepare("DELETE FROM Performance WHERE Performance_id = ?");
        $q->bind_param("s",$id);
        $q->execute();
        if ($db->affected_rows == 1) {
            echo "Successfully deleted!";
            header("Location: ../pages/admin.php");
        }   
        else{
            echo "Error! Contact DB Administrator";
            header("Location: ../pages/admin.php");
        }
?>