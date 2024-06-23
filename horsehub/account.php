<?php
	require_once('bootstrap/app_config.php');
	require_once('bootstrap/check_log_user.php');
	$page_title=$page_description=$page_keywords=$page_author= $SETTINGS['website_name'.$lang_db];
	// $page_title=$page_description=$page_keywords=$page_author= "Site Title";
	$page_id = 100;
	
if( $IS_LOGGED == false ){
	header("location:login.php");
	die();
}



$RES = "";
if( isset($_POST['mod_data']) ){


	$qqq = "";

	if( isset($_POST['full_name']) ){
		$full_name = test_inputs( $_POST['full_name'] );
		$qqq = $qqq."`full_name` = '".$full_name."', ";
	}
	if( isset($_POST['user_email']) ){
		$user_email = test_inputs( $_POST['user_email'] );
		$qqq = $qqq."`user_email` = '".$user_email."', ";
	}
	/*
	if( isset($_POST['user_phone']) ){
		$user_phone = test_inputs( $_POST['user_phone'] );
		$qqq = $qqq."`user_phone` = '".$user_phone."', ";
	}
	*/
	if( isset($_POST['user_license']) ){
		$user_license = test_inputs( $_POST['user_license'] );
		$qqq = $qqq."`user_license` = '".$user_license."', ";
	}
	

	if( $qqq != "" ){
		$qqq =  substr($qqq, 0, -2);
		$qu_users_updt = "UPDATE  `users` SET ".$qqq."  WHERE `user_id` = $USER_ID;";

		if(mysqli_query($KONN, $qu_users_updt)){
			$RES = lang("Data Saved", "تم الحفظ");
		}
	}
}















		$user_id = 0;
		$full_name = "";
		$user_email = "";
		$user_phone = "";
		$user_pass = "";
		$user_license = "";
		$is_construction = 0;
		$is_equipments = 0;
		$is_vet = 0;
		$is_phar = 0;
		$is_knight = 0;
		$is_stable = 0;
		$is_trainer = 0;
	$qu_users_sel = "SELECT * FROM  `users` WHERE `user_id` = $USER_ID";
	$qu_users_EXE = mysqli_query($KONN, $qu_users_sel);
	
	if(mysqli_num_rows($qu_users_EXE)){
		$users_DATA = mysqli_fetch_assoc($qu_users_EXE);
		$user_id = ( int ) $users_DATA['user_id'];
		$full_name = $users_DATA['full_name'];
		$user_email = $users_DATA['user_email'];
		$user_phone = $users_DATA['user_phone'];
		$user_pass = $users_DATA['user_pass'];
		$user_license = $users_DATA['user_license'];
		$is_construction = ( int ) $users_DATA['is_construction'];
		$is_equipments = ( int ) $users_DATA['is_equipments'];
		$is_vet = ( int ) $users_DATA['is_vet'];
		$is_phar = ( int ) $users_DATA['is_phar'];
		$is_knight = ( int ) $users_DATA['is_knight'];
		$is_stable = ( int ) $users_DATA['is_stable'];
		$is_trainer = ( int ) $users_DATA['is_trainer'];
	}

	
?>
<!DOCTYPE html>
<html dir="<?=$lang_dir; ?>" lang="<?=$lang; ?>">
<head>
<?php
	include("app/assets.php");
?>
</head>

<body>
<?php
	include("app/header.php");
?>
 
 
<h1 class="pageMainTitle"><?=lang("Account", "الحساب"); ?></h1>


<div class="catSelector" style="justify-content:start;">
	<a href="account.php" class="cat catSelected">
		<span><?=lang("Account", "الحساب"); ?></span>
	</a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="account_ads.php" class="cat">
		<span><?=lang("My Ads", "الإعلانات"); ?></span>
	</a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="account_puchase.php" class="cat">
		<span><?=lang("Purchases And Subscriptions", "الاشتراكات والمشتريات"); ?></span>
	</a>
</div>



<div class="pageCols">

	<div class="detailCol">
		<form method="POST" class="row">
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Account details", "معلومات الحساب"); ?></label>
				</div>
			</div>
			
		
		
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Full Name", "الاسم الكامل"); ?><span>( <?=lang("required", "مطلوب"); ?> )</span></label>
					<input type="hidden" name="mod_data" value="1" id="mod_data">
					<input type="text" name="full_name" value="<?=$full_name; ?>" id="full_name" required>
				</div>
			</div>
			
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Email", "البريد الإلكتروني"); ?></label>
					<input type="email" name="user_email" value="<?=$user_email; ?>" id="user_email">
				</div>
			</div>
			
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Phone NO.", "رقم الهاتف"); ?><span>( <?=lang("required", "مطلوب"); ?> )</span></label>
					<input type="text" name="user_phone" value="<?=$user_phone; ?>" id="user_phone" disabled readonly required>
				</div>
			</div>
			
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("License", "الرخصة او العضوية"); ?></label>
					<input type="text" name="user_license" value="<?=$user_license; ?>" id="user_license">
				</div>
			</div>
			
			
			
			<div class="col-1">
				<div class="formGroup">
					<br>
					<br>
					<br>
				</div>
			</div>
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=$RES; ?></label>
				</div>
			</div>
			<div class="col-2">
				<div class="formGroup">
				</div>
			</div>
			
			<div class="col-2">
				<div class="formGroup">
					<button class="blackerBtn" type="submit"><?=lang("Save", "حفظ"); ?></button>
				</div>
			</div>
		
		
		
		</form>
	</div>
</div>
<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>