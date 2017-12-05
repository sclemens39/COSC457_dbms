<?php 
session_start();
include "../mysqli_connect.php";
if (!(isset($_SESSION["user"]))) {
        header("Location: ../pages/splash.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Music App</title>
    <link href="style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.js"></script>

</head>

<body>

    <div id="navBar"></div>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-12 card border-success" style="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="holder.js/200x200?/thumb" alt="" class="" />
                            </div>
                            <div class="col-md-7">
                                <h3>
                                    <?echo $_SESSION['user']['Fname']?>
                                        <?echo $_SESSION['user']['Lname']?>
                                </h3>
                                <p>
                                    <i class=""></i>Email:
                                    <?echo $_SESSION['user']['Email']?>
                                        <br />
                                        <i class=""></i>Age:
                                        <?echo $_SESSION['user']['Age']?>
                                            <br />

                                </p>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Actions
                                        <span class="caret"></span>
                                        <span class="sr-only"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="../pages/home.php">Dashboard</a>
                                        </li>
                                        <? if($_SESSION['user']['Admin'] == 1){?><li>
                                            <a href="../pages/admin.php">Admin</a>
                                        </li><?}?>
                                        <li>
                                            <a href="../helpers/logout.php">Logout</a>
                                        </li>
                                        <li>
                                            <hr>
                                        </li>
                                        <li>
                                            <a href="../helpers/deleteUser.php" onclick="return confirm('Are you sure?');">Delete Account</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-muted">
        <div class="container text-center">
            <p>2017</p>
        </div>
    </footer>
</body>
<script>
    $(function () {
        $('#navBar').load('master.html');
    });
</script>

</html>