<?php 
session_start();
include "../mysqli_connect.php";

$q = $db->prepare("SELECT * FROM AlbumTracks 
        LEFT JOIN Album on AlbumTracks.Album_id = Album.Album_id 
        LEFT JOIN Band on Album.Band_id = Band.Band_id 
        LEFT JOIN Song on AlbumTracks.Song_id = Song.Song_id 
        Where AlbumTracks.Album_id = ?");
$q->bind_param("s", $_GET["id"]);
$q->execute();
$result = $q->get_result();
$album = $result->fetch_array(MYSQLI_ASSOC);
$songs = [];
array_push($songs,$album);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                array_push($songs, $row);
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

    <div id="navBar"></div>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-12 card border-success" style="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="holder.js/200x200?/thumb" alt="" class="" />
                            </div>
                            <div class="col-md-7">
                                <h3>
                                    <? echo $album['Album_name']?>
                                </h3>
                                <p>
                                    <? echo $album['Band_Name']?>
                                </p>
                                <p>
                                   Released: <? echo $album['Year_Released']?>
                                </p>
                                <p>
                                   Label: <? echo $album['Record_Label']?>
                                </p>
                                 <a href="../pages/artistinfo.php?id=<?echo $album['Band_id']?>"class="btn btn-info">See Artist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-6 mx-auto text-center">
            <h3>Songs</h3>
            <? foreach($songs as $song) {?>
                </p>
                <p>
                    <? echo $song['Name']?> -
                        <? echo $song['Duration']?>
                </p>
                <?}?>
        </div>

    </div>


    <footer class="text-muted">
        <div class="container text-center">
            <p>2017</p>
        </div>
    </footer>
</body>
<script>
    $(function () {
        $('#navBar').load('master.html');
    });
</script>

</html>