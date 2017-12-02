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
$q = $db->prepare("SELECT * FROM BandComments Where Band_id = ?");
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

    <div id ="navBar"></div>

    <div class="container">
           <p><? echo $band['Band_Name']?> </p>
           <p><? echo $band['Formation_Date']?> </p>
           <p><? echo $band['Breakup_Date']?> </p>
           <? foreach($albums as $album) {?></p>
                <p><? echo $album['Album_name']?> </p>
            <?}?>
            <? foreach($members as $mem) {?></p>
                <p><? echo $mem['Member_fname']?> </p>
                <p><? echo $mem['Member_lname']?> </p>
                <p><? echo $mem['Instrument']?> </p>
                <p><? echo $mem['Years_active']?> </p>
            <?}?>
           <a href="">Favorite Band</a>
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