<?php
	define('BASE_URL', '../../' );
	require_once(BASE_URL.'bootstrap/app_config.php');
	$apiCall = true;
	$IAM_ARRAY;
	
if( isset($_POST['full_name']) && 
	isset($_POST['user_email']) && 
	isset($_POST['user_password']) 
	){

	$user_id = 0;
	
	$full_name        = test_inputs($_POST['full_name']);
	$user_email       = test_inputs($_POST['user_email']);
	$user_pass         = test_inputs($_POST['user_password']);
	
	$is_active         = 1;
	$user_pass         = md5( $user_pass );
	$user_picture      = 'user.png';
	
		//get a user ID
		$qu_users_ins = "INSERT INTO `users` (
							`full_name`, 
							`user_email`, 
							`user_pass`, 
							`user_picture`, 
							`is_active` 
						) VALUES (
							'".$full_name."', 
							'".$user_email."', 
							'".$user_pass."', 
							'".$user_picture."', 
							'".$is_active."' 
						);";
						
		if(mysqli_query($KONN, $qu_users_ins)){
			$user_id = mysqli_insert_id($KONN);
			if( $user_id != 0 ){
				
						//start a session
						//log user in
						session_start();
						$_SESSION['is_logged']    = 1;
						$_SESSION['user_id']      = $user_id;
						$_SESSION['user_email']   = $user_email;
						$_SESSION['user_picture'] = $user_picture;
						$IAM_ARRAY['success'] = true;
						$IAM_ARRAY['message'] = "تم تسجيل الحساب";
						$IAM_ARRAY['goto'] = "index.php";
				
				
			}
		}
	
	
	

} else {
	$IAM_ARRAY['success'] = false;
	$IAM_ARRAY['message'] = "no valid main request";
}

	header('Content-Type: application/json');
	echo json_encode($IAM_ARRAY);

?>