<html>
<head>
<title>Add Show</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['state'])){

        // Adds name to array
        $data_missing[] = 'state';

    } else {

        // Trim white space from the name and store the name
        $concert_state = trim($_POST['state']);

    }

    if(empty($_POST['duration'])){

        // Adds name to array
        $data_missing[] = 'Duration';

    } else{
        
		$concert_duration = trim($_POST['duration']);

    }

    if(empty($_POST['city'])){

        // Adds name to array
        $data_missing[] = 'city';

    } else {

        // Trim white space from the name and store the name
        $concert_city = trim($_POST['city']);

    }
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO performance (state, duration, city) 
		VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
		//parameters = database var names
        mysqli_stmt_bind_param($stmt, "sss", $concert_state,
                              $concert_duration, $concert_city);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Concert has been entered successfully';
            
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
<form action="localhost:8888/PHP/addShowInformation.php" method="post">
    
<b>Add a New Show or Concert</b>
    
<p>State:
<input type="text" name="state" size="30" value="" />
</p>

<p>City:
<input type="text" name="city" size="4" value="" />
</p>

<p>Duration:
<input type="text" name="duration" size="10" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>