<?php
    session_start();
    include("../mysqli_connect.php");
        $album = $_POST["albumID"];
        $song = $_POST["songID"];
        $q = $db->prepare("SELECT * FROM AlbumTracks WHERE Album_id = ? AND Song_id = ?");
        $q->bind_param("ss", $album,$song);
        $q->execute();
        $result = $q->get_result();
        if(mysqli_num_rows($result) == false){
            $band = $_GET["id"];
            $user = $_SESSION['user']['User_id'];
            $q = $db->prepare("INSERT INTO AlbumTracks(Album_id,Song_id)
                                VALUES(?, ?);");
            $q->bind_param("ss", $album,$song);
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