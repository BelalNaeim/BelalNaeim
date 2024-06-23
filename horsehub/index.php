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

<style>
.slider .slideImage {
	transform: scale(1, 1) !important;
}
</style>
<div class="slider">
	<div class="slideImage" id="sliderImg" style="background-image:url('uploads/slider.jpg');"></div>
	<div id="slideTexter" class="slideTexter">
		<h1>
		<?=lang("Horse Hub, we connect you to the world of horses and much more", "هورس هب, محور الخيول, نربطك بعالم الخيل والكثير غيره"); ?>
		
		
		</h1>
		
		<p>
		<?=lang("We work here to provide horse lovers and lovers with everything they need, which is what we focus on throughout our working hours, and this stems from our passion for the world of horses, which extends from the legacy of our ancestors and the value of horses since the past and across civilizations to today.", "نعمل هنا على تزويد محبي وعشاق الخيول بكل ما يحتاجونه وهو ما نركز عليه طوال ساعات عملنا وهذا نابع من شغفنا بعالم الخيل الممتد من إرث أجدادنا وقيمة الخيل منذ الماضي وعبر الحضارات إلى اليوم."); ?>

		
		
		
		
		<?=lang("Horsehub provides all the products and services that horse owners need and facilitates access to them. Horsehub is the best and most distinguished platform in the world of horses.", "يقوم هورس هب بتوفير جميع المنتجات والخدمات التي يحتاجها أصحاب الخيل وتسهيل الحصول عليها حيث تعتبر هورس هب المنصة الأفضل في عالم الخيل والاكثر تميزا."); ?>

		
		
		
		
		</p>
		
		<div class="slideBtns">
		<?php
		
		if( $IS_LOGGED == false ){
		?>
			<a href="register.php" class="posterAdvBtn">
				<span><?=lang("Sign Up", "الاشتراك"); ?></span>
			</a>
			
			<a href="login.php" class="marketBtn">
				<span><?=lang("Sign In", "تسجيل الدخول"); ?></span>
			</a>
		<?php
		} else {
		?>
			<a href="account.php" class="posterAdvBtn">
				<span><?=lang("My Account", "حسابي"); ?></span>
			</a>
		<?php
		}
		?>
		
		</div>
	</div>
</div>
<div style="display:none;">
	<div id="slide-01">
		<span class="imager">uploads/slider.jpg</span>
		<div class="txter">
		
		<h1>
		<?=lang("Horse Hub, we connect you to the world of horses and much more", "هورس هب, محور الخيول, نربطك بعالم الخيل والكثير غيره"); ?>
		
		
		</h1>
		
		<p>
		<?=lang("We work here to provide horse lovers and lovers with everything they need, which is what we focus on throughout our working hours, and this stems from our passion for the world of horses, which extends from the legacy of our ancestors and the value of horses since the past and across civilizations to today.", "نعمل هنا على تزويد محبي وعشاق الخيول بكل ما يحتاجونه وهو ما نركز عليه طوال ساعات عملنا وهذا نابع من شغفنا بعالم الخيل الممتد من إرث أجدادنا وقيمة الخيل منذ الماضي وعبر الحضارات إلى اليوم."); ?>

		
		
		
		
		<?=lang("Horsehub provides all the products and services that horse owners need and facilitates access to them. Horsehub is the best and most distinguished platform in the world of horses.", "يقوم هورس هب بتوفير جميع المنتجات والخدمات التي يحتاجها أصحاب الخيل وتسهيل الحصول عليها حيث تعتبر هورس هب المنصة الأفضل في عالم الخيل والاكثر تميزا."); ?>

		
		
		
		
		</p>

		<div class="slideBtns">
		<?php
		
		if( $IS_LOGGED == false ){
		?>
			<a href="register.php" class="posterAdvBtn">
				<span><?=lang("Sign Up", "الاشتراك"); ?></span>
			</a>
			
			<a href="login.php" class="marketBtn">
				<span><?=lang("Sign In", "تسجيل الدخول"); ?></span>
			</a>
		<?php
		} else {
		?>
			<a href="account.php" class="posterAdvBtn">
				<span><?=lang("My Account", "حسابي"); ?></span>
			</a>
		<?php
		}
		?>
		</div>
		
		</div>
	</div>
	
	
	
	
	
	
	
	<div id="slide-02">
		<span class="imager">uploads/slider02<?=$lang_db; ?>.jpg</span>
		<div class="txter"></div>
	</div>
</div>
<script>


var inverter = 1;
function changeImg(){
	if( inverter == 1 ){
		//change to 2
		inverter = 2;
		var thsImg = $('#slide-02 .imager').text();
		var thsTxt = $('#slide-02 .txter').html();
		
		$('#sliderImg')
        .fadeOut(800, function() {
            $('#sliderImg').css('background-image', "url('" + thsImg + "')");
        })
        .fadeIn(800);
		
		$('#slideTexter')
        .fadeOut(500, function() {
            $('#slideTexter').html(thsTxt);
        })
        .fadeIn(500);
		
		
		
		
	} else {
		//change to 1
		inverter = 1;
		var thsImg = $('#slide-01 .imager').text();
		var thsTxt = $('#slide-01 .txter').html();
		
		$('#sliderImg')
        .fadeOut(800, function() {
            $('#sliderImg').css('background-image', "url('" + thsImg + "')");
        })
        .fadeIn(800);
		
		$('#slideTexter')
        .fadeOut(500, function() {
            $('#slideTexter').html(thsTxt);
        })
        .fadeIn(500);
	}
		
}



setInterval( function(){
	changeImg();
}, 10000 );


</script>

<div class="indexIcons">
	<a href="view_category.php?category_id=7" class="indexIconer">
		<img src="uploads/ico01.png" alt="">
		<h2><?=lang("Knight", "فارس"); ?></h2>
	</a>
	
	<a href="view_category.php?category_id=6" class="indexIconer">
		<img src="uploads/ico02.png" alt="">
		<h2><?=lang("Construction And Contracting", "مقاولات وبناء"); ?></h2>
	</a>
	<a href="view_category.php?category_id=3" class="indexIconer">
		<img src="uploads/ico03.png" alt="">
		<h2><?=lang("Clinic And Pharmacy", "العيادة والصيدلية"); ?></h2>
	</a>
	
	<a href="view_category.php?category_id=5" class="indexIconer">
		<img src="uploads/ico04.png" alt="">
		<h2><?=lang("Trainers", "مدربين"); ?></h2>
	</a>
	<a href="view_category.php?category_id=8" class="indexIconer">
		<img src="uploads/ico05.png" alt="">
		<h2><?=lang("Products", "منتجات الخيل"); ?></h2>
	</a>
	
	<a href="view_category.php?category_id=4" class="indexIconer">
		<img src="uploads/ico06.png" alt="">
		<h2><?=lang("veterinary", "بيطري"); ?></h2>
	</a>
	
	<a href="view_category.php?category_id=2" class="indexIconer">
		<img src="uploads/ico07.png" alt="">
		<h2><?=lang("stables", "إسطبلات"); ?></h2>
	</a>
	
	<a href="view_category.php?category_id=8" class="indexIconer">
		<img src="uploads/ico08.png" alt="">
		<h2><?=lang("Others", "أخرى"); ?></h2>
	</a>
	
	
	
	
</div>



<div class="indexExhibs">
	<div class="exhibition">
		<img src="uploads/ex01.png" alt="">
		<div class="eTexter">
			<a href="view_category.php?category_id=1"><h3><?=lang("horse shows", "عروض الخيل"); ?></h3></a>
		</div>
	</div>
	
	
	<div class="exhibition exInverted">
		<img src="uploads/ex02.png" alt="">
		<div class="eTexter">
			<a href="view_category.php?category_id=2"><h3><?=lang("Stables Shows", "عروض إسطبلات"); ?></h3></a>
		</div>
	</div>
	
	 
	<div class="exhibition">
		<img src="uploads/ex03.png" alt="">
		<div class="eTexter">
			<a href="view_category.php?category_id=4"><h3><?=lang("Vet Offers", "عروض البيطري"); ?></h3></a>
		</div>
	</div>
	
	
	
</div>





<div class="productsViewer">

	<div class="product">
		<a href="products_view.php">
			<img src="uploads/pro01.png" alt="">
			<h1 class="productName"><?=lang("Helmet", "خوذة"); ?></h1>
			<p class="description"><?=lang("Product short description", "وصف مختصر للمنتج"); ?></p>
		</a>
		<span class="price">100 AED</span>
		<a href="cart.php">
			<button><?=lang("Add to cart", "اضافة إلى العربة"); ?><i class="fas fa-cart-plus"></i></button>
		</a>
	</div>
	
	
	<div class="product">
		<a href="products_view.php">
			<img src="uploads/pro02.png" alt="">
			<h1 class="productName"><?=lang("knight shoe", "حذاء فارس"); ?></h1>
			<p class="description"><?=lang("Product short description", "وصف مختصر للمنتج"); ?></p>
		</a>
		<span class="price">100 AED</span>
		<a href="cart.php">
			<button><?=lang("Add to cart", "اضافة إلى العربة"); ?><i class="fas fa-cart-plus"></i></button>
		</a>
	</div>
	
	
	<div class="product">
		<a href="products_view.php">
			<img src="uploads/pro03.png" alt="">
			<h1 class="productName"><?=lang("Rain coat", "غطاء مطري"); ?></h1>
			<p class="description"><?=lang("Product short description", "وصف مختصر للمنتج"); ?></p>
		</a>
		<span class="price">100 AED</span>
		<a href="cart.php">
			<button><?=lang("Add to cart", "اضافة إلى العربة"); ?><i class="fas fa-cart-plus"></i></button>
		</a>
		</div>
	
	
	<div class="product">
		<a href="products_view.php">
			<img src="uploads/pro04.png" alt="">
			<h1 class="productName"><?=lang("Face Mask", "غطاء وجه"); ?></h1>
			<p class="description"><?=lang("Product short description", "وصف مختصر للمنتج"); ?></p>
		</a>
		<span class="price">100 AED</span>
		<a href="cart.php">
			<button><?=lang("Add to cart", "اضافة إلى العربة"); ?><i class="fas fa-cart-plus"></i></button>
		</a>
	</div>
	
	
	<a href="#" class="productNavBtn">
		<?=lang("See All", "رؤية الكل"); ?>
	</a>
	
</div>




<hr class="hr">
<h1 class="sectionTitle"><?=lang("Latest Ads", "أحدث الإعلانات"); ?></h1>



<div class="productListView">


<?php
	$qu_users_ads_sel = "SELECT * FROM  `users_ads` WHERE ( (`ad_status` = 'published') ) ORDER BY `ad_id` DESC LIMIT 5";
	$qu_users_ads_EXE = mysqli_query($KONN, $qu_users_ads_sel);
	if(mysqli_num_rows($qu_users_ads_EXE)){
		while($users_ads_REC = mysqli_fetch_assoc($qu_users_ads_EXE)){
			
			
			
	$thsUserfull_name = "";
	$thsUserId = ( int ) $users_ads_REC['user_id'];
		$qu_users_sel = "SELECT `full_name` FROM  `users` WHERE `user_id` = ".$thsUserId;
		$qu_users_EXE = mysqli_query($KONN, $qu_users_sel);
		if(mysqli_num_rows($qu_users_EXE)){
			$users_DATA = mysqli_fetch_assoc($qu_users_EXE);
			$thsUserfull_name = $users_DATA['full_name'];
		}
		
		
	$ad_id = ( int ) $users_ads_REC['ad_id'];
	$ad_location = $users_ads_REC['ad_location'];
	$ad_location_ar = $users_ads_REC['ad_location_ar'];
	$ad_price = ( double ) $users_ads_REC['ad_price'];
	$ad_discount = ( double ) $users_ads_REC['ad_discount'];
	$ad_date = $users_ads_REC['ad_date'];
	$ad_views = ( int ) $users_ads_REC['ad_views'];
	$sub_id = ( int ) $users_ads_REC['sub_id'];
	$category_id = ( int ) $users_ads_REC['category_id'];
	$user_id = ( int ) $users_ads_REC['user_id'];
	$ad_status = $users_ads_REC['ad_status'];
	$is_translated = ( int ) $users_ads_REC['is_translated'];
			
	$qu_users_ads_pictures_sel = "SELECT * FROM  `users_ads_pictures` WHERE ((`ad_id` = $ad_id) AND (`is_primary` = 1))";
	$qu_users_ads_pictures_EXE = mysqli_query($KONN, $qu_users_ads_pictures_sel);
	$mainImge = "logo_b.png";
	if(mysqli_num_rows($qu_users_ads_pictures_EXE)){
		$users_ads_pictures_DATA = mysqli_fetch_assoc($qu_users_ads_pictures_EXE);
		$mainImge = $users_ads_pictures_DATA['picture_path'];
	}
	
	
	
	
	
	$qu_ads_subs_forms_sel = "SELECT `form_id` FROM  `ads_subs_forms` WHERE ((`form_request` = 'ad_title') AND (`sub_id` = $sub_id))";
	$qu_ads_subs_forms_EXE = mysqli_query($KONN, $qu_ads_subs_forms_sel);
	$form_id = 0;
	if(mysqli_num_rows($qu_ads_subs_forms_EXE)){
		$ads_subs_forms_DATA = mysqli_fetch_assoc($qu_ads_subs_forms_EXE);
		$form_id = ( int ) $ads_subs_forms_DATA['form_id'];
	}
	
	
	$is_ar = 0;
	if( $is_translated == 1 ){
		if( $lang_db == "_ar" ){
			$is_ar = 1;
		}
	}
	
	
	$qu_users_ads_data_sel = "SELECT `data_value` FROM  `users_ads_data` WHERE ((`form_id` = $form_id) AND (`is_ar` = $is_ar) AND (`ad_id` = $ad_id))";
	$qu_users_ads_data_EXE = mysqli_query($KONN, $qu_users_ads_data_sel);
	$adMainTitle = "";
	if(mysqli_num_rows($qu_users_ads_data_EXE)){
		$users_ads_data_DATA = mysqli_fetch_assoc($qu_users_ads_data_EXE);
		$adMainTitle = $users_ads_data_DATA['data_value'];
	}

	

		$qu_ads_categories_sel = "SELECT * FROM  `ads_categories` WHERE `category_id` = ".$category_id;
		$qu_ads_categories_EXE = mysqli_query($KONN, $qu_ads_categories_sel);
		$category_name = "";
		if(mysqli_num_rows($qu_ads_categories_EXE)){
			$ads_categories_DATA = mysqli_fetch_assoc($qu_ads_categories_EXE);
			$category_name = $ads_categories_DATA['category_name'.$lang_db];
		}
		
		$qu_ads_subs_sel = "SELECT * FROM  `ads_subs` WHERE `sub_id` = ".$sub_id;
		$qu_ads_subs_EXE = mysqli_query($KONN, $qu_ads_subs_sel);
		$sub_name = "";
		if(mysqli_num_rows($qu_ads_subs_EXE)){
			$ads_subs_DATA = mysqli_fetch_assoc($qu_ads_subs_EXE);
			$sub_name = $ads_subs_DATA['sub_name'.$lang_db];
		}
			
			
			
?>
	<a href="view_ad.php?ad_id=<?=$ad_id; ?>" class="producter">
		<div class="producterInfo">
			<img src="uploads/<?=$mainImge; ?>" alt="">
			<div class="producterTexter">
				<span class="mainTitler"><?=$thsUserfull_name; ?></span>
<?php
if( $adMainTitle != "" ){
?>
				<span class="mainTitler"><?=$adMainTitle; ?></span>
<?php
}
?>

			</div>
		
			
		</div>
		<div class="producterData">
						<div class="producterDataPair">
							<label><?=lang("Date", "التاريخ"); ?></label>
							<span><?=$ad_date; ?></span>
						</div>
					
						<div class="producterDataPair">
							<label><?=lang("Price", "السعر"); ?></label>
							<span><?=$ad_price; ?> AED</span>
						</div>
		
			<div class="producterDataPair">
				<label><?=lang("Adv NO.", "رقم الإعلان"); ?></label>
				<span>00<?=$ad_id; ?></span>
			</div>
		
			<div class="producterDataPair">
				<label><?=lang("Views", "المشاهدات"); ?></label>
				<span><?=$ad_views; ?></span>
			</div>
			
		</div>
	</a>
	
<?php
		}
	}
?>












<a href="view_adv.php?adv_id=1" class="producter">
		<div class="producterInfo">
			<img src="uploads/h01.jpg" alt="">
			<div class="producterTexter">
				<span class="mainTitler"><?=lang("Type", "النوع"); ?></span>
				<span class="mainTitler"><?=lang("Speciality", "التخصص"); ?></span>
				<span class="mainTitler"><?=lang("Age", "العمر"); ?></span>
				<span class="mainTitler"><?=lang("Country", "الإمارة"); ?></span>
				
			</div>
			
		</div>
		<div class="producterData">
						<div class="producterDataPair">
							<label><?=lang("Date", "التاريخ"); ?></label>
							<span>2022-11-11</span>
						</div>
					
						<div class="producterDataPair">
							<label><?=lang("Price", "السعر"); ?></label>
							<span>100 AED</span>
						</div>
		
			<div class="producterDataPair">
				<label><?=lang("Ad No.", "رقم الإعلان"); ?></label>
				<span>123456</span>
			</div>
		
			<div class="producterDataPair">
				<label><?=lang("Views", "المشاهدات"); ?></label>
				<span>413</span>
			</div>
			
		</div>
	</a>
	
	
	
<a href="view_adv.php?adv_id=2" class="producter">
		<div class="producterInfo">
			<img src="uploads/h03.jpg" alt="">
			<div class="producterTexter">
				<span class="mainTitler"><?=lang("Advertiser", "المعلن"); ?></span>
				<span class="mainTitler"><?=lang("Rental", "ايجار"); ?></span>
				<span class="mainTitler"><?=lang("Booth Count", "عدد الغرف"); ?></span>
				<span class="mainTitler"><?=lang("Country", "الإمارة"); ?></span>
				
			</div>
		
		</div>
		<div class="producterData">
		
						<div class="producterDataPair">
							<label><?=lang("Date", "التاريخ"); ?></label>
							<span>2022-11-11</span>
						</div>
					
						<div class="producterDataPair">
							<label><?=lang("Price", "السعر"); ?></label>
							<span>100 AED</span>
						</div>
			<div class="producterDataPair">
				<label><?=lang("Ad No.", "رقم الإعلان"); ?></label>
				<span>123456</span>
			</div>
		
			<div class="producterDataPair">
				<label><?=lang("Views", "المشاهدات"); ?></label>
				<span>413</span>
			</div>
			
		</div>
	</a>
	
	
	<a href="view_adv.php?adv_id=3" class="producter">
		<div class="producterInfo">
			<img src="uploads/h04.jpg" alt="">
			<div class="producterTexter">
				<span class="mainTitler"><?=lang("Pharmacy Name", "اسم الصيدلية"); ?></span>
				<span class="mainTitler"><?=lang("Address", "العنوان"); ?></span>
				
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
			</div>
		</div>
		
	</a>
	
	
	
	<a href="register.php" class="producter producterHolder">
		<span>+<br><?=lang("Post Your Ad", "أضف إعلانك هنا"); ?></span>
	</a>
	
	
	
	
</div>

<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>