<html>
<head>
<title>Search Song</title>
</head>
<body>
<?php
// Do not have to use connect defined below if using mysqli_connect file
// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'db5');
DEFINE ('DB_PORT', '8889');

$Name = "";
$Duration = "";
$Year_Released = "";
$Band_id = "";
$Album = "";
$Song_id = "";

// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

//find info related to entered name (as in song name) 
function getPosts(){
		$posts = array();
		$posts[0] = $_POST['Name'];
		$posts[1] = $_POST['Duration'];
		$posts[2] = $_POST['Year_Released'];
		$posts[3] = $_POST['Band_id'];
		$posts[4] = $_POST['Album'];
		$posts[5] = $_POST['Song_id'];
		return $posts;
}

if(isset($_POST['search'])) {
	
	$search_query = $_POST['song_name'];

	$query = "SELECT (Name, Duration, Year_Released,
			  Band_id, Album, Song_id) FROM song WHERE 
			  Name = ".$search_query."";

	$search_result = mysqli_query($dbc, $query);
	
	if($search_result){
			if(mysqli_num_rows($search_result)){
				echo '<table align="left"
				cellspacing="5" cellpadding="8">

				<tr><td align="left"><b>Song Name</b></td>
				<td align="left"><b>Duration</b></td>
				<td align="left"><b>Year Released</b></td>
				<td align="left"><b>Bands ID</b></td>
				<td align="left"><b>Album</b></td>
				<td align="left"><b>Song ID</b></td>';

				while($row = mysqli_fetch_array($search_result)){
					$Name = $row['Name'];
					$Duration = $row['Duration'];
					$Year_Released = $row['Year_Released'];
					$Band_id = $row['Band_id'];
					$Album = $row['Album'];
					$Song_id = $row['Song_id'];
					
					echo '<tr><td align="left">' . 
						$row['Name'] . '</td><td align="left">' . 
						$row['Duration'] . '</td><td align="left">' .
						$row['Year_Released'] . '</td><td align="left">' . 
						$row['Band_id'] . '</td><td align="left">' .
						$row['Album'] . '</td><td align="left">' . 
						$row['Song_id'] . '</td><td align="left">';

					echo '</tr>'; 
				}
				mysqli_close($dbc);
				echo '</table>'; 
			} else {
				echo "No data for this song name. Try again.";
			} 
	}

}
?> 

<form action="searchSong.php" method="post">

<b>Find Song</b>

<p>Song Name:
<input type="text" name="song_name" size="30" value="" />
</p>

<p>
<input type="submit" name="search" value="Search" />
</p>

</form>
</body>
</html>