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
    
    <br>
    <div class = "container">
        <div class = "col-md-4 mx-auto" style="margin-top:100px;">
        <h3>Register</h3>
        <form method="post" action = "../helpers/registerUser.php">
            <div class="form-group">
                <label for="inputFirst">First name</label>
                <input required type="text" class="form-control" name = "first" id="first" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label for="inputLast">Last name</label>
                <input required type="text" class="form-control" name = "last" id="last" placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label for="inputAge">Age</label>
                <input required type="number" class="form-control" name = "age" id="age" min="18" max="99" placeholder="18">
            </div>
            <hr>
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input required type="email" class="form-control" name = "email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We won't share</small>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input required type="password" class="form-control" name = "password" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        </div>
    </div>

    <footer class="text-muted">
        <div class="container text-center">
            <p>This is a footer</p>
        </div>
    </footer>
</body>
</html>