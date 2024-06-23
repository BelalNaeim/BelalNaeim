<?php
	require_once('bootstrap/app_config.php');
	require_once('bootstrap/check_log_user.php');
	$page_title=$page_description=$page_keywords=$page_author= $SETTINGS['website_name'.$lang_db];
	// $page_title=$page_description=$page_keywords=$page_author= "Site Title";
	$page_id = 100;
	
	
		$is_construction = 0;
		$is_equipments = 0;
		$is_vet = 0;
		$is_phar = 0;
		$is_knight = 0;
		$is_stable = 0;
		$is_trainer = 0;
		
$RES = "";
		
	if( isset($_POST['full_name']) &&
		isset($_POST['user_email']) &&
		isset($_POST['user_phone']) &&
		isset($_POST['user_pass']) && 
		isset($_POST['is_construction']) &&
		isset($_POST['is_equipments']) &&
		isset($_POST['is_vet']) &&
		isset($_POST['is_phar']) &&
		isset($_POST['is_knight']) &&
		isset($_POST['is_stable']) &&
		isset($_POST['is_trainer']) 
		){

		$user_id = 0;
		$full_name = "".test_inputs($_POST['full_name']);
		$user_email = "".test_inputs($_POST['user_email']);
		$user_phone = "".test_inputs($_POST['user_phone']);
		$user_pass = md5( "".test_inputs($_POST['user_pass']) );
		$user_license = "";
		if( isset( $_POST['user_license'] ) ){
			$user_license = "".test_inputs($_POST['user_license']);
		}
		
		
		$is_construction = ( int ) test_inputs($_POST['is_construction']);
		$is_equipments = ( int ) test_inputs($_POST['is_equipments']);
		$is_vet = ( int ) test_inputs($_POST['is_vet']);
		$is_phar = ( int ) test_inputs($_POST['is_phar']);
		$is_knight = ( int ) test_inputs($_POST['is_knight']);
		$is_stable = ( int ) test_inputs($_POST['is_stable']);
		$is_trainer = ( int ) test_inputs($_POST['is_trainer']);
		
		$isPhone = true;
		
		
	$qu_users_sel = "SELECT * FROM  `users` WHERE `user_phone` = '$user_phone'";
	$qu_users_EXE = mysqli_query($KONN, $qu_users_sel);
	if(mysqli_num_rows($qu_users_EXE) > 0){
		$isPhone = false;
	}

		
		
		
		
		
		
		if( $isPhone == true ){
						$qu_users_ins = "INSERT INTO `users` (
								`full_name`, 
								`user_email`, 
								`user_phone`, 
								`user_pass`, 
								`user_license`, 
								`is_construction`, 
								`is_equipments`, 
								`is_vet`, 
								`is_phar`, 
								`is_knight`, 
								`is_stable`, 
								`is_trainer` 
							) VALUES (
								'".$full_name."', 
								'".$user_email."', 
								'".$user_phone."', 
								'".$user_pass."', 
								'".$user_license."', 
								'".$is_construction."', 
								'".$is_equipments."', 
								'".$is_vet."', 
								'".$is_phar."', 
								'".$is_knight."', 
								'".$is_stable."', 
								'".$is_trainer."' 
							);";

			if(mysqli_query($KONN, $qu_users_ins)){
				$user_id = mysqli_insert_id($KONN);
				if( $user_id != 0 ){
					header("location:register03.php?added=1");
					die();
				}
			} else {
				$RES = lang("Check Inputs", "خطأ في المدخلات");
			}

		} else {
			$RES = lang("Phone Number already registered", "رقم الهاتف مسجل");
		}

	}

		
		
		
		
		
		
		if( isset( $_POST['is_construction'] ) ){
			$is_construction = 1;
		}
		
		if( isset( $_POST['is_equipments'] ) ){
			$is_equipments = 1;
		}
		
		if( isset( $_POST['is_vet'] ) ){
			$is_vet = 1;
		}
		
		if( isset( $_POST['is_phar'] ) ){
			$is_phar = 1;
		}
		
		if( isset( $_POST['is_knight'] ) ){
			$is_knight = 1;
		}
		
		if( isset( $_POST['is_stable'] ) ){
			$is_stable = 1;
		}
		
		if( isset( $_POST['is_trainer'] ) ){
			$is_trainer = 1;
		}
		
		
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
 
 
<h1 class="pageMainTitle"><?=lang("Subscribe", "الاشتراك"); ?></h1>




<div class="pageCols">
	<div class="stageCol">
		<div class="stageContainer">
			
			<div class="stage ">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Subscripiton Type", "نوع الاشتراك"); ?></span>
			</div>
			
			<div class="stage selectedStage">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("User Information", "معلومات عامة"); ?></span>
			</div>

            <div class="stage">
                <div class="stageIcon">
                    <i class="fas fa-check"></i>
                    <i class="fas fa-circle"></i>
                </div>
                <span class="stageName"><?=lang("Payment Process", "عملية الدفع"); ?></span>
            </div>
			
			<div class="stage">
				<div class="stageIcon">
					<i class="fas fa-check"></i>
					<i class="fas fa-circle"></i>
				</div>
				<span class="stageName"><?=lang("Confirmation", "التأكيد"); ?></span>
			</div>
			
		</div>
	</div>
	<div class="sepCol"></div>
	<div class="detailCol">
		<form method="POST" class="row" action="payment.php">
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Please Fill in the following details", "ادخل المعلومات التالية"); ?></label>
				</div>
			</div>
			
			<div class="col-1">
				<div class="formGroup">
					<label style="color:red;"><?=$RES; ?></label>
				</div>
			</div>
		
			<input type="hidden" name="is_construction" value="<?=$is_construction; ?>" required>
			<input type="hidden" name="is_equipments" value="<?=$is_equipments; ?>" required>
			<input type="hidden" name="is_vet" value="<?=$is_vet; ?>" required>
			<input type="hidden" name="is_phar" value="<?=$is_phar; ?>" required>
			<input type="hidden" name="is_knight" value="<?=$is_knight; ?>" required>
			<input type="hidden" name="is_stable" value="<?=$is_stable; ?>" required>
			<input type="hidden" name="is_trainer" value="<?=$is_trainer; ?>" required>
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Full Name", "الاسم الكامل"); ?><span>( <?=lang("required", "مطلوب"); ?> )</span></label>
					<input type="text" name="full_name" id="full_name" required>
				</div>
			</div>
			
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Email", "البريد الإلكتروني"); ?><span>( <?=lang("required", "مطلوب"); ?> )</span></label>
					<input type="email" name="user_email" id="user_email" required>
				</div>
			</div>
			
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Phone NO.", "رقم الهاتف"); ?><span>( <?=lang("required", "مطلوب"); ?> )</span></label>
					<input type="text" name="user_phone" id="user_phone" required>
				</div>
			</div>
			
			
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("Password", "كلمة المرور"); ?><span>( <?=lang("required", "مطلوب"); ?> )</span></label>
					<input type="password" name="user_pass" id="user_pass" required>
				</div>
			</div>
			
			<div class="col-1">
				<div class="formGroup">
					<label><?=lang("License", "الرخصة او العضوية"); ?></label>
					<input type="text" name="user_license" id="user_license">
				</div>
			</div>

            <div class="col-1">
                <div class="formGroup">
                    <label><?=lang("supscription type", "نوع العضوية"); ?></label>
                    <select name="sup_type" id="">
                        <?php
                        $result = "SELECT type_name
                        FROM subscriptions_plans_types
                        INNER JOIN subscriptions_plans
                        ON subscriptions_plans.plan_id  = subscriptions_plans_types.plan_id";
                        // be sure do define $connection to be your database connection, or just change it in this code to match your configuration settings
                        $runquery = mysqli_query($KONN,$result);
                        while($row = mysqli_fetch_assoc($runquery)){
                        echo'
                        <option value="$row["id"]">'.$row["type_name"].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
			
			
			
			<div class="col-1">
				<div class="formGroup">
					<br>
					<br>
					<br>
				</div>
			</div>
			<div class="col-1">
				<div class="formGroup">
					<label style="color:red;"><?=$RES; ?></label>
				</div>
			</div>
			
			<div class="col-2">
				<a href="register.php" class="formGroup">
					<button class="whiterBtn" type="button"><?=lang("Previouse", "السابق"); ?></button>
				</a>
			</div>
			
			<div class="col-2">
				<div class="formGroup">
					<button class="blackerBtn" type="submit"><?=lang("Next", "التالي"); ?></button>
				</div>
			</div>
		
		
		
		</form>
	</div>
</div>


<br><br><br>


<?php
	$hasProducts = false;
	include("app/footer.php");
?>
</body>
</html>