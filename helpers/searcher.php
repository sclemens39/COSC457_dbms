<?php 
session_start();
include "../mysqli_connect.php";
$q = $db->prepare("SELECT * FROM Song Where Song.Name Like ?");
$search =  "%" . $_GET["search"] . "%";
$q->bind_param("s", $search);
$q->execute();
$result = $q->get_result();

$song = $result->fetch_array(MYSQLI_ASSOC);
header("Location: ../pages/searchresults.php?id={$song[Song_id]}");
?>