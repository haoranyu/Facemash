<?php
if(isset($_GET['model'])){
	$model = $_GET['model'];
}
else{
	$model = "judge";
}
switch($model){
	case "judge":include("template/judge.php");break;
	case "rank":include("template/rank.php");break;
	case "about":include("template/about.php");break;
}
?>