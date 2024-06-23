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
 
 
<h1 class="pageMainTitle"><?=lang("Subscribe", "الاشتراك"); ?></h1>




<div class="pageCols">
	<div class="stageCol">
		<div class="stageContainer">
			
			<div class="stage ">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Subscripiton Type", "نوع الاشتراك"); ?></span>
			</div>
			
			<div class="stage ">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("User Information", "معلومات عامة"); ?></span>
			</div>

            <div class="stage">
                <div class="stageIcon">
                    <i class="fas fa-check"></i>
                    <i class="fas fa-circle"></i>
                </div>
                <span class="stageName"><?=lang("Payment Process", "عملية الدفع"); ?></span>
            </div>
			
			<div class="stage selectedStage">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Confirmation", "التأكيد"); ?></span>
			</div>
			
		</div>
	</div>
	<div class="sepCol"></div>
	<div class="detailCol">
		<div class="row">
		
			
			<div class="col-1">
				<div class="formGroup confirmer">
					<h1><i class="fas fa-check"></i></h1>
					<h1><?=lang("Done", "تم الإشتراك"); ?></h1>
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
				<a href="login.php" class="formGroup">
					<button class="blackerBtn" type="button"><?=lang("Go to Sign In", "تسجيل الدخول"); ?></button>
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