<html>
<head>
<title>Add Band Member</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['Band_id'])){

        // Adds name to array
        $data_missing[] = 'Band_id';

    } else {

        // Trim white space from the name and store the name
        $Band_id = trim($_POST['Band_id']);

    }
	
	if(empty($_POST['Fname'])){

        // Adds name to array
        $data_missing[] = 'Fname';

    } else{
        
		$Fname = trim($_POST['Fname']);

    }

    if(empty($_POST['Lname'])){

        // Adds name to array
        $data_missing[] = 'Lname';

    } else{
        
		$Lname = trim($_POST['Lname']);

    }

    if(empty($_POST['Years_active'])){

        // Adds name to array
        $data_missing[] = 'Years_active';

    } else{
        
		$Years_active = trim($_POST['Years_active']);

    if(empty($_POST['Instrument'])){

        // Adds name to array
        $data_missing[] = 'Instrument';

    } else{
        
		$Instrument = trim($_POST['Instrument']);

    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO bandmembers (Band_id, Fname, Lname, Years_active,
		Instrument) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "sssis", $Band_id, $Fname, $Lname,
								$Years_active, $Instrument);
        
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

<!--where ever server is located-->
<form action="localhost:8888/PHP/addMemberInformation.php" method="post">
    
<b>Add a NEW Member</b>

<p>Band ID:
<input type="text" name="Band_id" size="30" value="" />
</p>

<p>Band Member First Name:
<input type="text" name="Fname" size="30" value="" />
</p>

<p>Band Member Last Name:
<input type="text" name="Lname" size="30" value="" />
</p>

<p>Years active:
<input type="text" name="Years_active" size="30" value="" />
</p>

<p>Instrument:
<input type="text" name="Instrument" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>