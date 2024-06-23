<?php

	

	session_start();
	$_SESSION['is_logged']    = false;
	$_SESSION['user_id']      = 0;
	$_SESSION['user_name']   = '';
	$_SESSION['user_email']   = '';
	$_SESSION['user_mobile']  = '';
	$_SESSION['user_picture'] = '';




	header("Location:index.php?res=logedout");
	die();
	
	
	
	
	
?>