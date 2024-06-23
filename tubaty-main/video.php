<?php require_once 'inc/topHeader.php'; 
$id = $post->checkPostUrl($_GET['v']);
$posts = $post->displayPost("WHERE `id` = '$id'");
foreach ($posts as $postid){
    $postid;
}
$post->updatePostView($postid['id']);

?>

<title><?php echo SITENAME .' - '.$postid['title'] ?></title>

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
          <div class="col-md-8" style="background: #fff; border-radius: 4px; border: solid 1px #ccc; padding: 15px;margin-bottom: 20px;">
              <div>
                  <h3 style="margin: 5px 0 15px 0;background: #F44336;padding: 8px;color: #fff;"><?php echo $postid['title']; ?></h3>
                <iframe width="100%" height="360" src="https://www.youtube.com/embed/<?php echo str_replace("https://www.youtube.com/watch?v=", '',$postid['video']); ?>" frameborder="0" allowfullscreen></iframe>
                <div style="background: #f9f7f7;padding: 8px 2px;border-radius: 4px;border: solid 1px #efecec;">
                    <p class="pull-left" style="padding: 0px 10px;margin-bottom: 0px;"><?php echo $postid['view']; ?> <i class=" glyphicon glyphicon-eye-open"></i></p>
                    <p class="pull-right" style="padding: 0px 10px;margin-bottom: 0px;"><i class="glyphicon glyphicon-list"></i> القسم : <a href="category.php?cat=<?php echo $category->getCateLinkById($postid['category']); ?>"><?php echo $category->getCateNameById($postid['category']); ?></a></p>
                    <div class="clearfix"></div>
                </div>
                <p style="padding: 8px 10px;">
                    <?php echo $postid['desc']; ?>
                </p>
              </div>
              <hr/>
              <?php if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == true):?>
              <form id="addReply" class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-12">
                    <textarea class="form-control" name="comment" id="comment" placeholder="ادخل التعليق على الفيديو"></textarea>
                    <input type="hidden" id="PostID" value="<?php echo $postid['id'] ?>" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" id="addComment" name="addComment" class="btn btn-success pull-left">اضافة التعليق</button>
                    <div id="addResult"></div>
                </div>
              </div>
            </form>
            <div id="commentResult"></div>
            <?php endif; ?>
              
              <?php $comments = $post->getPostreply($postid['id']);
              if($comments !== NULL):
              foreach ($comments as $comment):
              ?>
              
              <div style="margin: 20px 0;">
                  <div style="background: #d2d2d2;padding: 5px;">
                      <div class="pull-right"><p><i class="glyphicon glyphicon-user"></i> <span><?php echo $post->getUserNameById($comment['user_id']); ?></span></p></div>
                      <?php if(isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == TRUE and $_SESSION['user']['id'] == $comment['user_id']): ?>
                      <div class="pull-left"><a id="deleteReply" rel="<?php echo $comment['id'] ?>" data-toggle="tooltip" data-placement="top" title="حذف التعليق"><i class="glyphicon glyphicon-trash" style="color: #f56e6e"></i></a></div>
                      <?php endif; ?>
                      <div class="clearfix"></div>
                      <div style="background: #fff;padding: 4px;border-radius: 4px;border: solid 1px #d0d0d0;"><?php echo $comment['comment']; ?></div>
                  </div>
              </div>
              <?php 
              endforeach;
              else:
              ?>
              <div class="text-center" style="font-weight: bold">لا يوجد اي تعليقات</div>
              <?php
              endif;
              ?>
            
          </div>
          
          <div class="col-md-4">
              <div class="col-md-12" style="background: white;border-radius: 4px;border: solid 1px #ccc;padding-bottom: 8px;">
                  <h4 style="border-bottom: solid 1px #d0d0d0;padding-bottom: 8px;">شاهد ايضاً</h4>
                  
                  <?php $like = $post->LikePost($postid['title'] , $postid['category'] , $postid['id']);
                    foreach ($like as $post):
                  ?>
                  <div style="margin-bottom: 4px;padding: 5px;background: #ecebe9;">
                      <a href="video.php?v=<?php echo $post['link']?>">
                      <img src="libs/uplaod/<?php echo $post['image'] ?>" width="84px" height="64px" />
                      <span><?php echo (mb_strlen($post['title'] , 'utf8') > 30 ? mb_substr($post['title'],0 , 30) . ' ...' : $post['title']) ?></span>
                      </a>
                  </div>
                 <?php endforeach; ?>
              </div>
          </div>
      </article>
  </div>
</main>

<!-- END INDEX MAIN -->
<!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>

<script>
    $("[id = deleteReply]").on("click" , function(){
       var comment = $(this);
       var id = $(this).attr('rel');
       if(confirm("هل انت متأكد من حذفك للتعليق؟")){
           $.ajax({
               url: 'inc/ajax/deleteComment.php',
               type: 'post',
               data: "id="+id,
               success: function(){
                   comment.parent().parent().fadeOut('slow');
               }
           });
       }
    });
    
    $('#addReply').submit(function(){
        var comment = $('#comment').val();
        var Post = $('#PostID').val();
        if(comment == ''){
            alert('الرجاء ادخال التعليق');
            return false;
        }else{
            $.ajax({
               url: 'inc/ajax/addComment.php',
               type: 'post',
               data: "comment="+comment+"&id="+Post,
               beforeSend:function(){
                   $('#addResult').html('<div class="text-center"><img src="libs/image/ajax-loader.gif"/></div>');
               },
               success: function(e){
                   $('#addResult').hide();
                   $('#commentResult').html(e);
               }
           });
           return false;
        }
        return false;
    });
</script>