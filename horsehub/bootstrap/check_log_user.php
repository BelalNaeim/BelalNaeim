<?php

	session_start();
	
	$IS_LOGGED = false;
	$USER_ID = 0;
	$USER_PHONE = '';
	$USER_NAME  = '';

	if( isset( $_SESSION['is_logged'] ) && 
		isset( $_SESSION['user_id'] ) && 
		isset( $_SESSION['user_name'] ) && 
		isset( $_SESSION['user_phone'] )
	){
		
		$IS_LOGGED    = true;
		$USER_ID      = ( int ) $_SESSION['user_id'];
		$USER_NAME    = ''.$_SESSION['user_name'];
		$USER_PHONE   = ''.$_SESSION['user_phone'];
		if( $USER_ID == 0 ){
			$IS_LOGGED    = false;
		}
	} else {
		$IS_LOGGED    = false;
	}
	
?>