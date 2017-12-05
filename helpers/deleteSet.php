<?php
    session_start();
    include("../mysqli_connect.php");
        $p = $_GET["show"];
        $s = $_GET["song"];
        $q = $db->prepare("DELETE FROM Setlist WHERE Performance_id = ? AND Song_id = ?");
        $q->bind_param("ss",$p,$s);
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