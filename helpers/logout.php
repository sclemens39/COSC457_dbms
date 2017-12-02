<?php
    if (!isset($_SESSION)) session_start();
    session_unset();
    session_destroy();
    unset($_SESSION['user']);
    header("Location: ../pages/splash.php");
?>