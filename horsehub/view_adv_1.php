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


<div class="itemPictures">
	<img class="mainImage" src="uploads/h01.jpg" alt="">
	<div class="thumbnails">
		<img class="" src="uploads/h01.jpg" alt="">
		<img class="" src="uploads/h01.jpg" alt="">
		<img class="" src="uploads/h01.jpg" alt="">
		<img class="" src="uploads/h01.jpg" alt="">
	</div>
</div>


<div class="itemNamer">
	<h1 class="itemName"><?=lang("Advertiser", "المعلن"); ?> : <?=lang("Mohammed Omer", "محمد عمر"); ?></h1>
	<span class="itemPrice">100 AED</span>
</div>


<div class="itemEva">
	<div class="itemEvaStars">
		<i class="fas fa-star gold"></i>
		<i class="fas fa-star gold"></i>
		<i class="fas fa-star gold"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
	</div>
	<span class="itemPrice">120 <?=lang("Votes", "تقييم"); ?></span>
</div>


<div class="advData">

	<div class="advDataPair">
		<label><?=lang("Generation", "النسل"); ?></label>
		<span><?=lang("Generation", "النسل"); ?></span>
	</div>

	<div class="advDataPair">
		<label><?=lang("Type", "النوع"); ?></label>
		<span><?=lang("Type", "النوع"); ?></span>
	</div>
	

	<div class="advDataPair">
		<label><?=lang("Color", "اللون"); ?></label>
		<span><?=lang("Color", "اللون"); ?></span>
	</div>
	

	<div class="advDataPair">
		<label><?=lang("Gender", "الجنس"); ?></label>
		<span><?=lang("Gender", "الجنس"); ?></span>
	</div>
	

	<div class="advDataPair">
		<label><?=lang("Age", "العمر"); ?></label>
		<span><?=lang("Age", "العمر"); ?></span>
	</div>
	

	<div class="advDataPair">
		<label><?=lang("Speciality", "التخصص"); ?></label>
		<span><?=lang("Speciality", "التخصص"); ?></span>
	</div>
	

	<div class="advDataPair">
		<label><?=lang("Relative", "النسب"); ?></label>
		<span><?=lang("Relative", "النسب"); ?></span>
	</div>
	
	
	<div class="advDataPair">
		<label><?=lang("Location", "الموقع"); ?></label>
		<span><?=lang("Location", "الموقع"); ?></span>
	</div>
	
	
	<div class="advDataPair">
		<label><?=lang("Country", "الإمارة"); ?></label>
		<span><?=lang("Country", "الإمارة"); ?></span>
	</div>
	
	
	<div class="advDataPair">
		<label><?=lang("Description", "الوصف"); ?></label>
		<span><?=lang("Description", "الوصف"); ?></span>
	</div>
	
	
</div>







<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>