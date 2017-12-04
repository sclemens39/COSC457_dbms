<?php
	include "../mysqli_connect.php" 

	$id =$_REQUEST['Song_id'];
	
	
	// sending query
	mysql_query("DELETE FROM song WHERE Song_id = '$id'")
	or die(mysql_error());  	
	
	header("Location: admin.php");
?>