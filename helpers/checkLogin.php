<?php
    session_start();
    include("../mysqli_connect.php");
    if (isset($_SESSION["user"])) {
        // already logged in
        header("Location: ../pages/home.php");
    } else if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $user = $_POST["email"];

        $q = $db->prepare("SELECT * FROM User WHERE Email = ?");
        $q->bind_param("s", $user);
        $q->execute();
        $result = $q->get_result();

        if ($result->num_rows == 1) {
            // user successfully authenticated
            $_SESSION["user"] = $result->fetch_array(MYSQLI_ASSOC);
            header("Location: ../pages/home.php");
        } else {
            header("Location: ../pages/login.php");
        }
    } 
?>
