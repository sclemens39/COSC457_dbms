<?php
    session_start();
    include("../mysqli_connect.php");
        $show = $_GET["id"];
        $user = $_SESSION['user']['User_id'];
        $q = $db->prepare("SELECT * FROM ShowsAttended WHERE User_id = ? AND Performance_id = ?");
        $q->bind_param("ss", $user,$show);
        $q->execute();
        $result = $q->get_result();
        if(mysqli_num_rows($result) == false){
            $show = $_GET["id"];
            $user = $_SESSION['user']['User_id'];
            $q = $db->prepare("INSERT INTO ShowsAttended(User_id,Performance_id)
                                VALUES(?, ?);");
            $q->bind_param("ss", $user,$show);
            $q->execute();
            $result = $q->get_result();
            if ($db->affected_rows == 1) {
                // user successfully authenticated
                ?><script type='text/javascript'>alert('Performance has been added to your dashboard!');</script><?
                header("Location: ../pages/home.php");
            } else {
                ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
                header("Location: ../pages/showInfo.php?id={$show}");
            }
        } else {
                ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
                header("Location: ../pages/showInfo.php?id={$show}");
        } 
?>