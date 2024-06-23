<?php
	define('BASE_URL', '../../' );
	require_once(BASE_URL.'bootstrap/app_config.php');
	$apiCall = true;
	//require_once(BASE_URL.'bootstrap/check_api.php');
	$IAM_ARRAY;


if( isset( $_POST['user_name'] ) && 
	isset( $_POST['user_pass'] )  
){

	$user_name = ''.test_inputs( ''.$_POST['user_name'] );
	$user_pass = ''.test_inputs( ''.$_POST['user_pass'] );
	
	$route = '';
	if( isset($_POST['route']) ){
		$route = test_inputs($_POST['route']);
	}
	
	if( !empty( $user_name ) && !empty( $user_pass ) ){
		
		$user_pass = md5($user_pass);
		$chkSel_01 = "SELECT * FROM  `users` WHERE ((`is_active` = '1') AND (`user_phone` = '$user_name') );";
		$chkSel_01EXE = mysqli_query($KONN, $chkSel_01);
		if( mysqli_num_rows($chkSel_01EXE) == 1 ){
			$users_DATA = mysqli_fetch_assoc($chkSel_01EXE);
			$user_id       = ( int ) $users_DATA['user_id'];
			$user_phone    = ''.$users_DATA['user_phone'];
			$userDBpass    = ''.$users_DATA['user_pass'];
			$full_name     = ''.$users_DATA['full_name'];
			//$user_picture  = ''.$users_DATA['user_picture'];
			
			if( $user_phone === $user_name ){
				
				
				if( $userDBpass === $user_pass ){
					
					
					//log user in
					session_start();
					$_SESSION['is_logged']    = 1;
					$_SESSION['user_id']      = $user_id;
					$_SESSION['user_name']    = $full_name;
					$_SESSION['user_phone']   = $user_phone;
					//$_SESSION['user_picture'] = $user_picture;
					
					$IAM_ARRAY['success'] = true;
					$IAM_ARRAY['message'] = "Data Saved";
					
					$IAM_ARRAY['goto'] = "index.php";
					
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
	
} else {
	$IAM_ARRAY['success'] = false;
	$IAM_ARRAY['message'] = lang("Check Inputs", "خطأ في المدخلات");
}

	header('Content-Type: application/json');
	echo json_encode($IAM_ARRAY);

?>