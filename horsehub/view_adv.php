<?php
	require_once('bootstrap/app_config.php');
	require_once('bootstrap/check_log_user.php');
	$page_title=$page_description=$page_keywords=$page_author= $SETTINGS['website_name'.$lang_db];
	// $page_title=$page_description=$page_keywords=$page_author= "Site Title";
	$page_id = 100;
	
	$adv_id = 1;
	if( isset( $_GET['adv_id'] ) ){
		$adv_id = ( int ) test_inputs( $_GET['adv_id'] );
	}
	
	header("location:view_adv_$adv_id.php");
	die();

	
?>