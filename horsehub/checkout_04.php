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
 
 
<h1 class="pageMainTitle"><?=lang("Confirmation", "تأكيد عملية الشراء"); ?></h1>




<div class="pageCols">
	<div class="stageCol">
		<div class="stageContainer">
			
			<div class="stage ">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Address", "العنوان"); ?></span>
			</div>
			
			<div class="stage ">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Delivery Options", "خيارات التوصيل"); ?></span>
			</div>
			
			<div class="stage ">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Payment", "الدفع"); ?></span>
			</div>
			
			<div class="stage selectedStage">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Confirmation", "تأكيد"); ?></span>
			</div>
			
			
			
		</div>
	</div>
	<div class="sepCol"></div>
	<div class="detailCol">
		<div class="row">
		
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Deleivery Confirmation", "موعد التوصيل يوم الأحد 2202/10/30, الساعة الواحدة ظهراً"); ?></label>
				</div>
			</div>
		
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Total Purchase", "مجموع المشتريات"); ?> : 300</label>
				</div>
			</div>
		
		
		
			
		
			<div class="col-1">
				<div class="formGroup">
					<br>
					<br>
					<br>
				</div>
			</div>
			
			<div class="col-2">
				<a href="checkout_03.php" class="formGroup">
					<button class="whiterBtn" type="button"><?=lang("Previouse", "السابق"); ?></button>
				</a>
			</div>
			
			<div class="col-2">
				<a href="index.php" class="formGroup">
					<button class="blackerBtn" type="button"><?=lang("Place Order", "تأكيد"); ?></button>
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