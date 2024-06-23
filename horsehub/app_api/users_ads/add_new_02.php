<?php
	define('BASE_URL', '../../' );
	require_once(BASE_URL.'bootstrap/app_config.php');
	$apiCall = true;
	require_once(BASE_URL.'bootstrap/check_api.php');
	$IAM_ARRAY;


if( isset( $_POST['ad_id'] ) && 
	isset( $_POST['ad_location'] )  && 
	isset( $_POST['ad_price'] )  && 
	isset( $_POST['ad_discount'] )  
){
	
	$ad_id         = 0;
	$ad_id        = ( int ) test_inputs( $_POST['ad_id'] );
	$ad_location  = "".test_inputs( $_POST['ad_location'] );
	$ad_price     = ( double ) test_inputs( $_POST['ad_price'] );
	$ad_discount  = ( double ) test_inputs( $_POST['ad_discount'] );
	
	
	
	if( $ad_id != 0 ){
	
	$qu_users_ads_updt = "UPDATE  `users_ads` SET 
						`ad_id` = '".$ad_id."', 
						`ad_location` = '".$ad_location."', 
						`ad_location_ar` = '".$ad_location."', 
						`ad_price` = '".$ad_price."', 
						`ad_discount` = '".$ad_discount."', 
						`ad_status` = 'draft_02'
						WHERE ((`user_id` = $USER_ID) AND (`ad_id` = $ad_id));";

	if(mysqli_query($KONN, $qu_users_ads_updt)){
					$IAM_ARRAY['success'] = true;
					$IAM_ARRAY['message'] = "Data Saved";
					$IAM_ARRAY['goto'] = "add_adv03.php?ad_id=$ad_id";
	} else {
		$IAM_ARRAY['success'] = false;
		$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات !");
	}
		
		
		
		
		
	} else {
		$IAM_ARRAY['success'] = false;
		$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات--");
	}
	
} else {
	$IAM_ARRAY['success'] = false;
	$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات-");
}

	header('Content-Type: application/json');
	echo json_encode($IAM_ARRAY);

?>