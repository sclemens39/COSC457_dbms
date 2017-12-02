<?php
    if (!isset($_SESSION)) session_start();
    session_unset();
    session_destroy();
    unset($_SESSION['loggedin']);
    header("Location: ../pages/splash.php");
?>