<?php
include("core.php");
if(isset($_GET['model'])){
	$model = $_GET['model'];
}
else{
	$model = "judge";
}
switch($model){
	case "judge":include("model/judge.php");break;
	case "rank":include("model/rank.php");break;
	case "about":include("model/about.php");break;
}
?>