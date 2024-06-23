<header class="container-fluid">
    <div class="row">
        <div class="jumbotron text-center" style="border-radius: 0px;border-bottom: solid 1px #dadada;">
            <img src="libs/image/tubeAty.png" width="200" />
          <h1>أهلا وسهلاً بكم</h1>
          <p>موقع <?php echo SITENAME;?> يرحب بالجميع ويتمنى لكم قضاء اسعد الاوقات معنا</p>
          <p style="color: #1f88b7;">
              <?php
            if(isset($_GET['cat'])){
                echo "قسم " . $category->getCateNameByLink($_GET['cat']);
            }
        ?>
          </p>
        </div>
    </div>
</header>
