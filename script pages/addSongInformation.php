<html>
<head>
<title>Add Song</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){    
    $data_missing = array();
    if(empty($_POST['song_name'])){
        // Adds name to array
        $data_missing[] = 'Song Name';

    } else {

        // Trim white space from the name and store the name
        $s_name = trim($_POST['song_name']);

    }

    if(empty($_POST['duration'])){

        // Adds name to array
        $data_missing[] = 'Duration';

    } else{
        
		// whatever variable for duration
		$duration = trim($_POST['duration']);

    }

    if(empty($_POST['song_year'])){

        // Adds name to array
        $data_missing[] = 'song_year';

    } else {

        // Trim white space from the name and store the name
        $s_year = trim($_POST['song_year']);

    }

    if(empty($_POST['album'])){

        // Adds name to array
        $data_missing[] = 'Album';

    } else {

        // Trim white space from the name and store the name
        $album = trim($_POST['album']);

    }

    if(empty($_POST['artist'])){

        // Adds name to array
        $data_missing[] = 'artist';

    } else {

        // Trim white space from the name and store the name
        $artist = trim($_POST['artist']);

    }
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO song (song_name, duration, song_year,
		album, artist) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "ssiss", $s_name,
                               $duration, $s_year, $album, $artist);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Song has been entered successfully';
            
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
<form action="localhost:8888/PHP/addSongInformation.php" method="post">
    
<b>Add a New Song</b>
    
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

<p>Artist:
<input type="text" name="artist" size="30" value="" />
</p>
<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>