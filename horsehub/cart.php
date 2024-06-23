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

<a class="addToCartBtn" href="checkout.php">
	<button><?=lang("Checkout", "إتمام الشراء"); ?> ( 300 AED )</button>
</a>


<div class="cartItem">
	<div class="itemNamer">
		<h1 class="itemName"><?=lang("Helmet", "خوذة"); ?></h1>
		
		<div class="itemEva">
			<div class="itemEvaStars">
				<i class="fas fa-star gold"></i>
				<i class="fas fa-star gold"></i>
				<i class="fas fa-star gold"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
			</div>
			<span class="">120 <?=lang("Votes", "تقييم"); ?></span>
		</div>
	</div>


	<div class="itemProperties">
		<div class="itemSizer">
			<h4 class="eleTitle"><?=lang("Size", "المقاس"); ?></h4>
			<div class="size sizeSelected">L</div>
		</div>
		<div class="itemColorer">
			<h4 class="eleTitle"><?=lang("Color", "اللون"); ?></h4>
			<div class="color colorSelected" style="background: #000000;"></div>
		</div>
	</div>

	<div class="itemPictures">
		<img class="mainImage" src="uploads/pro01.png" alt="">
		<span class="itemPrice">100 AED</span>
	</div>

	<div class="cartOptions">
		<span class="itemEdit"><i class="fas fa-marker"></i></span>
		<span class="itemDelete"><i class="far fa-trash-alt"></i></span>
	</div>
</div>


<div class="cartItem">
	<div class="itemNamer">
		<h1 class="itemName"><?=lang("Helmet", "خوذة"); ?></h1>
		
		<div class="itemEva">
			<div class="itemEvaStars">
				<i class="fas fa-star gold"></i>
				<i class="fas fa-star gold"></i>
				<i class="fas fa-star gold"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
			</div>
			<span class="">120 <?=lang("Votes", "تقييم"); ?></span>
		</div>
	</div>


	<div class="itemProperties">
		<div class="itemSizer">
			<h4 class="eleTitle"><?=lang("Size", "المقاس"); ?></h4>
			<div class="size sizeSelected">L</div>
		</div>
		<div class="itemColorer">
			<h4 class="eleTitle"><?=lang("Color", "اللون"); ?></h4>
			<div class="color colorSelected" style="background: #000000;"></div>
		</div>
	</div>

	<div class="itemPictures">
		<img class="mainImage" src="uploads/pro01.png" alt="">
		<span class="itemPrice">100 AED</span>
	</div>

	<div class="cartOptions">
		<span class="itemEdit"><i class="fas fa-marker"></i></span>
		<span class="itemDelete"><i class="far fa-trash-alt"></i></span>
	</div>
</div>


<div class="cartItem">
	<div class="itemNamer">
		<h1 class="itemName"><?=lang("Helmet", "خوذة"); ?></h1>
		
		<div class="itemEva">
			<div class="itemEvaStars">
				<i class="fas fa-star gold"></i>
				<i class="fas fa-star gold"></i>
				<i class="fas fa-star gold"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
			</div>
			<span class="">120 <?=lang("Votes", "تقييم"); ?></span>
		</div>
	</div>


	<div class="itemProperties">
		<div class="itemSizer">
			<h4 class="eleTitle"><?=lang("Size", "المقاس"); ?></h4>
			<div class="size sizeSelected">L</div>
		</div>
		<div class="itemColorer">
			<h4 class="eleTitle"><?=lang("Color", "اللون"); ?></h4>
			<div class="color colorSelected" style="background: #000000;"></div>
		</div>
	</div>

	<div class="itemPictures">
		<img class="mainImage" src="uploads/pro01.png" alt="">
		<span class="itemPrice">100 AED</span>
	</div>

	<div class="cartOptions">
		<span class="itemEdit"><i class="fas fa-marker"></i></span>
		<span class="itemDelete"><i class="far fa-trash-alt"></i></span>
	</div>
</div>


	
	


<br><br><br>


<?php
	$hasProducts = true;
	include("app/footer.php");
?>
</body>
</html>