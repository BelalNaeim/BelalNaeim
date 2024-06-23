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


<h1 class="pageMainTitle"><?=lang("Subscribe", "الاشتراك"); ?></h1>




<div class="pageCols">
    <div class="stageCol">
        <div class="stageContainer">

            <div class="stage selectedStage">
                <div class="stageIcon">
                    <i class="fas fa-check"></i>
                    <i class="fas fa-circle"></i>
                </div>
                <span class="stageName"><?=lang("Subscripiton Type", "نوع الاشتراك"); ?></span>
            </div>

            <div class="stage">
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
        <form method="POST" action="register02.php" class="row">
            <!--div class="col-1">
				<div class="formGroup">
					<label><?=lang("Please Fill in the following details", "ادخل المعلومات التالية"); ?></label>
				</div>
			</div-->


            <div class="col-1">
                <div class="formGroup">
                    <label><input type="checkbox" name="sups[]" id="ss"><?=lang("Subscription for contracting and construction", "اشتراكات  مقاولات والبناء"); ?></label>
                </div>
            </div>

            <div class="col-1">
                <div class="formGroup">
                    <label><input type="checkbox" name="sups[]" id="ss"><?=lang("Subscribe to horse equipment", " اشتراكات عتاد الخيل"); ?></label>
                </div>
            </div>

            <div class="col-1">
                <div class="formGroup">
                    <label><input type="checkbox" name=sups[]" id="ss"><?=lang("veterinarian subscription", " اشتراكات البيطري"); ?></label>
                </div>
            </div>

            <div class="col-1">
                <div class="formGroup">
                    <label><input type="checkbox" name="sups[]" id="ss"><?=lang("Pharmacy and clinic subscription", "اشتراكات الصيدلية والعيادة"); ?></label>
                </div>
            </div>

            <div class="col-1">
                <div class="formGroup">
                    <label><input type="checkbox" name="sups[]" id="ss"><?=lang("Subscribe as a knight", "اشتراكات الفارس"); ?></label>
                </div>
            </div>

            <div class="col-1">
                <div class="formGroup">
                    <label><input type="checkbox" name="sups[]" id="ss"><?=lang("Subscribe to the stable", "اشتراكات الإسطبل"); ?></label>
                </div>
            </div>

            <div class="col-1">
                <div class="formGroup">
                    <label><input type="checkbox" name="sups[]" id="ss"><?=lang("Trainer subscription", "اشتراكات المدرب"); ?></label>
                </div>
            </div>

            <div class="col-1">
                <div class="formGroup">
                    <label><input type="checkbox" name="sups[]" id="ss"><?=lang("carriages subscription", "اشتراكات عربات النقل"); ?></label>
                </div>
            </div>

            <div class="col-1">
                <div class="formGroup">
                    <label><input type="checkbox" name="sups[]" id="ss"><?=lang("Feed and cannabis subscription", "اشتراكات الأعلاف والحشيش"); ?></label>
                </div>
            </div>




            <div class="col-1">
                <div class="formGroup">
                    <br>
                    <br>
                    <br>
                </div>
            </div>

            <div class="col-2">
                <a href="index.php" class="formGroup">
                    <button class="whiterBtn" type="button"><?=lang("Cancel", "إلغاء"); ?></button>
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