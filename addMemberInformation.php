<html>
<head>
<title>Add Band Member</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['member_name'])){

        // Adds name to array
        $data_missing[] = 'Member Name';

    } else {

        // Trim white space from the name and store the name
        $mem_name = trim($_POST['member_name']);

    }

    if(empty($_POST['years_active'])){

        // Adds name to array
        $data_missing[] = 'Years Active';

    } else{
        
		$mem_active_years = trim($_POST['years_active']);

    }

    if(empty($_POST['position'])){

        // Adds name to array
        $data_missing[] = 'Postion';

    } else {

        // Trim white space from the name and store the name
        $mem_position = trim($_POST['position']);

    }

    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO member (member_name, years_active, 
		position) VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "sis", $mem_name,
		$mem_active_years, $mem_position);
        
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
<form action="localhost:8888/PHP/addMemberInformation.php" method="post">
    
<b>Add a NEW Band Member</b>
    
<p>Band Member Name:
<input type="text" name="member_name" size="30" value="" />
</p>

<p>Year(s) as part of the band:
<input type="text" name="years_active" size="4" value="" />
</p>

<p>Position of the band:
<input type="text" name="postion" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>