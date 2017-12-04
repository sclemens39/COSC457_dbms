<?php
	include "../mysqli_connect.php"
	
	$id =$_REQUEST['Song_id'];
if(isset($_POST['submit'])) {
	
	$result = mysql_query("Update song SET (Name =".$song_name.", Duration =".$duration.",
							Year_Released = ".$song_year.", Album = ".$album.") 
							WHERE Song_id  = '$id'");
}	
?>
<html>
<head>
<title>Edit Song</title>
</head>
<body>

<form action="updateSong.php" method="post">

<p>Song Name:
<input type="text" name="song_name" size="30" value="" />
</p>

<p>Duration:
<input type="text" name="duration" size="10" value="" />
</p>

<p>Release Year:
<input type="text" name="song_year" size="4" value="" />
</p>

<p>Album:
<input type="text" name="album" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</html>	
			
			