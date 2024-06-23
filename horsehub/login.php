<?php
	require_once('bootstrap/app_config.php');
	require_once('bootstrap/check_log_user.php');
	$page_title=$page_description=$page_keywords=$page_author= $SETTINGS['website_name'.$lang_db];
	// $page_title=$page_description=$page_keywords=$page_author= "Site Title";
	$page_id = 100;
	
	
	
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
 
 
<h1 class="pageMainTitle"><?=lang("Sign In", "تسجيل الدخول"); ?></h1>




<div class="pageCols">
	<div class="stageCol">
		<div class="stageContainer">
			
			<div class="stage selectedStage">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Sign In", "تسجيل الدخول"); ?></span>
			</div>
			
		</div>
	</div>
	<div class="sepCol"></div>
	<div class="detailCol">
		<div class="row" id="userSignInForm" id-modal="userlogInModal" contoller="app_api/users/serv_login.php">
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Please Fill in the following details", "ادخل المعلومات التالية"); ?></label>
				</div>
			</div>
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Phone Number", "رقم الهاتف"); ?></label>
					<input type="text" name="user_name" id="user_email02" class="data-input" alerter="<?=lang("Please Check Phone NO.", "رقم الهاتف مطلوب"); ?>" req="1" denier="">
				</div>
			</div>
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Password", "كلمة المرور"); ?></label>
					<input type="password" name="user_pass" id="user_password02" class="data-input" alerter="<?=lang("Password Error", "خطأ في كلمة المرور"); ?>" req="1" denier="">
					<a href="login_pass.php"><label style="cursor:pointer;"><?=lang("Forgot Password?", "هل نسيت كلمة المرور؟"); ?></label></a>
				</div>
			</div>
		
		
			
			<div class="col-1">
				<div class="formGroup"  id="userlogInModal">
				<div class="modalActionResults form-alerts"></div>
					<br>
					<br>
					<br>
				</div>
			</div>
			
			<div class="col-2">
				<a href="index.php" class="formGroup">
					<button class="whiterBtn" type="button"><?=lang("Cancel", "إلغاء"); ?></button>
				</a>
			</div>
			
			<div class="col-2">
				<div onclick="submit_form('userSignInForm', 'forward_page');" class="formGroup">
					<button class="blackerBtn" type="button"><?=lang("Next", "التالي"); ?></button>
				</div>
			</div>
		
			
			<div class="col-1">
				<a href="register.php" class="formGroup">
					<label style="cursor:pointer;"><center><?=lang("Dont have an account, click here to register", "لا تمتلك حساب, إضغط هنا لإنشاء حساب جديد"); ?></center></label>
				</a>
			</div>
		
		
		</div>
	</div>
</div>


<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>