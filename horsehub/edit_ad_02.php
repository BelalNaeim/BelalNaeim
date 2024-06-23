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
	


if( !isset( $_GET['ad_id'] ) ){
	header("location:login.php");
	die();
}
	$ad_id = (int) test_inputs( $_GET['ad_id'] );
	if( $ad_id == 0 ){
		header("location:login.php");
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
		$ad_id = ( int ) $users_ads_DATA['ad_id'];
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
 
 
<h1 class="pageMainTitle"><?=lang("Advertise Information Edit", "تحرير معلومات الإعلان"); ?></h1>




<div class="pageCols">
	<div class="stageCol">
		<div class="stageContainer">
			
			<div class="stage ">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Advertise Information", "معلومات الإعلان"); ?></span>
			</div>
			
			
			<div class="stage selectedStage">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Description", "الوصف"); ?></span>
			</div>
			
			
			
			
			
			<div class="stage">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Images", "الصور"); ?></span>
			</div>
			
			
			
			<div class="stage">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Confirmation", "تأكيد"); ?></span>
			</div>
			
			
			
		</div>
	</div>
	<div class="sepCol"></div>
	<div class="detailCol"  id="userSignInForm" id-modal="userlogInModal" contoller="app_api/users_ads/update_02.php">
		<div class="row" style="width: 100% !important;">
<input type="hidden" value="<?=$ad_id; ?>" name="ad_id" class="data-input" req="1" denier="0">

			<div class="col-2">
				<div class="formGroup">
					<label><?=lang("Emirate", "الإمارة"); ?></label>
					<select type="text" name="ad_location" id="ad_location" class="data-input" alerter="<?=lang("Please Check Inputs", "خطأ في المدخلات"); ?>" req="1" denier="0">
						<option value="0" selected><?=lang("Please Select", "الرجاء الاختيار"); ?></option>
						<option value="AD"><?=lang("Abu Dhabi", "أبوظبي"); ?></option>
						<option value="DXB"><?=lang("Dubai", "دبي"); ?></option>
						<option value="SHJ"><?=lang("Sharjah", "الشارقة"); ?></option>
						<option value="AJM"><?=lang("Ajman", "عجمان"); ?></option>
						<option value="UMQ"><?=lang("Umm Al Qeween", "أم القيوين"); ?></option>
						<option value="RAK"><?=lang("RAK", "رأس الخيمة"); ?></option>
						<option value="FUJ"><?=lang("Al Fujairah", "الفجيرة"); ?></option>
					</select>
				</div>
			</div>
<script>
$('#ad_location').val('<?=$ad_location; ?>');
</script>
			<div class="col-2">
				<div class="formGroup">
					<label><?=lang("Price", "السعر"); ?></label>
					<input type="text" name="ad_price" value="<?=$ad_price; ?>" id="ad_price" class="data-input" alerter="<?=lang("Please Check Inputs", "خطأ في المدخلات"); ?>" req="1" denier="">
				</div>
			</div>
		
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Sales", "العروض والخصومات"); ?></label>
					<input type="text" name="ad_discount" id="ad_discount" value="<?=$ad_discount; ?>" class="data-input" alerter="<?=lang("Please Check Inputs", "خطأ في المدخلات"); ?>" req="1" denier="">
				</div>
			</div>




		
		
			<div class="col-1">
				<div class="formGroup"  id="userlogInModal">
					<div class="modalActionResults form-alerts"></div>
					<br>
					<br>
				</div>
			</div>
			
			<div class="col-2">
				<a href="edit_ad.php?ad_id=<?=$ad_id; ?>" class="formGroup">
					<button class="whiterBtn" type="button"><?=lang("Previouse", "السابق"); ?></button>
				</a>
			</div>
			
			
			<div class="col-2">
				<div onclick="submit_form('userSignInForm', 'forward_page');" class="formGroup">
					<button class="blackerBtn" type="button"><?=lang("Next", "التالي"); ?></button>
				</div>
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