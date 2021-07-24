<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','cocdatabase');

$con = mysqli_connect(HOST,USER,PASS,DB);

if(!$con){
	die("Error in connection" .mysqli_conect_error());
}

?>