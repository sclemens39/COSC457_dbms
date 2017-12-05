<?
session_start();
include "../mysqli_connect.php";
if($_SESSION['user']['Admin'] != 1){
    header("Location: ../pages/home.php");
}

$query = "SELECT * FROM Album
          LEFT JOIN Band on Album.Band_id = Band.Band_id";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$albums = array();
while ($row = mysqli_fetch_array($result)) {
    $albums[] = $row;
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
$query = "SELECT * FROM Band";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$bands = array();
$row = mysqli_fetch_array($result);
while ($row = mysqli_fetch_array($result)) {
    $bands[] = $row;
}
$query = "SELECT * FROM Song LEFT JOIN Band on Song.Band_id = Band.Band_id";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$songs = array();
$row = mysqli_fetch_array($result);
while ($row = mysqli_fetch_array($result)) {
    $songs[] = $row;
}
$q = $db->prepare("SELECT * FROM BandComments LEFT JOIN User on BandComments.User_id = User.User_id LEFT JOIN Band on BandComments.Band_id = Band.Band_id");
$q->execute();
$result = $q->get_result();
$bcomments =[];
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				array_push($bcomments, $row);
}
$q = $db->prepare("SELECT * FROM PerformanceComments LEFT JOIN User on PerformanceComments.User_id = User.User_id 
LEFT JOIN Performance on PerformanceComments.Performance_id = Performance.Performance_id LEFT JOIN Venue on Performance.Venue_id = Venue.Venue_id
LEFT JOIN Band on Performance.Band_id = Band.Band_id");
$q->execute();
$result = $q->get_result();
$pcomments =[];
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				array_push($pcomments, $row);
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
$query = "SELECT * FROM AlbumTracks
                    LEFT JOIN Album
                    on AlbumTracks.Album_id = Album.Album_id
                    LEFT JOIN Song
                    on AlbumTracks.Song_id = Song.Song_id";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$tlist = array();
$row = mysqli_fetch_array($result);
while ($row = mysqli_fetch_array($result)) {
    $tlist[] = $row;
}
$query = "SELECT * FROM Setlist 
                    LEFT JOIN Song
                    on Setlist.Song_id = Song.Song_id";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$slist = array();
$row = mysqli_fetch_array($result);
while ($row = mysqli_fetch_array($result)) {
    $slist[] = $row;
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
        <script>
            $(document).ready(function () {
                $('.editbtn').click(function () {
                    var currentTD = $(this).parents('tr').find('td');
                    if ($(this).html() == 'Edit') {
                        $('button').prop('disabled',true);
                        $.each(currentTD, function () {
                            $(this).prop('contenteditable', true)
                        });
                    } else {
                        $('button').prop('disabled',false);
                        $.each(currentTD, function () {
                            $(this).prop('contenteditable', false)
                        });
                    }
                    
                    $('.editbtn').prop('disabled',false);

                    $('.id').prop('contenteditable', false);
                    $('.actions').prop('contenteditable', false);
                    $(this).html($(this).html() == 'Edit' ? 'Done' : 'Edit')
                });
                $('.savebtnBand').click(function () {
                    var pos = $(this).parents('tr').find('.edit').find('p');
                    i = 0;
                    $edit = [];
                    $.each(pos, function () {
                        $edit[i] = $(this).html().trim();
                        i = i + 1;
                    });
                    $.ajax({
                        url: '../helpers/updateBand.php',
                        type: 'post',
                        data: {
                            data: $edit
                        },
                        datatype: 'html',
                        success: function (rsp) {
                            alert(rsp);
                        }
                    });
                });
                $('.savebtnSong').click(function () {
                    var pos = $(this).parents('tr').find('.edit').find('p');
                    i = 0;
                    $edit = [];
                    $.each(pos, function () {
                        $edit[i] = $(this).html().trim();
                        i = i + 1;
                    });
                    $.ajax({
                        url: '../helpers/updateSong.php',
                        type: 'post',
                        data: {
                            data: $edit
                        },
                        datatype: 'html',
                        success: function (rsp) {
                            alert(rsp);
                        }
                    });
                });
                 $('.savebtnShow').click(function () {
                    var pos = $(this).parents('tr').find('.edit').find('p');
                    i = 0;
                    $edit = [];
                    $.each(pos, function () {
                        $edit[i] = $(this).html().trim();
                        i = i + 1;
                    });
                    $.ajax({
                        url: '../helpers/updateShow.php',
                        type: 'post',
                        data: {
                            data: $edit
                        },
                        datatype: 'html',
                        success: function (rsp) {
                            alert(rsp);
                        }
                    });
                });
                $('.savebtnAlbum').click(function () {
                    var pos = $(this).parents('tr').find('.edit').find('p');
                    i = 0;
                    $edit = [];
                    $.each(pos, function () {
                        $edit[i] = $(this).html().trim();
                        i = i + 1;
                    });
                    $.ajax({
                        url: '../helpers/updateAlbum.php',
                        type: 'post',
                        data: {
                            data: $edit
                        },
                        datatype: 'html',
                        success: function (rsp) {
                            alert(rsp);
                        }
                    });
                });
               
                 $("#allNav").click(function (event) {
                        $("#comments, #bands, #albums, #songs, #show").show();
                 });
                $("#albumNav").click(function (event) {
                        $("#albums").show();
                        $("#songs, #bands, #shows, #comments").hide();
                });
                $("#artistNav").click(function (event) {
                        $("#bands").show();
                        $("#albums, #songs, #shows, #comments").hide();
                });
                $("#songNav").click(function (event) {
                        $("#songs").show();
                        $("#bands, #albums, #shows, #comments").hide();
                });
                $("#showNav").click(function (event) {
                        $("#shows").show();
                        $("#bands, #albums, #songs, #comments").hide();
                });  
                $("#commentNav").click(function (event) {
                        $("#comments").show();
                        $("#bands, #albums, #songs, #show").hide();
                });
                   
            });
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a id="allNav" class="nav-link" href="#albums">All</a>
                    </li>
                    <li class="nav-item">
                        <a id="albumNav" class="nav-link" href="#albums">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a id="artistNav" class="nav-link" href="#bands">Bands</a>
                    </li>
                    <li class="nav-item">
                        <a id= "songNav"class="nav-link" href="#songs">Songs</a>
                    </li>
                    <li class="nav-item">
                        <a id= "showNav" class="nav-link" href="#shows">Shows</a>
                    </li>
                    <li class="nav-item">
                        <a id = "commentNav" class="nav-link" href="#comments">Comments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Quit</a>
                    </li>
                </ul>
            </div>
        </nav>


        <br><br>

        <div class = "container-fluid">
            <div id = "bands">
            <table class="table table-striped table-bordered table-hover">
                <h3  class="text-center">Bands</h3>
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Formation Date</th>
                        <th>Breakup Date</th>
                        <th>Actions</th>
                    </tr>
                    <?foreach($bands as $row) {?>
                        <tr>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Band_id']?>
                                </p>
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Band_Name']?>
                                </p>
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Formation_Date']?>
                                </p>
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Breakup_Date']?>
                                </p>
                            </td>
                            <td class="actions">
                                <button type="submit" class="btn btn-outline-success savebtnBand">Save</button>
                                <button class="btn btn-outline-info editbtn">Edit</button>
                                <a class="btn btn-outline-danger" href="../helpers/deleteArtist.php?id=<?echo $row['Band_id']?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                        <?}?>
                </tbody>
            </table>
            </div>
 
            <div id = "songs">
                <hr>
            <table class="table table-striped table-bordered table-hover">
                <h3  class="text-center">Songs</h3>
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Band Id</th>
                        <th>Title</th>
                        <th>Album</th>
                        <th>Duration</th>
                        <th>Year Released</th>
                        <th>Actions</th>
                    </tr>
                    <?foreach($songs as $row) {?>
                        <tr>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Song_id']?>
                                </p>
                            </td>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Band_id']?>
                                </p>
                                (<?echo $row['Band_Name']?>)
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Name']?>
                                </p>
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Album']?>
                                </p>
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Duration']?>
                                </p>
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Year_Released']?>
                                </p>
                            </td>
                            <td class="actions">
                                <button type="submit" class="btn btn-outline-success savebtnSong">Save</button>
                                <button class="btn btn-outline-info editbtn">Edit</button>
                                <a class="btn btn-outline-danger" href="../helpers/deleteSong.php?id=<?echo $row['Song_id']?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                        <?}?>
                </tbody>
            </table>
            </div>
      
            <div id = "albums">
                <hr>
            <table class="table table-striped table-bordered table-hover">
                <h3  class="text-center">Albums</h3>
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Band Id</th>
                        <th>Title</th>
                        <th>Record Label</th>
                        <th>Year Released</th>
                        <th>Actions</th>
                    </tr>
                    <?foreach($albums as $row) {?>
                        <tr>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Album_id']?>
                                </p>
                            </td>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Band_id']?>
                                </p>
                                (<?echo $row['Band_Name']?>)
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Album_name']?>
                                </p>
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Record_Label']?>
                                </p>
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Year_Released']?>
                                </p>
                            </td>
                            <td class="actions">
                                <button type="submit" class="btn btn-outline-success savebtnAlbum">Save</button>
                                <button class="btn btn-outline-info editbtn">Edit</button>
                                <a class="btn btn-outline-danger" href="../helpers/deleteAlbum.php?id=<?echo $row['Album_id']?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                        <?}?>
                </tbody>
            </table>
            <table class="table table-striped table-bordered table-hover">
                <h3  class="text-center">Track List</h3>
                <tbody>
                    <tr>
                        <th>Album Id</th>
                        <th>Song Id</th>
                        <th>Actions</th>
                    </tr>
                    <?foreach($tlist as $row) {?>
                        <tr>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Album_id']?>
                                </p>
                                (<?echo $row['Album_name']?>)
                            </td>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Song_id']?>
                                </p>
                                (<?echo $row['Name']?>)
                            </td>
                            <td class="actions">
                                <a class="btn btn-outline-danger" href="../helpers/deleteTrack.php?album=<?echo $row['Album_id']?>&song=<?echo $row['Song_id']?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                        <?}?>
                </tbody>
            </table>
                <button class="btn btn-success" data-toggle="modal" data-target="#trackModal">New</button>

                <!-- Modal -->
                <div class="modal fade" id="trackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tmodalLabel">Add to Album Tracks</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action = "../helpers/addToTrack.php">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="albumID">Album ID</label>
                                    <input required type="text" class="form-control" name = "albumID" id="albumID">
                                </div>
                                <div class="form-group">
                                    <label for= "songID">Song ID</label>
                                    <input required type="text" class="form-control" name = "songID" id="songID">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
            <div id = "shows">
                <hr>
            <table class="table table-striped table-bordered table-hover">
                <h3  class="text-center">Shows</h3>
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Venue Id</th>
                        <th>Band_id</th>
                        <th>Performance_date</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                    <?foreach($shows as $row) {?>
                        <tr>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Performance_id']?>
                                </p>
                            </td>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Venue_id']?>
                                </p>
                                (<?echo $row['Name']?>)
                            </td>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Band_id']?>
                                </p>
                                (<?echo $row['Band_Name']?>)
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Performance_date']?>
                                </p>
                            </td>
                            <td class="edit">
                                <p>
                                    <?echo $row['Duration']?>
                                </p>
                            </td>
                            <td class="actions">
                                <button type="submit" class="btn btn-outline-success savebtnShow">Save</button>
                                <button class="btn btn-outline-info editbtn">Edit</button>
                                <a class="btn btn-outline-danger" href="../helpers/deleteShow.php?id=<?echo $row['Performance_id']?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                        <?}?>
                </tbody>
            </table>
            <table class="table table-striped table-bordered table-hover">
                <h3  class="text-center">Set List</h3>
                <tbody>
                    <tr>
                        <th>Performance Id</th>
                        <th>Song Id</th>
                        <th>Actions</th>
                    </tr>
                    <?foreach($slist as $row) {?>
                        <tr>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Performance_id']?>
                                </p>
                            </td>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Song_id']?>
                                </p>
                                (<?echo $row['Name']?>)
                            </td>
                            <td class="actions">
                                <a class="btn btn-outline-danger" href="../helpers/deleteSet.php?show=<?echo $row['Performance_id']?>&song=<?echo $row['Song_id']?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                        <?}?>
                </tbody>
            </table>
            <button class="btn btn-success" data-toggle="modal" data-target="#setModal">New</button>

                <!-- Modal -->
                <div class="modal fade" id="setModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smodalLabel">Add to Show Set-list</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action = "../helpers/addToSet.php">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="showID">Performance ID</label>
                                    <input required type="text" class="form-control" name = "showID" id="showID">
                                </div>
                                <div class="form-group">
                                    <label for= "songID">Song ID</label>
                                    <input required type="text" class="form-control" name = "songID" id="songID">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
                            
            <div id="comments">
                <hr>
                <h3   class="text-center">Comments</h3>
                <br>
            <table id="bandComm" class="table table-striped table-bordered table-hover">
                <h3   class="text-center">Band Comments</h3>
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Band Page</th>
                        <th>User</th>
                        <th>Comment</th>
                        <th>Delete</th>
                    </tr>
                    <?foreach($bcomments as $row) {?>
                        <tr>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Count_id']?>
                                </p>
                            </td>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Band_Name']?>
                                </p>
                            </td>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Email']?>
                                </p>
                            </td>
                            <td class="">
                                <p>
                                    <?echo $row['Comment']?>
                                </p>
                            </td>
                            <td class="actions">
                                <a class="btn btn-outline-danger" href="../helpers/deleteBandComment.php?id=<?echo $row['Count_id']?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                        <?}?>
                </tbody>
            </table>
            <table id = "showComm" class="table table-striped table-bordered table-hover">
                <h3 class ="text-center">Performance Comments</h3>
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Show Page</th>
                        <th>User</th>
                        <th>Comment</th>
                        <th>Delete</th>
                    </tr>
                    <?foreach($pcomments as $row) {?>
                        <tr>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Count_id']?>
                                </p>
                            </td>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Band_Name']?> @ <?echo $row['Name']?>
                                </p>
                            </td>
                            <td class="edit id">
                                <p>
                                    <?echo $row['Email']?>
                                </p>
                            </td>
                            <td class="">
                                <p>
                                    <?echo $row['Comment']?>
                                </p>
                            </td>
                            <td class="actions">
                                <a class="btn btn-outline-danger" href="../helpers/deleteShowComment.php?id=<?echo $row['Count_id']?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                        <?}?>
                </tbody>
            </table>
        </div>
    </body>
</html>