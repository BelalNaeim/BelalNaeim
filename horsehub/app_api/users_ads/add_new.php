<?php
	define('BASE_URL', '../../' );
	require_once(BASE_URL.'bootstrap/app_config.php');
	$apiCall = true;
	require_once(BASE_URL.'bootstrap/check_api.php');
	$IAM_ARRAY;


if( isset( $_POST['category_id'] ) && 
	isset( $_POST['sub_id'] )  && 
	isset( $_POST['is_translated'] )  
){
	
	$ad_id         = 0;
	$category_id   = ( int ) test_inputs( $_POST['category_id'] );
	$sub_id        = ( int ) test_inputs( $_POST['sub_id'] );
	$is_translated = ( int ) test_inputs( $_POST['is_translated'] );
	
	
	
	if( $category_id != 0 && $sub_id != 0 ){
	
		$ad_date = date("Y-m-d H:i:00");
		
		$qu_users_ads_ins = "INSERT INTO `users_ads` (
							`ad_date`, 
							`sub_id`, 
							`category_id`, 
							`user_id`, 
							`ad_status`, 
							`is_translated` 
						) VALUES (
							'".$ad_date."', 
							'".$sub_id."', 
							'".$category_id."', 
							'".$USER_ID."', 
							'draft', 
							'".$is_translated."' 
						);";

		if(mysqli_query($KONN, $qu_users_ads_ins)){
			$ad_id = mysqli_insert_id($KONN);
			if( $ad_id != 0 ){
				
				//INSERT AD DATA
				$is_ar = 1;
				foreach( $_POST as $key => $data_value) {

					if( $key != "category_id" && $key != "sub_id" && $key != "is_translated" ){
						$form_id = 0;
						$form_id = ( int ) $key;
						if( $is_translated == 0 ){
							//no translation
							if( $form_id != 0 ){
								if( $data_value != "" ){
									
									
									$qu_users_ads_data_ins = "INSERT INTO `users_ads_data` (
														`data_value`, 
														`form_id`, 
														`ad_id` 
													) VALUES (
														'".$data_value."', 
														'".$form_id."', 
														'".$ad_id."' 
													);";

									if(!mysqli_query($KONN, $qu_users_ads_data_ins)){
										die("G-Error-5454");
									}
									
								}
							}

						} else {
							//two languages
							if( $form_id != 0 ){
								if( $data_value != "" ){
									
									
									$qu_users_ads_data_ins = "INSERT INTO `users_ads_data` (
														`data_value`, 
														`form_id`, 
														`is_ar`, 
														`ad_id` 
													) VALUES (
														'".$data_value."', 
														'".$form_id."', 
														'".$is_ar."', 
														'".$ad_id."' 
													);";

									if(!mysqli_query($KONN, $qu_users_ads_data_ins)){
										die("G-Error-5454");
									}
									
									if( $is_ar == 1 ){
										$is_ar = 0;
									} else if( $is_ar == 0 ){
										$is_ar = 1;
									}
								}
							}

						}
					}
				}
				
				
				
					$IAM_ARRAY['success'] = true;
					$IAM_ARRAY['message'] = "Data Saved";
					$IAM_ARRAY['goto'] = "add_adv02.php?ad_id=$ad_id";
				
			} else {
				$IAM_ARRAY['success'] = false;
				$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات");
			}
		} else {
			$IAM_ARRAY['success'] = false;
			$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات");
		}
		
		
		
	} else {
		$IAM_ARRAY['success'] = false;
		$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات");
	}
	
} else {
	$IAM_ARRAY['success'] = false;
	$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات");
}

	header('Content-Type: application/json');
	echo json_encode($IAM_ARRAY);

?>