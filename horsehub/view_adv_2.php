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

 
 
<h1 class="pageMainTitle"><?=lang("Stables Shows", "عروض إسطبلات"); ?></h1>


<div class="itemPictures">
	<img class="mainImage" src="uploads/h03.jpg" alt="">
	<div class="thumbnails">
		<img class="" src="uploads/h03.jpg" alt="">
		<img class="" src="uploads/h03.jpg" alt="">
		<img class="" src="uploads/h03.jpg" alt="">
		<img class="" src="uploads/h03.jpg" alt="">
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
		<label><?=lang("Type", "النوع"); ?></label>
		<span><?=lang("Sleep In", "ايواء"); ?></span>
	</div>

	<div class="advDataPair">
		<label><?=lang("Booth Type", "نوع الغرف"); ?></label>
		<span><?=lang("Separated", "منفصلة"); ?></span>
	</div>
	
	<div class="advDataPair">
		<label><?=lang("Booth Size", "مساحة الغرفة"); ?></label>
		<span>4*4</span>
	</div>
	
	
	
	
	<div class="advDataPair">
		<label><?=lang("Location", "الموقع"); ?></label>
		<span><?=lang("Location", "الموقع"); ?></span>
	</div>
	
	
	<div class="advDataPair">
		<label><?=lang("Country", "الإمارة"); ?></label>
		<span><?=lang("UAE", "الإمارات"); ?></span>
	</div>
	
	
	<div class="advDataPair">
		<label><?=lang("Total Size", "المساحة"); ?></label>
		<span>2000 <?=lang("Sqm", "متر مربع"); ?></span>
	</div>
	
	
	<div class="advDataPair">
		<label><?=lang("Description", "الوصف"); ?></label>
		<span><?=lang("Description", "الوصف"); ?></span>
	</div>
	
	
	<div class="advDataPair">
		<label><?=lang("Booth Count", "عدد الغرف"); ?></label>
		<span>20</span>
	</div>
	
	
	<div class="advDataPair">
		<label><?=lang("Height", "الإرتفاع"); ?></label>
		<span>4 <?=lang("Meters", "أمتار"); ?></span>
	</div>
	
	
</div>







<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>