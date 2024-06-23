<?php
	require_once('bootstrap/app_config.php');
	require_once('bootstrap/check_log_user.php');
	$page_title=$page_description=$page_keywords=$page_author= $SETTINGS['website_name'.$lang_db];
	// $page_title=$page_description=$page_keywords=$page_author= "Site Title";
	$page_id = 100;
	
	$category_id = 1;
	if( isset( $_GET['category_id'] ) ){
		$category_id = ( int ) test_inputs( $_GET['category_id'] );
	}
	
		header("location:view_category_$category_id.php");
		die();
	
	
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


<?php
	for( $i=1 ; $i < 5 ; $i++ ){
		$I = ($i%2 == 0) ? 2 : 1 ;
?>
	<a href="view_adv.php?adv_id=1" class="producter">
		<div class="producterInfo">
			<img src="uploads/h0<?=$I; ?>.jpg" alt="">
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