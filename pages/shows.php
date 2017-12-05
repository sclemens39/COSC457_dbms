<?php 
session_start();
include "../mysqli_connect.php";
if (!(isset($_SESSION["user"]))) {
        header("Location: ../pages/splash.php");
}
$query = "SELECT * FROM Performance 
                    LEFT JOIN Band
                    on Performance.Band_id = Band.Band_id
                    LEFT JOIN Venue
                    on Performance.Venue_id = Venue.Venue_id";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$shows = array();
$row = mysqli_fetch_array($result);
while ($row = mysqli_fetch_array($result)) {
    $shows[] = $row;
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

   <div class="venue text-muted">
        <div class="container">
            <h3 class="text-center">Shows</h3>
            <div class="row">
                <?
                    foreach($shows as $row) {?>
                        <div class="card">
                        <a href="showinfo.php?id=<?php echo $row["Performance_id"] ?>">	
                                <img data-src="holder.js/100px280/thumb" alt="Card image cap">
                                <p class="card-text">
                                    <? echo $row['Band_Name'] ?>- <? echo $row['Name']?>
                                </p>
                            </a>
                        </div>		
			 	<? }?>   
            </div>
        </div>
    </div>

    <footer class="text-muted">
        <div class="container text-center">
            <p>2017</p>
        </div>
    </footer>
</body>
<script>
$(function() {
    $('#navBar').load('master.html');
});
</script>

</html>