<html>
<head>
<title>Add Band</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['band_name'])){

        // Adds name to array
        $data_missing[] = 'Band name';

    } else {

        // Trim white space from the name and store the name
        $band_name = trim($_POST['band_name']);

    }

    if(empty($_POST['date_formed'])){

        // Adds name to array
        $data_missing[] = 'Date formed';

    } else{
        
		// whatever variable for duration
		$date_formed = trim($_POST['date_formed']);

    }

    if(empty($_POST['date_breakup'])){

        // Adds name to array
        $data_missing[] = 'Date Disband';

    } else {

        // Trim white space from the name and store the name
        $date_breakup = trim($_POST['date_breakup']);

    }

    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO band (band_name, date_formed,
		date_breakup) VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "sss", $band_name,
                               $date_formed, $date_breakup);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Member has been entered successfully';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred' <br>;
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
<form action="localhost:8888/PHP/addBandInformation.php" method="post">
    
<b>Add a NEW Band</b>
    
<p>Band Name:
<input type="text" name="b_name" size="30" value="" />
</p>

<p>Date formed:
<input type="text" name="date_formed" size="4" value="" />
</p>

<p>Disband Date:
<input type="text" name="date_breakup" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>