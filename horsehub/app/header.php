<?php
$nw_langA = '';
switch($lang){
	case 'en':
		$nw_langA = 'ar';
		break;
	case 'ar':
		$nw_langA = 'en';
		break;
}

/*

	<div class="langer">
<?php
	if( $lang == 'ar' ){
?>
		<a href="<?=basename($_SERVER['PHP_SELF']); ?>?nw_lang=en"><img src="uploads/en.png" alt="EN" title="English"></a>
<?php
	} else if( $lang == 'en' ){
?>
		<a href="<?=basename($_SERVER['PHP_SELF']); ?>?nw_lang=ar"><img src="uploads/ar.png" alt="AR" title="عربي"></a>
<?php
	}
?>
	</div>
*/

?>
<script>
function start_loader (){
	$('#loader').css('display', 'flex');
}
function set_loader (d){}
function end_loader (){
	$('#loader').css('display', 'none');
}
</script>

<div id="loader" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0,0,0,0.2);z-index: 999;display: none;justify-content: center;align-items: center;">

<img src="uploads/loader.gif">
</div>

<!-- HEADER START -->
<header class="">
	<div class="headerItems">

<?php
	if( $lang == 'ar' ){
?>
		<a class="langer" href="<?=basename($_SERVER['PHP_SELF']); ?>?nw_lang=en">
			<img src="uploads/en.png" alt="EN" title="English">
		</a>
<?php
	} else if( $lang == 'en' ){
?>
		<a class="langer" href="<?=basename($_SERVER['PHP_SELF']); ?>?nw_lang=ar">
			<img src="uploads/ar.png" alt="AR" title="عربي">
		</a>
<?php
	}
?>

<?php
if( $IS_LOGGED == true ){
?>
		<a href="account.php" class="homerBtn">
			<i class="fas fa-user"></i>
		</a>
<?php
} else {
?>
		<a href="index.php" class="homerBtn">
			<i class="fas fa-home"></i>
		</a>
<?php
}
?>

		<a href="cart.php" class="notifierBtn">
			<i class="fas fa-shopping-cart"></i>
		</a>

		<div class="searcher">
			<input type="text" name="q" list="dt_list" placeholder="<?=lang("Search", "بحث"); ?>">
			<i class="fas fa-search"></i>
		</div>
	
	</div>
	
	<a href="index.php" class="logoContainer">
		<img src="uploads/logo_b.png" alt="HH logo" />
	</a>
	
	
	<div class="headerItems02">
		<a href="add_adv.php" class="posterAdvBtn">
			<span><?=lang("Post Ad", "أضف إعلان"); ?></span>
		</a>
<?php
if( $IS_LOGGED == true ){
?>
		<a href="logout.php" class="marketBtn">
			<span><?=lang("Logout", "تسجيل الخروج"); ?></span>
		</a>
<?php
}
?>
		
	</div>
	
	

		<div class="searcherMob mob_only">
			<input type="text" name="q" placeholder="<?=lang("Search", "بحث"); ?>">
			<i class="fas fa-search"></i>
		</div>
</header>
<!-- HEADER END -->

<!-- ARTICLE START -->
<article>
<datalist id="dt_list">
<option><?=lang("Knight", "فارس"); ?></option>
<option><?=lang("Construction And Contracting", "مقاولات وبناء"); ?></option>
<option><?=lang("Clinic And Pharmacy", "العيادة والصيدلية"); ?></option>
<option><?=lang("Trainers", "مدربين"); ?></option>
<option><?=lang("Products", "منتجات الخيل"); ?></option>
<option><?=lang("veterinary", "بيطري"); ?></option>
<option><?=lang("stables", "إسطبلات"); ?></option>
<option><?=lang("horse shows", "عروض الخيل"); ?></option>
<option><?=lang("horse ability", "خيل القدرة"); ?></option>
<option><?=lang("polo horses", "خيل البولو"); ?></option>
<option><?=lang("Flat Race Horse", "خيل الفلات ريس"); ?></option>
<option><?=lang("Pony CC", "خيل البوني سي سي"); ?></option>
<option><?=lang("Jumping", "خيل القفز"); ?></option>
<option><?=lang("Pony Horse", "خيل البوني"); ?></option>
<option><?=lang("Stables Shows", "عروض إسطبلات"); ?></option>
<option><?=lang("Knight Subscriptions", "إشتراكات الفرسان"); ?></option>
<option><?=lang("for accommodation", "للإيواء"); ?></option>
<option><?=lang("for contest", "المسابقات"); ?></option>
<option><?=lang("Trips", "الرحلات"); ?></option>
<option><?=lang("Occasions Rental", "إيجار للمناسبات"); ?></option>
<option><?=lang("Vet Offers", "عروض البيطري"); ?></option>
<option><?=lang("Vet Services", "خدمات البيطري"); ?></option>
<option><?=lang("Helmet", "خوذة"); ?></option>
<option><?=lang("knight shoe", "حذاء فارس"); ?></option>
<option><?=lang("Rain coat", "غطاء مطري"); ?></option>
<option><?=lang("Face Mask", "غطاء وجه"); ?></option>
</datalist>