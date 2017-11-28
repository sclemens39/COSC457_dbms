<html>
<head>
<title>Add User</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['Fname'])){

        // Adds name to array
        $data_missing[] = 'Fname';

    } else {

        // Trim white space from the name and store the name
        $Fname = trim($_POST['Fname']);

    }

    if(empty($_POST['Lname'])){

        // Adds name to array
        $data_missing[] = 'Lname';

    } else{
        
		$Lname = trim($_POST['Lname']);

    }

    if(empty($_POST['Admin'])){

        // Adds name to array
        $data_missing[] = 'Admin';

    } else {

        // Trim white space from the name and store the name
        $Admin = trim($_POST['Admin']);

    } 

    if(empty($_POST['User_id'])){

        // Adds name to array
        $data_missing[] = 'User_id';

    } else {

        // Trim white space from the name and store the name
        $User_id = trim($_POST['User_id']);

    }	
	
    if(empty($_POST['age'])){

        // Adds name to array
        $data_missing[] = 'age';

    } else {

        // Trim white space from the name and store the name
        $u_age = trim($_POST['age']);

    }

    if(empty($_POST['email'])){

        // Adds name to array
        $data_missing[] = 'email';

    } else {

        // Trim white space from the name and store the name
        $email = trim($_POST['email']);

    }
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO user (Fname, Lname, Admin, User_id, 
		age, email) VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
		//status should be ? 
        mysqli_stmt_bind_param($stmt, "ssisis", $Fname, $Lname,
                               $Admin, $User_id, $u_age, $email);
        
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

<!--where ever server is located-->
<form action="localhost:8888/PHP/addUserInformation.php" method="post">
    
<b>Add a New User</b>
    
<p>First Name:
<input type="text" name="Fname" size="30" value="" />
</p>

<p>Last Name:
<input type="text" name="Lname" size="30" value="" />
</p>

<p>Status:
<input type="text" name="Admin" size="1" value="" />
</p>

<p>User ID:
<input type="text" name="User_id" size="8" value="" />
</p>

<p>Age:
<input type="text" name="age" size="3" value="" />
</p>

<p>Email:
<input type="text" name="email" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>