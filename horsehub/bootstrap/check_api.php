<?php

session_start();

$USER_ID = 0;
$USER_NAME = "";


$IAM_ARRAY;

if( isset( $_SESSION['user_id'] ) ){
	$USER_ID = ( int ) $_SESSION['user_id'];
} else {
	$IAM_ARRAY['success'] = false;
	$IAM_ARRAY['message'] = "no permission 12";
	header('Content-Type: application/json');
	echo json_encode($IAM_ARRAY);
	die();
}

if( isset( $_SESSION['user_name'] ) ){
	$USER_NAME = $_SESSION['user_name'];
}



?>