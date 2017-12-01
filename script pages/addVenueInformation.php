<html>
<head>
<title>Add User</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['v_name'])){

        // Adds name to array
        $data_missing[] = 'first name';

    } else {

        // Trim white space from the name and store the name
        $v_name = trim($_POST['v_name']);

    }

    if(empty($_POST['open_date'])){

        // Adds name to array
        $data_missing[] = 'Open Date';

    } else{
        
		$open_date = trim($_POST['open_date']);

    }

    if(empty($_POST['v_address'])){

        // Adds name to array
        $data_missing[] = 'Address';

    } else {

        // Trim white space from the name and store the name
        $v_address = trim($_POST['v_address']);

    }
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO venue (v_name, open_date, v_address)
		VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
		//status should be ? 
        mysqli_stmt_bind_param($stmt, "sss", $v_name, $open_date,
                               $v_address);
        
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
<form action="localhost:8888/PHP/addVenueInformation.php" method="post">
    
<b>Add a NEW Venue</b>
    
<p>Venue Name:
<input type="text" name="v_name" size="30" value="" />
</p>

<p>Date Opened (YYYY-MM-DD):
<input type="text" name="open_date" size="10" value="" />
</p>

<p>Address:
<input type="text" name="v_address" size="45" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>