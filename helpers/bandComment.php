<?php
    session_start();
    include("../mysqli_connect.php");
        $band = $_GET["id"];
        $comment = $_POST['comment'];
        $user = $_SESSION['user']['User_id'];
        $id = uniqid(rand(0,20000000),true);

        $q = $db->prepare("INSERT INTO BandComments(Band_id,User_id,Comment,Count_id)
                            VALUES(?, ?, ?, ?);");
        $q->bind_param("ssss", $band,$user,$comment,$id);
        $q->execute();
        $result = $q->get_result();
        if ($db->affected_rows == 1) {
            // user successfully authenticated
            ?><script type='text/javascript'>alert('Comment added!');</script><?
            header("Location: ../pages/artistinfo.php?id={$band}");
        } else {
            ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
            header("Location: ../pages/artistinfo.php?id={$band}");
        }
?>