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
	
	$typer = 0;
	if( isset( $_GET['typer'] ) ){
		$typer = ( int ) test_inputs( $_GET['typer'] );
	}
	
	$sub = 0;
	if( isset( $_GET['sub'] ) ){
		$sub = ( int ) test_inputs( $_GET['sub'] );
	}
	
	$extraLang = 0;
	if( isset( $_GET['extra_l'] ) ){
		$extraLang = ( int ) test_inputs( $_GET['extra_l'] );
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
 
 
<h1 class="pageMainTitle"><?=lang("Advertise Information", "ادخال معلومات الإعلان"); ?></h1>




<div class="pageCols">
	<div class="stageCol">
		<div class="stageContainer">
			
			<div class="stage selectedStage">
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
			
			<div class="stage">
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
	<div class="detailCol"  id="userSignInForm" id-modal="userlogInModal" contoller="app_api/users_ads/add_new.php">
		<div class="row" style="width: 100% !important;">
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Please Fill in the following details", "ادخل المعلومات التالية"); ?></label>
				</div>
			</div>
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Ad Type", "نوع الاعلان"); ?></label>
					<div class="adsTypers">
<?php
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
		
		$is_construction = ( int ) $users_DATA['is_construction'];
		$is_equipments = ( int ) $users_DATA['is_equipments'];
		$is_vet = ( int ) $users_DATA['is_vet'];
		$is_phar = ( int ) $users_DATA['is_phar'];
		$is_knight = ( int ) $users_DATA['is_knight'];
		$is_stable = ( int ) $users_DATA['is_stable'];
		$is_trainer = ( int ) $users_DATA['is_trainer'];
		$is_active = ( int ) $users_DATA['is_active'];
	}
	
	$qu_ads_categories_sel = "SELECT * FROM  `ads_categories`";
	$qu_ads_categories_EXE = mysqli_query($KONN, $qu_ads_categories_sel);
	if(mysqli_num_rows($qu_ads_categories_EXE)){
		while($ads_categories_REC = mysqli_fetch_assoc($qu_ads_categories_EXE)){
			$thsID = ( int ) $ads_categories_REC['category_id'];
			$namer = $ads_categories_REC['category_name'.$lang_db];
			$is_special = ( int ) $ads_categories_REC['is_special'];
			
			
			$THScss = "";	
			if($typer== $thsID){
				$THScss = "act";
			}
			$showIt = true;
			
			if( $is_special == 1 ){
				$showIt = false;
				if( $is_knight == 1 || $is_trainer == 1 ){
					$showIt = true;
				}
			}
			//22, 23
			$showIt = false;
			$thsSub = 0;
			if( $thsID == 1 ){
				$thsSub = 1;
				if( $is_construction == 1 ){
					$showIt = true;
				}
			} else if( $thsID == 2 ){
				$thsSub = 4;
				if( $is_equipments == 1 ){
					$showIt = true;
				}
			} else if( $thsID == 3 ){
				$thsSub = 17;
				if( $is_vet == 1 ){
					$showIt = true;
				}
			} else if( $thsID == 4 ){
				$thsSub = 18;
				if( $is_phar == 1 ){
					$showIt = true;
				}
			} else if( $thsID == 5 ){
				$thsSub = 11;
				if( $is_trainer == 1 ){
					$showIt = true;
				}
			} else if( $thsID == 6 ){
				$thsSub = 15;
				if( $is_knight == 1 ){
					$showIt = true;
				}
			} else if( $thsID == 7 ){
				$thsSub = 19;
				if( $is_knight == 1 || $is_trainer == 1 ){
					$showIt = true;
				}
			} else if( $thsID == 8 ){
				$thsSub = 20;
				$showIt = true;
			}
			
			
			
			
			
			if( $showIt == true ){
?>
		<a href="add_adv.php?typer=<?=$thsID; ?>&sub=<?=$thsSub; ?>&extra_l=<?=$extraLang; ?>" class="<?=$THScss; ?>" ><?=$namer; ?></a>
<?php
			}
		}
	}
?>
					
					
					</div>
				</div>
			</div>
			
			
			
			
<?php
//get data for specific ad type
?>

<?php
	$qu_ads_subs_sel = "SELECT * FROM  `ads_subs` WHERE ((`category_id` = $typer) AND ( `is_shown` = 1 ) )";
	$qu_ads_subs_EXE = mysqli_query($KONN, $qu_ads_subs_sel);
	if(mysqli_num_rows($qu_ads_subs_EXE)){
		?>
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Ad Category", "فئة الاعلان"); ?></label>
					<div class="adsTypers">
		<?php
		while($ads_subs_REC = mysqli_fetch_assoc($qu_ads_subs_EXE)){
			$sID = ( int ) $ads_subs_REC['sub_id'];
			$sNamer = $ads_subs_REC['sub_name'.$lang_db];
			
			$THScss = "";	
			if($sub == $sID){
				$THScss = "act";
			}
			
		?>
		<a href="add_adv.php?typer=<?=$typer; ?>&sub=<?=$sID; ?>&extra_l=<?=$extraLang; ?>" class="<?=$THScss; ?>" ><?=$sNamer; ?></a>
		<?php
		}
		?>
					</div>
				</div>
			</div>
		<?php
	}
?>



			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Ad Translation", "ترجمة محتوى الإعلان"); ?></label>
					<div class="adsTypers">
		<a href="add_adv.php?typer=<?=$typer; ?>&sub=<?=$sub; ?>&extra_l=0" class="<?php if($extraLang==0){?>act<?php } ?>" ><?=lang("One Language", "لغة واحدة"); ?></a>
		<a href="add_adv.php?typer=<?=$typer; ?>&sub=<?=$sub; ?>&extra_l=1" class="<?php if($extraLang==1){?>act<?php } ?>" ><?=lang("AR and EN", "العربية والانجليزية"); ?></a>

					</div>
				</div>
			</div>


		</div>
		<div class="row">




<?php
//get forms
?>
<input type="hidden" name="category_id" value="<?=$typer; ?>" class="data-input" alerter="<?=lang("Please Check Type", "خطأ في المدخلات1"); ?>" req="1" denier="0">
<input type="hidden" name="sub_id" value="<?=$sub; ?>" class="data-input" alerter="<?=lang("Please Check Sub Type", "خطأ في المدخلات2"); ?>" req="1" denier="0">
<input type="hidden" name="is_translated" value="<?=$extraLang; ?>" class="data-input" alerter="<?=lang("Please Check Sub Type", "خطأ في المدخلات3"); ?>" req="1" denier="100">
			
				<div class="col-1">
					<div class="formGroup">
						<br>
					</div>
				</div>
<?php
	$qu_ads_subs_forms_sel = "SELECT * FROM  `ads_subs_forms` WHERE `sub_id` = $sub";
	$qu_ads_subs_forms_EXE = mysqli_query($KONN, $qu_ads_subs_forms_sel);
	if(mysqli_num_rows($qu_ads_subs_forms_EXE)){
		while($ads_subs_forms_REC = mysqli_fetch_assoc($qu_ads_subs_forms_EXE)){
			$form_id = ( int ) $ads_subs_forms_REC['form_id'];
			$form_name = $ads_subs_forms_REC['form_name'.$lang_db];
			//$form_name_ar = $ads_subs_forms_REC['form_name_ar'];
			$form_type = $ads_subs_forms_REC['form_type'];
			$form_request = $ads_subs_forms_REC['form_request'];
			$is_required = ( int ) $ads_subs_forms_REC['is_required'];
/*			
<input type="hidden" name="req_data[]" value="<?=$form_id; ?>" class="data-input" alerter="ERR-2226586" req="1" denier="0">
*/	
			
			if( $extraLang == 0 ){
				
				if( $form_type == 'input' ){
			?>
				<div class="col-1">
					<div class="formGroup">
						<label><?=$form_name; ?></label>
						<input type="text" name="<?=$form_id; ?>" id="<?=$form_request; ?>" class="data-input" alerter="<?=lang("Please Check Inputs", "خطأ في المدخلات"); ?>" req="1" denier="">
					</div>
				</div>
			<?php
				} else if( $form_type == 'textarea' ){
			?>
				<div class="col-1">
					<div class="formGroup">
						<label><?=$form_name; ?></label>
						<textarea rows="5" name="<?=$form_id; ?>" id="<?=$form_request; ?>" class="data-input" alerter="<?=lang("Please Check Inputs", "خطأ في المدخلات"); ?>" req="1" denier=""></textarea>
					</div>
				</div>
			<?php
				}
				
				
			} else if( $extraLang == 1 ){
				if( $form_type == 'input' ){
			?>
				<div class="col-2">
					<div class="formGroup">
						<label><?=$form_name; ?> (بالعربية)</label>
						<input type="text" name="<?=$form_id; ?>_ar" id="<?=$form_request; ?>_ar" class="data-input" alerter="<?=lang("Please Check Inputs", "خطأ في المدخلات"); ?>" req="1" denier="">
					</div>
				</div>
				<div class="col-2">
					<div class="formGroup">
						<label><?=$form_name; ?> (English)</label>
						<input type="text" name="<?=$form_id; ?>" id="<?=$form_request; ?>" class="data-input" alerter="<?=lang("Please Check Inputs", "خطأ في المدخلات"); ?>" req="1" denier="">
					</div>
				</div>
			<?php
				} else if( $form_type == 'textarea' ){
			?>
				<div class="col-2">
					<div class="formGroup">
						<label><?=$form_name; ?> (بالعربية)</label>
						<textarea rows="5" name="<?=$form_id; ?>_ar" id="<?=$form_request; ?>_ar" class="data-input" alerter="<?=lang("Please Check Inputs", "خطأ في المدخلات"); ?>" req="1" denier=""></textarea>
					</div>
				</div>
				<div class="col-2">
					<div class="formGroup">
						<label><?=$form_name; ?> (English)</label>
						<textarea rows="5" name="<?=$form_id; ?>" id="<?=$form_request; ?>" class="data-input" alerter="<?=lang("Please Check Inputs", "خطأ في المدخلات"); ?>" req="1" denier=""></textarea>
					</div>
				</div>
			<?php
				}
				
			}
			
			
			
		}
	}

?>

			<div class="col-1">
				<div class="formGroup"  id="userlogInModal">
					<div class="modalActionResults form-alerts"></div>
					<br>
					<br>
				</div>
			</div>
			
			<div class="col-2">
				<div class="formGroup">
					&nbsp;
				</div>
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