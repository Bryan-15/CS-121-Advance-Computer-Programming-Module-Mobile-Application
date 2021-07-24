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

if($_SERVER["REQUEST_METHOD"] == "GET"){

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$password = $_GET['password']; 

$sql ="select * from user where u_email like '".$email."'";
$result = mysqli_query($con,$sql);
$response = array();
if(mysqli_num_rows($result)>0){
	$code = "reg_failed";
	$message = "User Exists";
	$response = ['code' => $code, 'message' => $message];

echo json_encode($message);
}
else{
	$sql ="insert into user (u_name, u_email, u_phone, u_pass) values ('".$name."','".$email."','".$phone."','".$password."')";
	$result = mysqli_query($con,$sql);

	$code="reg_sucess";
	$message = "Registration Success";
	$response = ['name' => $name, 'phone' => $phone, 'email' => $email, 'password'=> $password];

	print_r('['.json_encode($response).']');
}

}

?>