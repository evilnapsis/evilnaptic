<?php

$post = Core::$post;
Viewer::addView($post->id,"post_id","post_view");

?>
<?php if($post!=null):
$comments = CommentData::getAllByEntry(1,$post->id);
?>
<div class="container">
<div class="row">
	<div class="col-md-9">
<?php if(isset($_SESSION["user_id"])):
$user = UserData::getById($_SESSION["user_id"]);
?>
<?php if($user->is_admin):?>
    <a class="btn btn-warning pull-right" href="./index.php?view=editpost&post_id=<?php echo $post->id; ?>">Editar articulo</a>
<?php endif; ?>
<?php endif; ?>

<?php if($post->video!=""):?>
  <iframe src="https://youtube.com/embed/<?php echo $post->video; ?>" style="border:0;width:100%;"></iframe>
  <div class="clearfix"></div><br>
<?php endif; ?>


	<h2 class="post-title"><?php echo $post->title; ?></h2>

<?php if($post->image!="" && file_exists("storage/images/$post->image")):?>

    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>
<hr>
<?php endif; ?>

	<blockquote><?php echo $post->brief; ?></blockquote>
	<div><?php echo $post->content; ?></div>
<div class="clearfix"></div>
<a class="twitter-share-button"
  data-show-count="true"
  href="http://evilnapsis.com/p-<?php echo $post->code; ?>">
Tweet
</a>
<div class="fb-like" data-href="http://evilnapsis.com/p-<?php echo $post->code; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
<div class="g-plusone" data-size="medium" data-href="http://evilnapsis.com/p-<?php echo $post->code; ?>"></div>
	<br>
	<p class="text-muted"> <i class="fa fa-th-list"></i>  <?php echo $post->getCat()->name; ?></p>	
<?php
$tags = PostTagData::getAllByPId($post->id);
?>
<?php if(count($tags)>0):?>
	<p class="text-muted"> <i class="fa fa-tags"></i>  
<?php foreach($tags as $t):?>
	<span class="badge"><?php echo $t->name; ?></span>
<?php endforeach; ?>
</p>
	<?php endif; ?>
	<p class="text-muted"> <i class="fa fa-clock-o"></i>  <?php echo $post->created_at; ?></p>
	<hr>
<?php if(count($comments)>0):?>
  <h3>Comentarios (<?php echo count($comments);?>)</h3>
<?php foreach($comments as $c):?>
<blockquote>
<p class="text-muted pull-right" style="font-size:12px;"><?php echo $c->created_at;?></p>
<h4 style="font-size:18px;"><?php echo $c->name; ?></h4>
<p style="font-size:14px;"><?php echo $c->comment; ?></p>
</blockquote>
<?php endforeach; ?>
<?php else:?>
  <p class="alert alert-info">Aun no hay comentarios, se el primero en comentar!</p>
<?php endif;?>
	<h3>Deja un comentario!</h3>

<!-- - - - - - - - - - - -->
<form role="form" method="post" name="myForm" action="./index.php?action=addcomment">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Correo Electronico</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Correo Electronico" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mensaje</label>
    <textarea class="form-control" name="comment" id="exampleInputEmail1" placeholder="Mensaje" rows="5" required></textarea>
  </div>
  <input type="hidden" name="entry_id" value="<?php echo $post->id; ?>">
  <input type="hidden" name="ref_id" value="1">





  <div class="form-group">
    <label for="exampleInputPassword1">Resuelve: <?php echo $_SESSION["num1"]; ?> + <?php echo $_SESSION["num2"]; ?></label>
    <input type="text" name="captcha" class="form-control" id="exampleInputPassword1" placeholder="Resuelve el captcha">
  </div>
<script type="text/javascript">
function validateForm() 
{
 var okSoFar=true
 with (document.myForm)
 {


  var foundAt = email.value.indexOf("@",0)
  if (foundAt < 1 && okSoFar)
  {
    okSoFar = false
    email.focus()
  }

  if (name.value=="" && okSoFar)
  {
    okSoFar=false
    name.focus();
  }

  if (comment.value=="" && okSoFar)
  {
    okSoFar=false
    comment.focus();
  }

      var n1 = parseInt("" + <?php echo $_SESSION["num1"]; ?> + "");
      var n2 = parseInt("" + <?php echo $_SESSION["num2"]; ?> + "");
      var r = n1+n2;
      if((captcha.value==""|| captcha.value== (n1+" + "+n2) || captcha.value!=r) &&okSoFar){
        okSoFar = false;
        alert("Captcha Invalido");
        captcha.focus();
      }


    if (okSoFar==true)  submit();
 }

}
</script>
  <button type="button" onclick="javascript:validateForm()" class="btn btn-default">Enviar Comentario</button>
</form>
<!-- - - - - - - - - - - -->

	</div>
	<div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading">
Top 5
</div>
<div class="panel-body">
	<?php 
	$top = PostViewData::getTop5ByKindId($post->kind_id);
	 ?>
<!-- - - - - - - - - - - - - - - - -->
<?php if(count($top)>0):?>
<?php foreach($top as $p):
$post = $p->getPost();
?>
<div class="row">
<?php if($post->image!="" && file_exists("storage/images/$post->image")):?>
<div class="col-md-4">
    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>
</div>
<?php endif; ?>
<div class="<?php if($post->image!="" && file_exists("storage/images/$post->image")){ echo "col-md-8";}else{ echo "col-md-12"; } ?>">
<h4><a class="post-title" href="./p-<?php echo $post->code; ?>"><?php echo $post->title; ?></a></h4>
<a class="twitter-share-button"
  data-show-count="true"
  href="http://twitter.com"
  data-url="http://evilnapsis.com/p-<?php echo $post->code; ?>">
Tweet
</a>
<div class="g-plusone" data-size="medium" data-href="http://evilnapsis.com/p-<?php echo $post->code; ?>"></div>
</div>
</div>
<hr style="">
<?php endforeach; ?>
<?php endif; ?>
<!-- - - - - - - - - - - - - - - - -->
</div>
</div>

	</div>
</div>
</div>
<?php endif; ?>