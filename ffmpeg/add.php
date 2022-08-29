<?php


if (isset($_POST['submit'])) {
$name = $_POST['text'];


$video = $_FILES['video']['tmp_name'];
$image = $_FILES['image']['tmp_name'];

$time = substr(md5(time()), 0, 20);

$name .= '-'.$time;

$command = "ffmpeg -i $video -i $image -map 0 -map 1 -c  copy -c:v:1 png -disposition:v:1 attached_pic $name.mp4";

system($command);

}