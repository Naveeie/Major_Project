<?php 
error_reporting(0);
session_start();

define("URL","http://localhost/pos/tempp/admin/");
define("URL1","http://localhost/pos/tempp/admin/");
define("SERVER","localhost");
define("DBUSER","root");
define("DBPWD","");
define("DATABASE","pos-dynamics");



$conn=mysqli_connect(SERVER,DBUSER,DBPWD);
mysqli_select_db($conn , DATABASE);


function datechange($date)
{
	$date=explode("-" , $date);
	return $date[2]."-".$date[1]."-".$date[0];
}
?>