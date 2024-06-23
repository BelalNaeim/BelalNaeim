

<?php
if( $hasProducts == true ){
?>
<hr class="hr">
<h1 class="sectionTitle"><?=lang("Relevant Products", "منتجات مشابهة"); ?></h1>



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





<?php
}
?>
















</article>
<!-- ARTICLE END -->

<footer>
	
	<div class="footerCol">
		<div class="socials">

<?php
	$qu_socials_sel = "SELECT * FROM  `socials`";
	$qu_socials_EXE = mysqli_query($KONN, $qu_socials_sel);
	if(mysqli_num_rows($qu_socials_EXE)){
		while($socials_REC = mysqli_fetch_assoc($qu_socials_EXE)){
			$social_id = $socials_REC['social_id'];
			$social_title = $socials_REC['social_title'];
			$social_link = $socials_REC['social_link'];
			$social_icon = $socials_REC['social_icon'];
			$social_image = $socials_REC['social_image'];
		?>
<a target="_blank" href="<?=$social_link; ?>" title="<?=$social_title; ?>" ><i class="<?=$social_icon; ?>"></i></a>
		<?php
		}
	}
?>
		</div>
	</div>
	
	
	
	
	<div class="footerCol footerMidCol">
		<div class="footerNav">
		
			<a target="_blank" href="https://api.whatsapp.com/send?phone=971526100080&text=%D8%A3%D8%B1%D9%8A%D8%AF%20%D8%A7%D9%84%D8%A7%D8%B3%D8%AA%D9%81%D8%B3%D8%A7%D8%B1%20%D8%A8%D8%AE%D8%B5%D9%88%D8%B5%20%D8%AE%D8%AF%D9%85%D8%A7%D8%AA%20%D9%87%D9%88%D8%B1%D8%B3%20%D9%87%D8%A8%20I%20want%20to%20ask%20regards%20Horsehub%20service%20" class="footerIconer">
				<i class="far fa-question-circle"></i>
				<span><?=lang("Help", "المساعدة"); ?></span>
			</a>
			
			<a href="privacy.php" class="footerIconer">
				<i class="fas fa-shield-alt"></i>
				<span><?=lang("Privacy Policy", "سياسة الخصوصية"); ?></span>
			</a>
			
			<a href="about.php" class="footerIconer">
				<i class="fas fa-info-circle"></i>
				<span><?=lang("About", "عن هورس هب"); ?></span>
			</a>
			
			
		</div>
	</div>
	
	
	
	
	<div class="footerCol">
		<a href="#" class="logoWhite">
			<img src="uploads/logo_w.png" alt="HH logo" />
		</a>
	</div>
	
	
</footer>

<style>

.form-alerts {
	width: 100%;
	margin: 0 auto;
}
.form-alerts span {
	display: block;
	width: 90%;
	margin: 1% auto;
	padding: 1.3%;
	background: var(--bs-info);
	text-align: start;
	cursor:pointer;
}
.form-alerts span i,
.form-alerts span p {
	display: inline-block;
	vertical-align: middle;
}
.inputHasError {
	border-color: red !important;
	border-width: 2px !important;
}
.dataFormGroup label span {
	color: red !important;
	margin: 0 1%;
}
</style>
<!-- datepicker css -->
<script src="assets/js/form_submissions.js"></script>
<script type="text/javascript" src="assets/js/jquery_datepicker.js"></script>
<link type="text/css" rel="stylesheet" href="assets/js/jquery_datepicker.css" >

<!-- datepicker css -->
<script type="text/javascript" src="assets/js/jquery_datepicker.js"></script>
<link type="text/css" rel="stylesheet" href="assets/js/jquery_datepicker.css" >

<!-- timePicker css -->
<link rel="stylesheet" href="assets/js/jquery.timepicker.min.css">
<script src="assets/js/jquery.timepicker.min.js"></script>

<script>

function do_slide_effects(){
	
	
	var HH = parseInt( $('header').css('height') );
	var header_h = $('header').height();
		var topper = parseInt($(document).scrollTop());
		//var hh = parseInt( header_h / 4 );
		if(topper >= HH){
			$('header').addClass('headerScrolled');
			//$('header .logoContainer img').attr('src', 'uploads/logo_scrolled.png');
		} else {
			$('header').removeClass('headerScrolled');
			//$('header .logoContainer img').attr('src', 'uploads/logo.png');
		}
		
		
	
	
	
}



$(document).on('scroll', function(){ do_slide_effects(); });



function do_date_picker(){
	$(".has_date").datepicker({
	  dateFormat: "yy-mm-dd",
	  changeYear: true, 
	  changeMonth: true, 
	  yearRange: "<?=date('Y'); ?>:<?=date('Y') + 5; ?>"
	});
	$(".has_long_date").datepicker({
	  dateFormat: "yy-mm-dd",
	  changeYear: true, 
	  changeMonth: true, 
	  yearRange: "<?=date('Y')-90; ?>:<?=date('Y'); ?>"
	});
}



function do_time_picker(){

	$('.has_time').timepicker({
		timeFormat: 'h:mm p',
		interval: 30,
		minTime: '10',
		maxTime: '14:00',
		defaultTime: '08',
		startTime: '08:00',
		dynamic: false,
		dropdown: true,
		scrollbar: true
	});


}


do_date_picker();
do_time_picker();
</script>




<?php
mysqli_close($KONN);
?>