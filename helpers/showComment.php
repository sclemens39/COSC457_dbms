<?php
    session_start();
    include("../mysqli_connect.php");
        $show = $_GET["id"];
        $comment = $_POST['comment'];
        $user = $_SESSION['user']['User_id'];
        $id = uniqid(rand(0,20000000),true);

        $q = $db->prepare("INSERT INTO PerformanceComments(Performance_id,User_id,Comment,Count_id)
                            VALUES(?, ?, ?, ?);");
        $q->bind_param("ssss", $show,$user,$comment,$id);
        $q->execute();
        $result = $q->get_result();
        if ($db->affected_rows == 1) {
            // user successfully authenticated
            ?><script type='text/javascript'>alert('Comment added!');</script><?
            header("Location: ../pages/showinfo.php?id={$show}");
        } else {
            ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
            header("Location: ../pages/showinfo.php?id={$show}");
        }
?>