<html>
<head>
<title>Add User</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['f_name'])){

        // Adds name to array
        $data_missing[] = 'first name';

    } else {

        // Trim white space from the name and store the name
        $u_f_name = trim($_POST['f_name']);

    }

    if(empty($_POST['l_name'])){

        // Adds name to array
        $data_missing[] = 'last name';

    } else{
        
		$u_l_name = trim($_POST['l_name']);

    }

    if(empty($_POST['status'])){

        // Adds name to array
        $data_missing[] = 'status';

    } else {

        // Trim white space from the name and store the name
        $u_status = trim($_POST['status']);

    }

    if(empty($_POST['age'])){

        // Adds name to array
        $data_missing[] = 'age';

    } else {

        // Trim white space from the name and store the name
        $u_age = trim($_POST['age']);

    }
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO user (f_name, l_name, status, 
		age) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
		//status should be ? 
        mysqli_stmt_bind_param($stmt, "sssi", $u_f_name, $u_l_name,
                               $u_status, $u_age);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'User has been entered successfully';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred. Ctrl + r and try again.' <br>;
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data' <br>;
        
        foreach($data_missing as $missing){
            
            echo "$missing" <br>;
            
        }
        
    }
    
}

?>

<!--where here ever server is located-->
<form action="localhost:8888/PHP/addUserInformation.php" method="post">
    
<b>Add a New User</b>
    
<p>First Name:
<input type="text" name="f_name" size="30" value="" />
</p>

<p>Last Name:
<input type="text" name="l_name" size="30" value="" />
</p>

<p>Status:
<input type="text" name="status" size="10" value="" />
</p>

<p>Age:
<input type="text" name="age" size="3" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>