<?php
	define('BASE_URL', '../../' );
	require_once(BASE_URL.'bootstrap/app_config.php');
	$apiCall = true;
	require_once(BASE_URL.'bootstrap/check_api.php');
	$IAM_ARRAY;


if( isset( $_POST['ad_id'] ) ){
	
	$ad_id         = 0;
	$ad_id       = ( int ) test_inputs( $_POST['ad_id'] );
	
	
	
	
	if( $ad_id != 0 ){
		
		
		
		
	$qqq = "";

	if( isset($_POST['ad_location']) ){
		$ad_location = test_inputs( $_POST['ad_location'] );
		$qqq = $qqq."`ad_location` = '".$ad_location."', ";
		$qqq = $qqq."`ad_location_ar` = '".$ad_location."', ";
	}
	
	if( isset($_POST['ad_price']) ){
		$ad_price = test_inputs( $_POST['ad_price'] );
		$qqq = $qqq."`ad_price` = '".$ad_price."', ";
	}
	if( isset($_POST['ad_discount']) ){
		$ad_discount = test_inputs( $_POST['ad_discount'] );
		$qqq = $qqq."`ad_discount` = '".$ad_discount."', ";
	}
	
	if( isset($_POST['ad_status']) ){
		$ad_status = test_inputs( $_POST['ad_status'] );
		$qqq = $qqq."`ad_status` = 'under_review', ";
	}
	
	if( $qqq != "" ){
		$qqq =  substr($qqq, 0, -2);
		$qu_users_ads_updt = "UPDATE `users_ads` SET ".$qqq."  WHERE `ad_id` = $ad_id;";

		if(mysqli_query($KONN, $qu_users_ads_updt)){
			
			$IAM_ARRAY['success'] = true;
			$IAM_ARRAY['message'] = "Data Saved";
			$IAM_ARRAY['goto'] = "edit_ad_03.php?ad_id=$ad_id";
		
		} else {
			$IAM_ARRAY['success'] = false;
			$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات !!");
		}
	} else {
			$IAM_ARRAY['success'] = true;
			$IAM_ARRAY['message'] = "Data Saved!";
			$IAM_ARRAY['goto'] = "edit_ad_3.php?ad_id=$ad_id";
	}
		
		
		
		
		
		
	} else {
		$IAM_ARRAY['success'] = false;
		$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات !!");
	}
	
} else {
	$IAM_ARRAY['success'] = false;
	$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات !");
}

	header('Content-Type: application/json');
	echo json_encode($IAM_ARRAY);

?>