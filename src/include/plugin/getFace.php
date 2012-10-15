<?php
include("../core.php");
$str = str_replace(' ','+',$_GET['str']);
$key='axl';
$code = authcode($str,'DECODE', $key);
header("Content-type:image/png");
$filename=webhost.'/img/daslkIWLasje/'.$code.'.jpg'; #原图

list($width,$height)=getimagesize($filename);
$newwidth=110;  //生成缩略图的宽度，可以是具体的数值
$newheight=154; //生成缩略图的高度，可以是具体的数值
//Load
$thumb=imagecreatetruecolor($newwidth,$newheight);
$source=imagecreatefromjpeg($filename);
//Resize
imagecopyresized($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);
//Output
imagepng($thumb);
imagedestroy($thumb);
?>