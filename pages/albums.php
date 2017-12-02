<?php 
include "../mysqli_connect.php";
require '../vendor/autoload.php';

$query = "SELECT Album_name, Album_id, Album.Band_id, Band_Name FROM Album
          LEFT JOIN Band on Album.Band_id = Band.Band_id";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$albums = array();
while ($row = mysqli_fetch_array($result)) {
    $albums[] = $row;
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

    <div class="album text-muted">
        <div class="container">
            <h3 class="text-center">Albums</h3>
            <div class="row">
                <? foreach($albums as $row) {?>
                        <div class="card">
                        <a href="albuminfo.php?id=<?php echo $row["Album_id"]?>">	
                                <img data-src="holder.js/100px280/thumb" alt="Card image cap">
                                <p class="card-text">
                                    <? echo $row['Album_name']?> - <? echo $row['Band_Name']?>
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


<!-- 
                
                                -->

