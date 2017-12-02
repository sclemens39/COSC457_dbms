<?php
    session_start();
    include("../mysqli_connect.php");
        $band = $_GET["id"];
        $user = $_SESSION['user']['User_id'];
        $q = $db->prepare("DELETE FROM FavoriteBands WHERE User_id = ? AND Band_id = ?");
        $q->bind_param("ss", $user,$band);
        $q->execute();
        if ($db->affected_rows == 1) {
                // user successfully authenticated
                ?><script type='text/javascript'>alert('Band has been deleted!');</script><?
                header("Location: ../pages/home.php");
        } else {
                ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
                header("Location: ../pages/home.php");
        }
?>