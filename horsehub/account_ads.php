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



if( isset( $_GET['del_it'] ) && 
	isset( $_GET['ad_id'] ) ){
	
	$ad_id = (int) test_inputs( $_GET['ad_id'] );
	
	if( $ad_id != 0 ){
		
		$qu_users_ads_updt = "UPDATE  `users_ads` SET 
							`ad_status` = 'deleted'
							WHERE `ad_id` = $ad_id;";

		if(mysqli_query($KONN, $qu_users_ads_updt)){
			header("location:account_ads.php?deleted=1");
			die();
		}
		
		
		
	}
	
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
	<a href="account_ads.php" class="cat catSelected">
		<span><?=lang("My Ads", "الإعلانات"); ?></span>
	</a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="account_puchase.php" class="cat">
		<span><?=lang("Purchases And Subscriptions", "الاشتراكات والمشتريات"); ?></span>
	</a>
</div>




<div class="productListView">

<?php
	$qu_users_ads_sel = "SELECT * FROM  `users_ads` WHERE ((`ad_status` NOT LIKE 'draft%') AND (`ad_status` <> 'deleted') AND (`user_id` = $USER_ID))";
	$qu_users_ads_EXE = mysqli_query($KONN, $qu_users_ads_sel);
	if(mysqli_num_rows($qu_users_ads_EXE)){
		while($users_ads_REC = mysqli_fetch_assoc($qu_users_ads_EXE)){
			
			
			$ad_id = ( int ) $users_ads_REC['ad_id'];
			$ad_location = $users_ads_REC['ad_location'];
			$ad_location_ar = $users_ads_REC['ad_location_ar'];
			$ad_price = ( double ) $users_ads_REC['ad_price'];
			$ad_discount = ( double ) $users_ads_REC['ad_discount'];
			$ad_date = $users_ads_REC['ad_date'];
			$ad_views = ( int ) $users_ads_REC['ad_views'];
			$sub_id = ( int ) $users_ads_REC['sub_id'];
			$category_id = ( int ) $users_ads_REC['category_id'];
			$user_id = ( int ) $users_ads_REC['user_id'];
			$ad_status = $users_ads_REC['ad_status'];
			$is_translated = ( int ) $users_ads_REC['is_translated'];
			
	$qu_users_ads_pictures_sel = "SELECT * FROM  `users_ads_pictures` WHERE ((`ad_id` = $ad_id) AND (`is_primary` = 1))";
	$qu_users_ads_pictures_EXE = mysqli_query($KONN, $qu_users_ads_pictures_sel);
	$mainImge = "logo_b.png";
	if(mysqli_num_rows($qu_users_ads_pictures_EXE)){
		$users_ads_pictures_DATA = mysqli_fetch_assoc($qu_users_ads_pictures_EXE);
		$mainImge = $users_ads_pictures_DATA['picture_path'];
	}
	
	
	
	
	
	$qu_ads_subs_forms_sel = "SELECT `form_id` FROM  `ads_subs_forms` WHERE ((`form_request` = 'ad_title') AND (`sub_id` = $sub_id))";
	$qu_ads_subs_forms_EXE = mysqli_query($KONN, $qu_ads_subs_forms_sel);
	$form_id = 0;
	if(mysqli_num_rows($qu_ads_subs_forms_EXE)){
		$ads_subs_forms_DATA = mysqli_fetch_assoc($qu_ads_subs_forms_EXE);
		$form_id = ( int ) $ads_subs_forms_DATA['form_id'];
	}
	
	
	$is_ar = 0;
	if( $lang_db == "_ar" ){
		$is_ar = 1;
	}
	
	$qu_users_ads_data_sel = "SELECT `data_value` FROM  `users_ads_data` WHERE ((`form_id` = $form_id) AND (`is_ar` = $is_ar) AND (`ad_id` = $ad_id))";
	$qu_users_ads_data_EXE = mysqli_query($KONN, $qu_users_ads_data_sel);
	$adMainTitle = "";
	if(mysqli_num_rows($qu_users_ads_data_EXE)){
		$users_ads_data_DATA = mysqli_fetch_assoc($qu_users_ads_data_EXE);
		$adMainTitle = $users_ads_data_DATA['data_value'];
	}

	

		$qu_ads_categories_sel = "SELECT * FROM  `ads_categories` WHERE `category_id` = ".$category_id;
		$qu_ads_categories_EXE = mysqli_query($KONN, $qu_ads_categories_sel);
		$category_name = "";
		if(mysqli_num_rows($qu_ads_categories_EXE)){
			$ads_categories_DATA = mysqli_fetch_assoc($qu_ads_categories_EXE);
			$category_name = $ads_categories_DATA['category_name'.$lang_db];
		}
		
		$qu_ads_subs_sel = "SELECT * FROM  `ads_subs` WHERE `sub_id` = ".$sub_id;
		$qu_ads_subs_EXE = mysqli_query($KONN, $qu_ads_subs_sel);
		$sub_name = "";
		if(mysqli_num_rows($qu_ads_subs_EXE)){
			$ads_subs_DATA = mysqli_fetch_assoc($qu_ads_subs_EXE);
			$sub_name = $ads_subs_DATA['sub_name'.$lang_db];
		}
	
?>
<?php
if( $ad_status != 'under_review' && $ad_status != 'denied' && $ad_status != 'draft'  ){
?>
	<form method="GET" id="ths-<?=$ad_id; ?>" action="edit_ad.php" style="display:none;">
		<input type="hidden" name="ad_id" value="<?=$ad_id; ?>">
	</form>
	<form method="GET" id="del-<?=$ad_id; ?>" action="account_ads.php" style="display:none;">
		<input type="hidden" name="del_it" value="100">
		<input type="hidden" name="ad_id" value="<?=$ad_id; ?>">
	</form>
				<span style="display: block;width: 97%;margin: 0 auto;">
					<strong onclick="$('#ths-<?=$ad_id; ?>').submit();" style="color:grey;cursor:pointer;"><?=lang("Edit", "تحرير"); ?></strong>
					&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
					<strong onclick="delThs(<?=$ad_id; ?>);" style="color:red;cursor:pointer;"><?=lang("Delete", "حذف الإعلان"); ?></strong>
				</span>
	<a href="view_ad.php?ad_id=<?=$ad_id; ?>" class="producter">
	
<?php
} else {
?>
	<a href="#" class="producter">
<?php
}
?>
	
		<div class="producterInfo">
			<img src="uploads/<?=$mainImge; ?>" alt="">
			<div class="producterTexter">
			
			
			
			
			
				<span><?=$full_name; ?></span>
<?php
if( $adMainTitle != "" ){
?>
				<span><?=$adMainTitle; ?></span>
<?php
}
?>
				
<?php
if( $ad_status == 'under_review' ){
?>
				<span style="color:red;"><?=lang("Under Review", "الإعلان قيد المراجعة"); ?></span>	
<?php
} else if( $ad_status == 'denied' ){
?>
				<span style="color:red;"><?=lang("Denied", "الإعلان مرفوض"); ?></span>	
<?php
} else if( $ad_status == 'published' ){
?>
				<span style="color:green;"><?=lang("Published", "الإعلان منشور"); ?></span>	
<?php
}
?>
				
				
				
			</div>
			<i class="fas fa-chevron-<?=trim(lang("right", "left")); ?>"></i>
		</div>
		<div class="producterData">
		
			<div class="producterDataPair">
				<label><?=lang("Adv NO.", "رقم الإعلان"); ?></label>
				<span>00<?=$ad_id; ?></span>
			</div>
		
			<div class="producterDataPair">
				<label><?=lang("Views", "المشاهدات"); ?></label>
				<span><?=$ad_views; ?></span>
			</div>
		
			<div class="producterDataPair">
				<label><?=lang("Date", "التاريخ"); ?></label>
				<span><?=$ad_date; ?></span>
			</div>
		
			<div class="producterDataPair">
				<label><?=lang("Price", "السعر"); ?></label>
				<span><?=$ad_price; ?> AED</span>
			</div>
			
		</div>
	</a>
<?php
		}
	}
?>

<script>
function delThs( idd ){
	var aa = confirm('<?=lang("Please Confirm", "تأكيد العملية"); ?>');
	if( aa == true ){
		$('#del-' + idd).submit();
	}
}
</script>
	<a href="add_adv.php" class="product producterHolder">
		<span>+<br><?=lang("Post New Ad", "أضف إعلان جديد"); ?></span>
	</a>
	
	
	
</div>

<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>