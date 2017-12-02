<?php
    session_start();
    include("../mysqli_connect.php");
    if (isset($_SESSION["user"])) {
        // already logged in
        header("Location: ../pages/home.php");
    } else {
        $first = $_POST['first'];
        $last = $_POST['last'];
        $age = $_POST['age'];
        $email = $_POST["email"];
        $id = uniqid(rand());
        
        $q = $db->prepare("INSERT INTO User(Fname,Lname,Admin,User_id,Age,Email)
                            VALUES(?, ?, FALSE, ?, ?, ?);");
        $q->bind_param("sssss", $first,$last,$id,$age,$email);
        $q->execute();
        $result = $q->get_result();
        if ($db->affected_rows == 1) {
            // user successfully authenticated
            header("Location: ../pages/login.php");
        } else {
            header("Location: ../pages/register.php");
        }
    } 
?>