<?php
    session_start();
    include("../mysqli_connect.php");
        $comment = $_GET["id"];
        $q = $db->prepare("DELETE FROM BandComments WHERE Count_id = ?");
        $q->bind_param("s",$comment);
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