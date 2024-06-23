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
	isset( $_GET['picture_id'] ) && 
	isset( $_GET['ad_id'] ) ){
	
	$ad_id = (int) test_inputs( $_GET['ad_id'] );
	$picture_id = (int) test_inputs( $_GET['picture_id'] );
	
	if( $picture_id != 0 ){
		
		$qu_users_ads_pictures_del = "DELETE FROM `users_ads_pictures` WHERE `picture_id` = $picture_id";
		if(mysqli_query($KONN, $qu_users_ads_pictures_del)){
			header("location:edit_ad_03.php?del=1&ad_id=".$ad_id);
			die();
		}
		
		
		
	}
	
}


if( !isset( $_GET['ad_id'] ) ){
	header("location:index.php");
	die();
}
	$ad_id = (int) test_inputs( $_GET['ad_id'] );
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
			
			
			<div class="stage ">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Description", "الوصف"); ?></span>
			</div>
			
			
			
			
			<div class="stage selectedStage">
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
	<div class="detailCol"  id="userSignInForm" id-modal="userlogInModal" contoller="app_api/users_ads/update_03.php">
		<div class="row" style="width: 100% !important;">
<input type="hidden" value="<?=$ad_id; ?>" name="ad_id" class="data-input" req="1" denier="0">



		<div class="row">
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Please Upload Desireed Pictures", "قم باختيار الصور"); ?></label>
				</div>
			</div>
		</div>
		
		
		
		

		<div class="row" style="justify-content: start;">
		
<?php
	$qu_users_ads_pictures_sel = "SELECT * FROM  `users_ads_pictures` WHERE `ad_id` = $ad_id";
	$qu_users_ads_pictures_EXE = mysqli_query($KONN, $qu_users_ads_pictures_sel);
	if(mysqli_num_rows($qu_users_ads_pictures_EXE)){
		while($users_ads_pictures_REC = mysqli_fetch_assoc($qu_users_ads_pictures_EXE)){
			$picture_id = ( int ) $users_ads_pictures_REC['picture_id'];
			$picture_path = $users_ads_pictures_REC['picture_path'];
			$ad_id = ( int ) $users_ads_pictures_REC['ad_id'];
			$user_id = ( int ) $users_ads_pictures_REC['user_id'];
			$is_primary = ( int ) $users_ads_pictures_REC['is_primary'];
		?>
	<form method="GET" id="del-<?=$picture_id; ?>" action="edit_ad_03.php" style="display:none;">
		<input type="hidden" name="del_it" value="100">
		<input type="hidden" name="ad_id" value="<?=$ad_id; ?>">
		<input type="hidden" name="picture_id" value="<?=$picture_id; ?>">
	</form>
	
		<div class="col-4" id="imgNetRow-<?=$picture_id; ?>">
				<div class="imageHolder">
					<img  id="img-<?=$picture_id; ?>" src="uploads/<?=$picture_path; ?>" alt="" style="width: 100% !important;object-fit: cover;height: 7em;">
				</div>
					<i class="fas fa-trash" onclick="remNetImg(<?=$picture_id; ?>);" style="color:red;"></i>
		</div>
		<?php
		}
	}
?>
		
			<div id="addedPoint" style="display:inline-block;"></div>
			
			<div class="col-4">
				<div class="imageHolder" onclick="AddImage();">
					<span>+</span>
				</div>
			</div> 
<script>
function remNetImg(idd){
	var aa = confirm('<?=lang("Please Confirm", "تأكيد العملية"); ?>');
	if( aa == true ){
		$('#del-' + idd).submit();
	}
}
var img = 100;

function AddImage(){
	img++;
	
	var tr = '<div class="col-4" id="imgRow-' + img + '">' + 
			'	<input type="hidden" name="imges[]" value="' + img + '" class="data-input" alerter="<?=lang("Select Image", "إختر الصورة"); ?>" req="1" denier="0">'+ 
			'	<input type="file" id="ff-' + img + '" style="display:none;" name="img-' + img + '" class="imagesLoaded data-input" alerter="<?=lang("Select Image", "إختر الصورة"); ?>" req="0" denier="">' + 
			'	<div class="imageHolder" onclick="' + "$('#ff-" + img + "').click();" + '">' + 
			'		<img  id="img-' + img + '"   src="uploads/logo_b.png" alt="" style="width: 100% !important;object-fit: cover;height: 7em;">' + 
			'	</div>' + 
			'		<i class="fas fa-trash" onclick="remImg(' + img + ');" style="color:red;"></i>' + 
			'</div>';
	$('#addedPoint').after(tr);
	initEvent(img);
	setTimeout(
		function(){
			clickThatImage(img);
		}	
	, 500);
}
function clickThatImage(ii){
	$('#ff-' + ii).click();
}
function remImg(ii){
	$('#imgRow-' + ii).remove();
}



function readURL(input, ii) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img-' + ii).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function initEvent(ii){
	$(".imagesLoaded").change(function(){
    readURL(this, ii);
});
}


</script>		
		
			<div class="col-1">
				<div class="formGroup"  id="userlogInModal">
					<div class="modalActionResults form-alerts"></div>
					<br>
					<br>
				</div>
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
				<a href="edit_ad_02.php?ad_id=<?=$ad_id; ?>" class="formGroup">
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