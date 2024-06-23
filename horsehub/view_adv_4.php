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

 
 
<h1 class="pageMainTitle"><?=lang("Doctor Name", "اسم الطبيب"); ?></h1>


<div class="itemPictures">
	<img class="mainImage" src="uploads/h06.jpg" alt="">
</div>


<div class="itemNamer">
	<h1 class="itemName"><?=lang("Doctor Name", "اسم الطبيب"); ?></h1>
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




<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>