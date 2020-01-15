<?php 
error_reporting(0);
$host="localhost";
$user="root";
$password="";
$database="db_jewelry";
// connect
$mysqli=mysqli_connect($host,$user,$password,$database);
mysqli_set_charset($mysqli,"UTF8");
if(!$mysqli){
	die("fail:".mysql_error());
}




 ?>
