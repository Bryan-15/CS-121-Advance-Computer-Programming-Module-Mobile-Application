<?php
require "db_connect.php";
if(isset($_SERVER['HTTP_ORIGIN'])){

header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age:86400');

}

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){

if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
		header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
		exit(0);
}

if($_SERVER["REQUEST_METHOD"]== "GET") {

	$email = (isset($_GET['email']) ? $_GET['email']: '');
	$password = (isset($_GET['password']) ? $_GET['password']: '');

	$sql = "select * from user where u_email Like '".$email."'and u_pass Like '".$password."'";

	$result = mysqli_query($con,$sql);
	$response = array();

	if(mysqli_num_rows($result)> 0)
	{
		$row = mysqli_fetch_row($result);

		$id = $row[0];
		$name = $row[1];
		$email = $row[2];
		$phone = $row[4];
		$code = "Your Login Success";
	
		$response = ['userid' => $id, 'name' => $name, 'phone' => $phone, 'email' => $email];

		print_r("[".json_encode($response)."]");

	}else{
		$code = "Login Failed";
		echo json_encode($code);
	}
}
?>