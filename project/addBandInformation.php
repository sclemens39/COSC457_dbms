<html>
<head>
<title>Add Band</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['Band_Name'])){

        // Adds name to array
        $data_missing[] = 'Band_Name';

    } else {

        // Trim white space from the name and store the name
        $Band_Name = trim($_POST['Band_Name']);

    } 

    if(empty($_POST['Band_id'])){

        // Adds name to array
        $data_missing[] = 'Band_id';

    } else {

        // Trim white space from the name and store the name
        $Band_id = trim($_POST['Band_id']);

    }	
	
    if(empty($_POST['Formation_Date'])){

        // Adds name to array
        $data_missing[] = 'Formation_Date';

    } else{
        
		// whatever variable for duration
		$Formation_Date = trim($_POST['Formation_Date']);

    }

    if(empty($_POST['Breakup_Date'])){

        // Adds name to array
        $data_missing[] = 'Breakup_Date';

    } else {

        // Trim white space from the name and store the name
        $Breakup_Date = trim($_POST['Breakup_Date']);

    }

    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO band (Band_Name, Band_id, Formation_Date,
		Breakup_Date) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "ssss", $Band_Name, $Band_id,
                               $Formation_Date, $Breakup_Date);
        
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
<input type="text" name="Band_Name" size="30" value="" />
</p>

<p>Band Id:
<input type="text" name="Band_id" size="5" value="" />
</p>

<p>Date formed:
<input type="text" name="Formation_Date" size="10" value="" />
</p>

<p>Disband Date:
<input type="text" name="Breakup_Date" size="10" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>