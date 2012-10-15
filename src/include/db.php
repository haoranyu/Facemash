<?php
$DB_HOST='localhost';//address
$DB_USER='';      //username
$DB_PWD='';          //keyword
$DB_NAME='';      //dbname

$link=mysql_connect($DB_HOST,$DB_USER,$DB_PWD)or die('Connect to datebase error:'.mysql_error());

mysql_select_db($DB_NAME);
mysql_query("SET NAMES 'utf8'");//seb db unicode
?>