<?php
$host_name 	= "localhost"; 
$user_name 	= "root";
$password 	= "";
$database 	= "ta3";
 
$koneksi= mysql_connect($host_name, $user_name, $password) or die (mysql_error());
if($koneksi){
	mysql_select_db($database);
} else{
	echo mysql_error();
	mysql_close($connect_db);
}
?>