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
 
 
<h1 class="pageMainTitle"><?=lang("My Ads", "الإعلانات"); ?></h1>


<div class="catSelector" style="justify-content:start;">
	<a href="account.php" class="cat ">
		<span><?=lang("Account", "الحساب"); ?></span>
	</a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="account_ads.php" class="cat ">
		<span><?=lang("My Ads", "الإعلانات"); ?></span>
	</a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="account_puchase.php" class="cat catSelected">
		<span><?=lang("Purchases And Subscriptions", "الاشتراكات والمشتريات"); ?></span>
	</a>
</div>


		
		
<div class="row">
	<div class="col-1">
		<p>
			<?=lang("Subscription Type", "نوع الاشتراك"); ?> : <br><br>
		</p>
		
<?php
if( $is_construction == 1 ){
?>
		<p>
			<?=lang("Construction And Contracting", "مقاولات وبناء"); ?> <br><br>
		</p>
<?php
}
?>
<?php
if( $is_equipments == 1 ){
?>
		<p>
			<?=lang("Products", "منتجات الخيل"); ?> <br><br>
		</p>
<?php
}
?>
<?php
if( $is_vet == 1 ){
?>
		<p>
			<?=lang("veterinary", "بيطري"); ?> <br><br>
		</p>
<?php
}
?>
<?php
if( $is_phar == 1 ){
?>
		<p>
			<?=lang("Clinic And Pharmacy", "العيادة والصيدلية"); ?> <br><br>
		</p>
<?php
}
?>
<?php
if( $is_knight == 1 ){
?>
		<p>
			<?=lang("Knight", "فارس"); ?> <br><br>
		</p>
<?php
}
?>
<?php
if( $is_stable == 1 ){
?>
		<p>
			<?=lang("stables", "إسطبلات"); ?> <br><br>
		</p>
<?php
}
?>
<?php
if( $is_trainer == 1 ){
?>
		<p>
			<?=lang("Trainers", "مدربين"); ?> <br><br>
		</p>
<?php
}
?>

	</div>
</div>

<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>