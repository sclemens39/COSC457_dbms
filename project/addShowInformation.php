<html>
<head>
<title>Add Show</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['Venue_id'])){

        // Adds name to array
        $data_missing[] = 'Venue_id';

    } else {

        // Trim white space from the name and store the name
        $Venue_id = trim($_POST['Venue_id']);

    }

    if(empty($_POST['Band_id'])){

        // Adds name to array
        $data_missing[] = 'Band_id';

    } else {

        // Trim white space from the name and store the name
        $Band_id = trim($_POST['Band_id']);

    }	
	
    if(empty($_POST['Performance_date'])){

        // Adds name to array
        $data_missing[] = 'Performance_date';

    } else {

        // Trim white space from the name and store the name
        $Performance_date = trim($_POST['Performance_date']);

    }	
	
    if(empty($_POST['Duration'])){

        // Adds name to array
        $data_missing[] = 'Duration';

    } else{
        
		$concert_duration = trim($_POST['Duration']);

    }

    if(empty($_POST['Performance_id'])){

        // Adds name to array
        $data_missing[] = 'Performance_id';

    } else {

        // Trim white space from the name and store the name
        $Performance_id = trim($_POST['Performance_id']);

    }

    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO performance (Venue_id, Band_id, Performance_date,
		Duration, Performance_id) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
		//parameters = database var names
        mysqli_stmt_bind_param($stmt, "ssiis", $Venue_id, $Band_id,
								$Performance_date, $concert_duration, 
								$Performance_id);
        
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

<!--where ever server is located-->
<form action="addShowInformation.php" method="post">
    
<b>Add a New Show or Concert</b>
    
<p>Venue ID:
<input type="text" name="Venue_id" size="30" value="" />
</p>

<p>Band ID:
<input type="text" name="Band_id" size="10" value="" />
</p>

<p>Performance_date:
<input type="text" name="Performance_date" size="10" value="" />
</p>

<p>Duration:
<input type="text" name="Duration" size="10" value="" />
</p>

<p>Performance ID:
<input type="text" name="Performance_id" size="10" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>