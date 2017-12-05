<?php
    session_start();
    include("../mysqli_connect.php");
        $show = $_POST["showID"];
        $song = $_POST["songID"];
        $q = $db->prepare("SELECT * FROM Setlist WHERE Performance_id = ? AND Song_id = ?");
        $q->bind_param("ss", $show,$song);
        $q->execute();
        $result = $q->get_result();
        if(mysqli_num_rows($result) == false){
            $band = $_GET["id"];
            $user = $_SESSION['user']['User_id'];
            $q = $db->prepare("INSERT INTO Setlist(Performance_id,Song_id)
                                VALUES(?, ?);");
            $q->bind_param("ss", $show,$song);
            $q->execute();
            $result = $q->get_result();
            if ($db->affected_rows == 1) {
                // user successfully authenticated
                header("Location: ../pages/admin.php");
            } else {
                ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
                header("Location: ../pages/admin.php");
            }
        } else {
                ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
                header("Location: ../pages/admin.php");
        } 
?>