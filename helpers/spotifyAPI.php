<?php
$track = "spotify:track:5ChkMS8OtdzJeqyybCc9R5";
$url = "https://embed.spotify.com/oembed/?url=".$track."&format=json";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
$output = curl_exec($ch);
curl_close($ch);

$get_json  = json_decode($output);
$cover = $get_json->thumbnail_url;
echo $cover;
?>