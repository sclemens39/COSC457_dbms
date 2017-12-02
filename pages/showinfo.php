<?php 
session_start();
include "../mysqli_connect.php";

$q = $db->prepare("SELECT * FROM Performance
        LEFT JOIN Venue on Performance.Venue_id = Venue.Venue_id 
        LEFT JOIN Band on Performance.Band_id = Band.Band_id 
        Where Performance_id = ?");
$q->bind_param("s", $_GET["id"]);
$q->execute();
$result = $q->get_result();
$show = $result->fetch_array(MYSQLI_ASSOC);


$q = $db->prepare("SELECT * FROM Setlist 
        LEFT JOIN Song on Setlist.Song_id = Song.Song_id 
        Where Performance_id = ?");
$q->bind_param("s", $_GET["id"]);
$q->execute();
$result = $q->get_result();

$songs =[];
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				array_push($songs, $row);
}
 
$q = $db->prepare("SELECT * FROM PerformanceComments Where Performance_id = ?");
$q->bind_param("s", $_GET["id"]);
$q->execute();
$result = $q->get_result();

$comments =[];
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				array_push($comments, $row);
}
        

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Music App</title>
    <link href="style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.js"></script>

</head>

<body>

    <div id ="navBar"></div>

    <div class="container">
           <p><? echo $show['Band_Name']?> </p>
           <p><? echo $show['Performance_date']?> </p>
           <p><? echo $show['Duration']?> </p>
           <p><? echo $show['Name']?> </p>
           <p><? echo $show['Address']?> </p>
           <p><? echo $show['City']?> </p>
           <p><? echo $show['State']?> </p>
           <p><? echo $show['Date_opened']?> </p>
           <p><? echo $show['Date_closed']?> </p>
           <? foreach($songs as $song) {?></p>
                <p><? echo $song['Name']?> </p>
            <?}?>
            <a href="">I attended this!</a>

    </div>

    
    <footer class="text-muted">
        <div class="container text-center">
            <p>This is a footer</p>
        </div>
    </footer>
</body>
<script>
$(function() {
    $('#navBar').load('master.html');
});
</script>
</html>