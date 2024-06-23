<?php
	define('BASE_URL', '../../' );
	require_once(BASE_URL.'bootstrap/app_config.php');
	$apiCall = true;
	require_once(BASE_URL.'bootstrap/check_api.php');
	$IAM_ARRAY;


if( isset( $_POST['ad_id'] ) && isset( $_POST['imges'] ) ){
	
	$ad_id = 0;
	$ad_id = ( int ) test_inputs( $_POST['ad_id'] );
	$imges = $_POST['imges'];
	
	
	if( $ad_id != 0 ){
		
	
	$qu_users_ads_updt = "UPDATE  `users_ads` SET 
						`ad_status` = 'under_review'
						WHERE ((`user_id` = $USER_ID) AND (`ad_id` = $ad_id));";

	if(mysqli_query($KONN, $qu_users_ads_updt)){
		
		//upload Images
		$is_primary = 1;
		for( $E=0; $E < count($imges) ; $E++ ){
			
			$thsImgNO  = ( int ) $imges[$E];
			$thsImgReq = "ff-".$thsImgNO;
			if(isset($_FILES[$thsImgReq]) && $_FILES[$thsImgReq]["tmp_name"]){
				//upload side image
				$upload_res = upload_file($thsImgReq, 8000, 'uploads', BASE_URL.'');
				if($upload_res == true){
					//insert image
					

					$qu_users_ads_pictures_ins = "INSERT INTO `users_ads_pictures` (
										`picture_path`, 
										`ad_id`, 
										`is_primary`, 
										`user_id` 
									) VALUES (
										'".$upload_res."', 
										'".$ad_id."', 
										'".$is_primary."', 
										'".$USER_ID."' 
									);";

					if(!mysqli_query($KONN, $qu_users_ads_pictures_ins)){
						die("err-544545");
					}
					$is_primary = 0;
				}
			}
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
					$IAM_ARRAY['success'] = true;
					$IAM_ARRAY['message'] = "Data Saved";
					$IAM_ARRAY['goto'] = "add_adv04.php?ad_id=$ad_id";
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