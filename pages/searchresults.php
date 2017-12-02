<?php 
session_start();
include "../mysqli_connect.php";

$q = $db->prepare("SELECT * FROM Song LEFT JOIN Band on Song.Band_id = Band.Band_id LEFT JOIN AlbumTracks on Song.Song_id = AlbumTracks.Song_id Where Song.Song_id = ?");
$q->bind_param("s", $_GET["id"]);
$q->execute();
$result = $q->get_result();

$song = $result->fetch_array(MYSQLI_ASSOC);

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
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-12 card border-success" style="">
                    <div class="card-body">
                        <div class="row">
                            <div class ="col-md-7 mx-auto text-center">
                                <h3>
                                    Result:
                                </h3>
                                <p><? if (!empty($song)) { ?>
                                    Song: <? echo $song['Name']?>
                                    <br>
                                    Artist: <? echo $song['Band_Name']?>
                                    <br>
                                    Album: <? echo $song['Album']?>
                                    <br>
                                    <br>
                                    <a type="button" href="../pages/artistinfo.php?id=<?echo $song['Band_id']?>"class="btn btn-info">See Artist</a>
                                    <a type="button" href="../pages/albuminfo.php?id=<?echo $song['Album_id']?>"class="btn btn-info">See Album</a>
                                <?} else{ echo "No results";}?>
                                </p>
                                 
                            </div>
                        </div>
                    </div>
                </div>
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