<?php 
session_start();
include "../mysqli_connect.php";

$q = $db->prepare("SELECT * FROM Band 
        LEFT JOIN BandMembers on Band.Band_id = BandMembers.Band_id 
        LEFT JOIN BandComments on Band.Band_id = BandComments.Band_id 
        LEFT JOIN Album on Band.Band_id = Album.Band_id
        Where Band.Band_id = ?");
$q->bind_param("s", $_GET["id"]);
$q->execute();
$result = $q->get_result();
$band = $result->fetch_array(MYSQLI_ASSOC);
$members = [];
array_push($members,$band);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                array_push($members, $row);
}
$q = $db->prepare("SELECT * FROM BandComments LEFT JOIN User on BandComments.User_id = User.User_id Where Band_id = ?");
$q->bind_param("s", $_GET["id"]);
$q->execute();
$result = $q->get_result();

$comments =[];
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				array_push($comments, $row);
}
 
$q = $db->prepare("SELECT * FROM Album Where Band_id = ?");
$q->bind_param("s", $_GET["id"]);
$q->execute();
$result = $q->get_result();

$albums =[];
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				array_push($albums, $row);
}
        


?>
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
                                    <p>
                                        <? echo $band['Band_Name']?>
                                    </p>
                                </h3>
                                <p>
                                    <? echo $band['Formation_Date']?> -
                                        <? echo $band['Breakup_Date']?>
                                </p>

                                <a href="../helpers/favoriteBand.php?id=<?echo $band['Band_id']?>"class="btn btn-warning">Favorite this band</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">


            <div class="col-md-4 mx-auto">
                <h3>Band Members</h3>
                <? foreach($members as $mem) {?>
                    <p>
                        <? echo $mem['Member_fname']?>
                            <? echo $mem['Member_lname']?>
                    </p>
                    <p>Instrument:
                        <? echo $mem['Instrument']?>
                    </p>
                    <p>Years active:
                        <? echo $mem['Years_active']?>
                    </p>
                    <hr>
                    <?}?>
            </div>
            <div class="col-md-4 mx-auto">
                <h3>Albums</h3>
                <? foreach($albums as $album) {?>
                    <div class="row"> 
                        <a href="../pages/albuminfo.php?id=<?echo $album['Album_id']?>">
                        <img src="holder.js/100x100?/thumb" style="margin-right: 30px;margin-bottom: 30px;" /> 
                        <? echo $album['Album_name']?>
                        </a>
                    </div>
                    <?}?>
            </div>
        </div>
    </div>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-12 card" style="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 mx-auto">
                                <h3>Comments</h3>
                                <hr>
                                <? if (!empty($comments)) { ?>
                                    <? foreach($comments as $row) {?>
                                        <p><? echo $row['Comment'] ?></p>
                                        <small class=" text-muted">- <? echo $row['Fname']?></small>
                                        <hr>
                                    <? } ?>
                                <? } else { echo "None yet. Be the first!" ?>
                                    <hr>
                                <?}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mx-auto col-md-12 card border-info" style="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 mx-auto">
                                <form method="post" action = "../helpers/bandComment.php?id=<?echo $band['Band_id']?>">
                                    <div class="form-group">
                                        <label for="inputEmail">Comment</label>
                                        <small id="commentHelp" class="form-text text-muted">Enter your thoughts below</small>
                                        <textarea required rows="5" class="form-control" name = "comment" id="comment" aria-describedby="commentHelp" placeholder="..."></textarea>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-success">Post</button>
                                </form>
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
    $(function () {
        $('#navBar').load('master.html');
    });
</script>

</html>