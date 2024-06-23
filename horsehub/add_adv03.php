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
	
	$ad_id = 0;
	$qu_users_ads_sel = "SELECT `ad_id` FROM  `users_ads` WHERE (( `user_id` = $USER_ID ) AND ( `ad_status` = 'draft_02' )) ORDER BY `ad_id` DESC LIMIT 1";
	$qu_users_ads_EXE = mysqli_query($KONN, $qu_users_ads_sel);
	if(mysqli_num_rows($qu_users_ads_EXE)){
		$users_ads_DATA = mysqli_fetch_assoc($qu_users_ads_EXE);
		$ad_id = ( int ) $users_ads_DATA['ad_id'];
	}

if( $ad_id == 0 ){
	header("location:login.php");
	die();
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
 
 
<h1 class="pageMainTitle"><?=lang("Upload Pictures", "تحميل الصور"); ?></h1>




<div class="pageCols">
	<div class="stageCol">
		<div class="stageContainer">
			
			<div class="stage">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Advertise Information", "معلومات الإعلان"); ?></span>
			</div>
			
			<div class="stage">
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
				<span class="stageName"><?=lang("Pictures", "الصور"); ?></span>
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
	<div class="detailCol"  id="userSignInForm" id-modal="userlogInModal" contoller="app_api/users_ads/add_new_03.php">

<input type="hidden" name="ad_id" value="<?=$ad_id; ?>" class="data-input" alerter="<?=lang("No Ad Available", "لا يوجد إعلان مضاف"); ?>" req="1" denier="0">


		<div class="row">
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Please Upload Desireed Pictures", "قم باختيار الصور"); ?></label>
				</div>
			</div>
		</div>
		
		<div class="row" style="justify-content: start;">
			<div id="addedPoint"></div>
			
			<div class="col-4">
				<div class="imageHolder" onclick="AddImage();">
					<span>+</span>
				</div>
			</div> 
<script>
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
		
		<div class="row">
			<div class="col-2">
				<a href="add_adv02.php" class="formGroup">
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