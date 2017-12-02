<?php
    if (!isset($_SESSION)) session_start();
    
    include("../mysqli_connect.php");
        $user = $_SESSION['user']['User_id'];
        $q = $db->prepare("DELETE FROM USER WHERE User_id = ?");
        $q->bind_param("s", $user);
        $q->execute();
        if ($db->affected_rows == 1) {
                $user = $_SESSION['user']['User_id'];
                $q = $db->prepare("DELETE FROM FavoriteBands WHERE User_id = ?");
                $q->bind_param("s", $user);
                $q->execute();
                $q = $db->prepare("DELETE FROM ShowsAttended WHERE User_id = ?");
                $q->bind_param("s", $user);
                $q->execute();
                $q = $db->prepare("DELETE FROM BandComments WHERE User_id = ?");
                $q->bind_param("s", $user);
                $q->execute();
                $q = $db->prepare("DELETE FROM PerformanceComments WHERE User_id = ?");
                $q->bind_param("s", $user);
                $q->execute();

                ?><script type='text/javascript'>alert('User has been deleted!');</script><?
                session_unset();
                session_destroy();
                unset($_SESSION['user']);
                header("Location: ../pages/splash.php");
        } else {
                ?><script type='text/javascript'>alert('Error. Please try again.');</script><?
                header("Location: ../pages/profile.php");
        }
?>