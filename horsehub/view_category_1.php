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

 
 
<h1 class="pageMainTitle"><?=lang("horse shows", "عروض الخيل"); ?></h1>

<div class="catSelector">
	<div class="cat catSelected">
		<span><?=lang("All", "الكل"); ?></span>
	</div>
	<div class="cat">
		<span><?=lang("horse ability", "خيل القدرة"); ?></span>
	</div>
	<div class="cat">
		<span><?=lang("polo horses", "خيل البولو"); ?></span>
	</div>
	<div class="cat">
		<span><?=lang("Flat Race Horse", "خيل الفلات ريس"); ?></span>
	</div>
	<div class="cat">
		<span><?=lang("Pony CC", "خيل البوني سي سي"); ?></span>
	</div>
	<div class="cat">
		<span><?=lang("Jumping", "خيل القفز"); ?></span>
	</div>
	<div class="cat">
		<span><?=lang("Pony Horse", "خيل البوني"); ?></span>
	</div>
</div>


<div class="productListView">

	<a href="view_adv.php?adv_id=1" class="producter">
		<div class="producterInfo">
			<img src="uploads/h01.jpg" alt="">
			<div class="producterTexter">
				<span><?=lang("Type", "النوع"); ?></span>
				<span><?=lang("Speciality", "التخصص"); ?></span>
				<span><?=lang("Age", "العمر"); ?></span>
				<span><?=lang("Country", "الإمارة"); ?></span>
			</div>
			<i class="fas fa-chevron-<?=trim(lang("right", "left")); ?>"></i>
		</div>
		<div class="producterData">
		
			<div class="producterDataPair">
				<label><?=lang("Adv NO.", "رقم الإعلان"); ?></label>
				<span>123456</span>
			</div>
		
			<div class="producterDataPair">
				<label><?=lang("Views", "المشاهدات"); ?></label>
				<span>413</span>
			</div>
		
			<div class="producterDataPair">
				<label><?=lang("Date", "التاريخ"); ?></label>
				<span>2022-11-11</span>
			</div>
		
			<div class="producterDataPair">
				<label><?=lang("Price", "السعر"); ?></label>
				<span>100 AED</span>
			</div>
			
		</div>
	</a>

<?php
	$qu_users_ads_sel = "SELECT * FROM  `users_ads` WHERE ((`category_id` IN (7) ) AND (`ad_status` = 'published'))";
	$qu_users_ads_EXE = mysqli_query($KONN, $qu_users_ads_sel);
	if(mysqli_num_rows($qu_users_ads_EXE)){
		while($users_ads_REC = mysqli_fetch_assoc($qu_users_ads_EXE)){
			
			
			
	$thsUserfull_name = "";
	$thsUserId = ( int ) $users_ads_REC['user_id'];
		$qu_users_sel = "SELECT `full_name` FROM  `users` WHERE `user_id` = ".$thsUserId;
		$qu_users_EXE = mysqli_query($KONN, $qu_users_sel);
		if(mysqli_num_rows($qu_users_EXE)){
			$users_DATA = mysqli_fetch_assoc($qu_users_EXE);
			$thsUserfull_name = $users_DATA['full_name'];
		}
		
		
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
	if( $is_translated == 1 ){
		if( $lang_db == "_ar" ){
			$is_ar = 1;
		}
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
	<a href="view_ad.php?ad_id=<?=$ad_id; ?>" class="producter">
		<div class="producterInfo">
			<img src="uploads/<?=$mainImge; ?>" alt="">
			<div class="producterTexter">
				<span><?=$thsUserfull_name; ?></span>
<?php
if( $adMainTitle != "" ){
?>
				<span><?=$adMainTitle; ?></span>
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
	
	<a href="add_adv.php?typer=7&sub=19&extra_l=0" class="product producterHolder">
		<span>+<br><?=lang("Post Your Ad", "أضف إعلانك هنا"); ?></span>
	</a>
	
</div>



<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>