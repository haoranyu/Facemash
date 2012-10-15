<?php
include("../db.php");
include("../core.php");
function getman($sex,$grade){
	$max_grade = array(
	//in order to save time, you have to set the max number of people in each grade manually. 
	//the two numbers correspond to the number of males and females.
		2003 => array(1,1),
		2004 => array(1,1),
		2005 => array(1,1),
		2006 => array(1,1),
		2007 => array(1,1),
		2008 => array(1,1),
		2009 => array(1,1),
		2010 => array(1,1),
	);
	if($grade==0){
		if($sex==0){
			$max = rand(0,9646);
		}
		else{
			$max = rand(0,8975);
		}
		$query = mysql_query("SELECT * FROM user WHERE sex = '".intval($sex)."' LIMIT ".$max.",1");
	}
	else{
		if($sex==0){
			$max = rand(0,$max_grade[$grade][0]);
		}
		else{
			$max = rand(0,$max_grade[$grade][1]);
		}
		$query = mysql_query("SELECT * FROM user WHERE sex = '".intval($sex)."' AND grade = '".intval($grade)."' LIMIT ".$max.",1");
	}
	
	if($query==FALSE){
		return false;
	}
	if(mysql_num_rows($query)==0){
		return false;
	}
	else{
		return mysql_fetch_array($query);
	}
}

if(isset($_POST['grade'])){
	$grade=intval($_POST['grade']);
}
if(isset($_POST['uid'])){
		$uid = authcode($_POST['uid'],'DECODE','axl',600);
		$query_select = mysql_query("SELECT * FROM user WHERE uid = '".intval($uid)."' LIMIT 1");
		$row = mysql_fetch_array($query_select);
		$count = ++$row['count'];
		mysql_query("UPDATE user SET count = '".$count."' WHERE uid = '".intval($uid)."'");
}
if(isset($_POST['sex'])){
	$sex = intval($_POST['sex']);
	$man1 = getman($sex,$grade);
	$man2 = getman($sex,$grade);
	while($man1['uid']==$man2['uid']){
		$man2 = getman($sex);
	}
	$arr = array(
	0 => array(
		'photo' => authcode($man1['uid'],'ENCODE','axl', $expiry = 600),
		'name' => trim($man1['name']),
		'grade' => $man1['grade'],
		'classx' => trim($man1['class'])
	),
	1 => array(
		'photo' => authcode($man2['uid'],'ENCODE','axl', $expiry = 600),
		'name' => trim($man2['name']),
		'grade' => $man2['grade'],
		'classx' => trim($man2['class'])
	),
	);
	echo json_encode($arr);
}

?>