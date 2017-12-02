<?php
    session_start();
    include("../mysqli_connect.php");
        $band = $_GET["id"];
        $user = $_SESSION['user']['User_id'];
        $q = $db->prepare("SELECT * FROM FavoriteBands WHERE User_id = ? AND Band_id = ?");
        $q->bind_param("ss", $user,$band);
        $q->execute();
        $result = $q->get_result();
        if(mysqli_num_rows($result) == false){
            $band = $_GET["id"];
            $user = $_SESSION['user']['User_id'];
            $q = $db->prepare("INSERT INTO FavoriteBands(User_id,Band_id)
                                VALUES(?, ?);");
            $q->bind_param("ss", $user,$band);
            $q->execute();
            $result = $q->get_result();
            if ($db->affected_rows == 1) {
                // user successfully authenticated
                ?><script type='text/javascript'>alert('Band has been added to your favorites!');</script><?
                header("Location: ../pages/home.php");
            } else {
                ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
                header("Location: ../pages/artistInfo.php?id={$band}");
            }
        } else {
                ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
                header("Location: ../pages/artistInfo.php?id={$band}");
        } 
?>