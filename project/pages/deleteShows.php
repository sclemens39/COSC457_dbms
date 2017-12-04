<?php
    session_start();
    include("../mysqli_connect.php");
        $show = $_GET["id"];
        $user = $_SESSION['user']['User_id'];
        $q = $db->prepare("DELETE FROM ShowsAttended WHERE User_id = ? AND Performance_id = ?");
        $q->bind_param("ss", $user,$show);
        $q->execute();
        if ($db->affected_rows == 1) {
                // user successfully authenticated
                ?><script type='text/javascript'>alert('Show has been deleted!');</script><?
                header("Location: ../pages/home.php");
        } else {
                ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
                header("Location: ../pages/home.php");
        }
?>