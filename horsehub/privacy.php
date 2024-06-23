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
 
 
<h1 class="pageMainTitle"><?=lang("Privacy Policy", "سياسة الخصوصية"); ?></h1>


<div class="row" style="width: 80%;">
	<div class="col-1">
		<?=printer($SETTINGS['website_privacy'.$lang_db]); ?>
	</div>
</div>


<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>