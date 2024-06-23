<?php
	define('BASE_URL', '../../' );
	require_once(BASE_URL.'bootstrap/app_config.php');
	$apiCall = true;
	require_once(BASE_URL.'bootstrap/check_api.php');
	$IAM_ARRAY;


if( isset( $_POST['ad_id'] ) && 
	isset( $_POST['data_ids'] )  && 
	isset( $_POST['data_values'] )  
){
	
	$ad_id         = 0;
	$ad_id       = ( int ) test_inputs( $_POST['ad_id'] );
	$data_ids    = $_POST['data_ids'];
	$data_values = $_POST['data_values'];
	
	
	
	
	if( $ad_id != 0 ){
	
	
	
	$qu_users_ads_updt = "UPDATE  `users_ads` SET 
						`ad_status` = 'under_review'
						WHERE `ad_id` = $ad_id;";

	if(mysqli_query($KONN, $qu_users_ads_updt)){
		
		for( $E=0 ; $E < count($data_ids) ; $E++ ){
			
			$data_id    = ( int ) test_inputs( $data_ids[$E] );
			$data_value = test_inputs( $data_values[$E] );
			$qu_users_ads_data_updt = "UPDATE  `users_ads_data` SET 
								`data_value` = '".$data_value."' 
								WHERE `data_id` = $data_id;";

			if(!mysqli_query($KONN, $qu_users_ads_data_updt)){
				die("Err-updt data");
			}
			
		}
		
		$IAM_ARRAY['success'] = true;
		$IAM_ARRAY['message'] = "Data Saved";
		$IAM_ARRAY['goto'] = "edit_ad_02.php?ad_id=$ad_id";
		
	} else {
		$IAM_ARRAY['success'] = false;
		$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات !!!");
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