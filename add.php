<?php


if (isset($_POST['submit'])) {
$name = $_POST['text'];


$video = $_FILES['video']['tmp_name'];
$image = $_FILES['image']['tmp_name'];

$time = substr(md5(time()), 0, 20);

$name .= '-'.$time;

$text = $_POST['text'];

//$command = "ffmpeg -i $video -i $image  -map 0 -map 1 -c  copy -c:v:1 png -disposition:v:1 attached_pic rust/$name.mp4";

//$command1 = "ffmpeg -i $video -vf drawtext='text='brbjjdf': fontcolor=white: fontsize=120: box=1: boxcolor=black@0.5: boxborderw=20: x=(w-text_w)/2: y=15' -codec:a copy rust/$name.mp4" ;


//$command = "ffmpeg -i $video -i $image  -map 0 -map 1 -c  copy -c:v:1 png -disposition:v:1 attached_pic rust/$name.mp4";



//REAL ONE HERE
//$command5 = 'ffmpeg -i "'.$video.'" -i "'.$image.'"  -map 0 -map 1 -c  copy -c:v:1 png -disposition:v:1 attached_pic | ffmpeg -i "'.$video.'" -vf drawtext="text= '.$text.': x=(w-text_w)/2: box=1:  boxcolor=black@1: boxborderw=20: y=15: fontsize=30:fontcolor=yellow: enable=lt(mod(t\,20)\,7)" -y rust/"'.$name.'".mp4';


$command5 = 'ffmpeg -i "'.$video.'" -vf drawtext="text='.$text.': fontcolor=white: fontsize=60: box=1: boxcolor=black@1: boxborderw=20: x=(w-text_w)/2: y=15" -vcodec libx265 -crf 28 rust/"'.$name.'".mp4  |  ffmpeg -i "'.$video.'" -i "'.$image.'"  -map 0 -map 1 -c  copy -c:v:1 png -disposition:v:1 attached_pic "'.$name.'".mp4';
 

system($command5);
 
 /*ffmpeg -framerate 10 -i one.png \ -framerate 10 -i two.png \ -framerate 10 -i three.png \ -filter_complex '[0:0] [1:0] [2:0] concat=n=3:v=1:a=0 [v],[v] fps=10 [vv]' \ -map '[vv]' -s 1440x1080 video.mp4 */

$rand = substr(md5(time()), 13) ;
header('Location: index.php?=Completely Done'.$rand.'/');

}

 