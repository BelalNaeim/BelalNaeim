<?php
	require_once('bootstrap/app_config.php');
	require_once('bootstrap/check_log_user.php');
	$page_title=$page_description=$page_keywords=$page_author= $SETTINGS['website_name'.$lang_db];
	// $page_title=$page_description=$page_keywords=$page_author= "Site Title";
	$page_id = 100;
	
	$ad_id = 0;
	if( isset( $_GET['ad_id'] ) ){
		$ad_id = ( int ) test_inputs( $_GET['ad_id'] );
	}
	
	
	if( $ad_id == 0 ){
		header("location:index.php");
		die();
	}
	
	
	
	$ad_location = "";
	$ad_location_ar = "";
	$ad_price = "";
	$ad_discount = "";
	$ad_date = "";
	$ad_views = 0;
	$ad_votes = 0;
	$sub_id = 0;
	$category_id = 0;
	$user_id = 0;
	$ad_status = "";
	$is_translated = 0;
	$qu_users_ads_sel = "SELECT * FROM  `users_ads` WHERE `ad_id` = $ad_id";
	$qu_users_ads_EXE = mysqli_query($KONN, $qu_users_ads_sel);
	$users_ads_DATA;
	if(mysqli_num_rows($qu_users_ads_EXE)){
		$users_ads_DATA = mysqli_fetch_assoc($qu_users_ads_EXE);
		
		$ad_location = $users_ads_DATA['ad_location'];
		$ad_location_ar = $users_ads_DATA['ad_location_ar'];
		$ad_price = ( double ) $users_ads_DATA['ad_price'];
		$ad_discount = ( double ) $users_ads_DATA['ad_discount'];
		$ad_date = $users_ads_DATA['ad_date'];
		$ad_views = ( int ) $users_ads_DATA['ad_views'];
		$ad_votes = ( int ) $users_ads_DATA['ad_votes'];
		$sub_id = ( int ) $users_ads_DATA['sub_id'];
		$category_id = ( int ) $users_ads_DATA['category_id'];
		$user_id = ( int ) $users_ads_DATA['user_id'];
		$ad_status = $users_ads_DATA['ad_status'];
		$is_translated = ( int ) $users_ads_DATA['is_translated'];
	}

	
	$qu_ads_subs_forms_sel = "SELECT `form_id` FROM  `ads_subs_forms` WHERE ((`form_request` = 'ad_title') AND (`sub_id` = $sub_id))";
	$qu_ads_subs_forms_EXE = mysqli_query($KONN, $qu_ads_subs_forms_sel);
	$thsFORM = 0;
	if(mysqli_num_rows($qu_ads_subs_forms_EXE)){
		$ads_subs_forms_DATA = mysqli_fetch_assoc($qu_ads_subs_forms_EXE);
		$thsFORM = ( int ) $ads_subs_forms_DATA['form_id'];
	}
	
	
	$is_ar = 0;
	if( $is_translated == 1 ){
		if( $lang_db == "_ar" ){
			$is_ar = 1;
		}
	}
	
	$qu_users_ads_data_sel = "SELECT `data_value` FROM  `users_ads_data` WHERE ((`form_id` = $thsFORM) AND (`is_ar` = $is_ar) AND (`ad_id` = $ad_id))";
	$qu_users_ads_data_EXE = mysqli_query($KONN, $qu_users_ads_data_sel);
	$adMainTitle = "";
	if(mysqli_num_rows($qu_users_ads_data_EXE)){
		$users_ads_data_DATA = mysqli_fetch_assoc($qu_users_ads_data_EXE);
		$adMainTitle = $users_ads_data_DATA['data_value'];
	}
	
	

	$qu_users_ads_updt = "UPDATE  `users_ads` SET 
						`ad_views` = `ad_views` + 1
						WHERE `ad_id` = $ad_id;";

	if(mysqli_query($KONN, $qu_users_ads_updt)){
		
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

 
 
<h1 class="pageMainTitle"><?=$adMainTitle; ?></h1>


<div class="itemPictures">
<?php

	$qu_users_ads_pictures_sel = "SELECT * FROM  `users_ads_pictures` WHERE ((`ad_id` = $ad_id) AND (`is_primary` = 1))";
	$qu_users_ads_pictures_EXE = mysqli_query($KONN, $qu_users_ads_pictures_sel);
	$mainImge = "logo_b.png";
	if(mysqli_num_rows($qu_users_ads_pictures_EXE)){
		$users_ads_pictures_DATA = mysqli_fetch_assoc($qu_users_ads_pictures_EXE);
		$mainImge = $users_ads_pictures_DATA['picture_path'];
	}
	
?>
	<img class="mainImage" id="mainImg" src="uploads/<?=$mainImge; ?>" alt="" style="width: 20em;height: 15em;object-fit: contain;">
	<div class="thumbnails">
<?php
	$qu_users_ads_pictures_sel = "SELECT * FROM  `users_ads_pictures` WHERE `ad_id` = $ad_id";
	$qu_users_ads_pictures_EXE = mysqli_query($KONN, $qu_users_ads_pictures_sel);
	if(mysqli_num_rows($qu_users_ads_pictures_EXE)){
		while($users_ads_pictures_REC = mysqli_fetch_assoc($qu_users_ads_pictures_EXE)){
			$picture_id = ( int ) $users_ads_pictures_REC['picture_id'];
			$picture_path = $users_ads_pictures_REC['picture_path'];
		?>
		<img onclick="viewMe('uploads/<?=$picture_path; ?>');" id="t-<?=$picture_id; ?>" src="uploads/<?=$picture_path; ?>" alt="">
		<?php
		}
	}
?>

	</div>
</div>

<script>
function viewMe(dd){
	$('#mainImg').attr('src', dd);
}
</script>

<div class="itemNamer">
	<h1 class="itemName"><?=$USER_NAME; ?></h1>
	<span class="itemPrice"><?=$ad_price; ?> AED</span>
</div>


<div class="itemEva">
	<div class="itemEvaStars">
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
	</div>
	<span class="itemPrice"><?=$ad_votes; ?> <?=lang("Votes", "تقييم"); ?></span>
</div>


<div class="advData">
	<div class="advDataPair">
		<label><?=lang("Type", "نوع الإعلان"); ?></label>
		<span><?=$category_name; ?></span>
	</div>
	<div class="advDataPair">
		<label><?=lang("category", "التصنيف"); ?></label>
		<span><?=$sub_name; ?></span>
	</div>
	
<?php
	$is_ar = 0;
	if( $is_translated == 1 ){
		if( $lang_db == "_ar" ){
			$is_ar = 1;
		} else {
			$is_ar = 0;
		}
	}
	
	
	$qu_users_ads_data_sel = "SELECT * FROM  `users_ads_data` WHERE ((`ad_id` = $ad_id)  AND (`is_ar` = $is_ar) )";
	$qu_users_ads_data_EXE = mysqli_query($KONN, $qu_users_ads_data_sel);
	if(mysqli_num_rows($qu_users_ads_data_EXE)){
		while($users_ads_data_REC = mysqli_fetch_assoc($qu_users_ads_data_EXE)){
			$data_id = ( int ) $users_ads_data_REC['data_id'];
			$data_value = $users_ads_data_REC['data_value'];
			$form_id = ( int ) $users_ads_data_REC['form_id'];
			

	
		
	$qu_ads_subs_forms_sel = "SELECT * FROM  `ads_subs_forms` WHERE ((`form_id` = $form_id))";
	$qu_ads_subs_forms_EXE = mysqli_query($KONN, $qu_ads_subs_forms_sel);
	$form_name;
	if(mysqli_num_rows($qu_ads_subs_forms_EXE)){
		$ads_subs_forms_DATA = mysqli_fetch_assoc($qu_ads_subs_forms_EXE);
		$form_name = $ads_subs_forms_DATA['form_name'.$lang_db];
	}
			
			
		?>
	<div class="advDataPair">
		<label><?=$form_name; ?></label>
		<span><?=$data_value; ?></span>
	</div>
		<?php
		}
	}
?>


	
</div>







<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>