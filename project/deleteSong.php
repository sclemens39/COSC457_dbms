<html>
<head>
<title>Delete Song</title>
</head>
<body>
<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'dbms');
DEFINE ('DB_PORT', '8889');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

if(isset($_POST['delete'])) {

	//user entered data
	$search_query = $_POST['song_name'];

	// sql to delete a record
	$sql = "DELETE FROM song WHERE ".$search_query."";

	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}
?>

<!--where here ever server is located-->
<form action="localhost:8888/PHP/deleteSong.php" method="post">
    
<b>Delete a song</b>
    
<p>Song Name:
<input type="text" name="song_name" size="30" value="" />
</p>

<p>
<input type="delete" name="delete" value="Send" />
</p>
    
</form>
</body>
</html>