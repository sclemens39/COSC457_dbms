<?php
    session_start();
    include("../mysqli_connect.php");
        $a = $_GET["album"];
        $s = $_GET["song"];
        $q = $db->prepare("DELETE FROM AlbumTracks WHERE Album_id = ? AND Song_id = ?");
        $q->bind_param("ss",$a,$s);
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