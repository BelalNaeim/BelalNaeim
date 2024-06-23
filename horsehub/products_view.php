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
<br><br><br>

<a class="addToCartBtn" href="cart.php">
	<button><?=lang("Add to cart", "اضافة إلى العربة"); ?><i class="fas fa-cart-plus"></i></button>
</a>

<div class="itemPictures">
	<img class="mainImage" src="uploads/pro01.png" alt="">
	<div class="thumbnails">
		<img class="" src="uploads/pro01.png" alt="">
		<img class="" src="uploads/pro01.png" alt="">
		<img class="" src="uploads/pro01.png" alt="">
		<img class="" src="uploads/pro01.png" alt="">
	</div>
</div>

<div class="itemNamer">
	<h1 class="itemName"><?=lang("Helmet", "خوذة"); ?></h1>
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

<div class="itemProperties">
	<div class="itemSizer">
		<h4 class="eleTitle"><?=lang("Size", "المقاس"); ?></h4>
		<div class="size">S</div>
		<div class="size">M</div>
		<div class="size sizeSelected">L</div>
		<div class="size">XL</div>
	</div>
	<div class="itemColorer">
		<h4 class="eleTitle"><?=lang("Color", "اللون"); ?></h4>
		<div class="color" style="background: #020059;"></div>
		<div class="color" style="background: #e30000;"></div>
		<div class="color colorSelected" style="background: #000000;"></div>
	</div>
</div>

<hr class="hr">
<div class="itemDescription">
	<p>
	<?=lang("Product short description", "وصف مختصر للمنتج"); ?>
	</p>
</div>


<br><br><br>


<?php
	$hasProducts = true;
	include("app/footer.php");
?>
</body>
</html>