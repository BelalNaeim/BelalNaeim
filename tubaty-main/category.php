<?php require_once 'inc/topHeader.php';
    $id = $category->checkCatgoryLink($_GET['cat']);
?>
<title><?php echo $category->getCateNameByLink($_GET['cat']).' - ' . SITENAME;?></title>
<?php require_once 'inc/header.php'; ?>
<!-- NAVBAR START -->
<?php require_once 'inc/navbar.php'; ?>
<!-- NAVBAR END ---->
<!-- HEADER START -->
<?php require_once 'inc/welcome.php'; ?>
<!-- HEADER END --->
<!-- INDEX MAIN -->

<main class="container">
  <div class="row">
      <article class="col-xs-12 col-md-12">
          <?php $posts = $post->displayPost("WHERE `category` = '{$id}' ORDER BY RAND() , `id` DESC LIMIT $start_from , ".PERPAGE."");
          if($posts != null):
            foreach ($posts as $postid):
          ?>
          <div class="col-md-4" style="position: relative;">
              <div style="position: absolute;left: 75px;top: 10px;color: #ffffff;font-size: 12px;background: rgba(0, 0, 0, 0.45);padding: 3px 8px;border-radius: 3px;" data-toggle="tooltip" data-placement="top" title="المشاهدات">
                  <i class="glyphicon glyphicon-eye-open" style="color: #c7c7c7;" ></i> <?php echo $post->viewCount($postid['id']); ?>
              </div>
              <div style="position: absolute;left: 25px;top: 10px;color: #ffffff;font-size: 12px;background: rgba(0, 0, 0, 0.45);padding: 3px 8px;border-radius: 3px;" data-toggle="tooltip" data-placement="top" title="التعليقات">
                  <i class="glyphicon glyphicon-comment" style="color: #d0c358;"></i> <?php echo $post->replyCount($postid['id']); ?>
              </div>
              <div style="padding: 5px;background: #f6f5f7;border: solid 1px #e7e7e7;margin-bottom: 20px;">
                  <img src="libs/uplaod/<?php echo $postid['image'] ?>" class="img-responsive" style="width: 100%;height: 250px;" />
                <h5 style="background: #fff;padding: 5px;text-align: center;margin: 5px 0;font-weight: bold;border: solid 1px #e2e0e4;"><?php echo (mb_strlen($postid['title'] , 'utf8') > 40 ? mb_substr($postid['title'],0,40).' ...' : $postid['title']) ?></h5>
                <a href="category.php?cat=<?php echo $category->getCateLinkById($postid['category']); ?>"><h5 style="background: #607D8B;padding: 5px 12px;text-align: center;margin: 5px 0;border: solid 1px #546f7b;position: absolute;top: 30px;color: #fff;"><?php echo $category->getCateNameById($postid['category'])?></h5></a>
                <p style="background: #fff;padding: 5px;text-align: justify;margin: 5px 0;border: solid 1px #e2e0e4;">
                    <?php echo (mb_strlen($postid['desc'] , 'utf8') > 45 ? mb_substr($postid['desc'],0,45).' ...' : $postid['desc']) ?>
                </p>
                <div class="text-center"><a href="video.php?v=<?php echo $postid['link'] ?>" class="btn btn-danger">شاهد الآن</a></div>
              </div>
          </div>
          <?php endforeach;
          else:
          ?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>عذراً !</strong> ولكن لا يوجد اي فيديوهات بهذا القسم بعد
</div>
<?php endif;?>
<div class="clearfix"          ></div>
<?php $totle = $pagination->totalPage('post', null , PERPAGE);?>
<nav class="text-center">
  <ul class="pagination">
      <?php
          for($i = 1; $i <= $totle; $i++):
      ?>
      <li <?php echo ($i == $page ? 'class="active"' : NULL) ?>><a href="category.php?cat=<?php echo $_GET['cat'] ?>&page=<?php echo $i ?>"><?php echo $i ?> <span class="sr-only">(current)</span></a></li>
      <?php endfor; ?>

  </ul>
</nav>
      </article>
  </div>
</main>

<!-- END INDEX MAIN -->
<!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>
