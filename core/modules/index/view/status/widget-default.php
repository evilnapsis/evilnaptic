<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
$cnt=0;
$slides = SlideData::getPublics();


$posts = StatusData::getPrincipals();
$tips = PostData::getTipPrincipals();
$topics = CourseData::getPrincipals();

?>

<br>
<div class="container">
	<div class="row">
		<div class="col-md-2">
<?php foreach($tips as $post):?>
<h4><a class="post-title" href="./p-<?php echo $post->code; ?>"><?php echo $post->title; ?></a></h4>
<?php echo $post->brief; ?>
<hr>
<?php endforeach; ?>

		</div>
		<div class="col-md-6">
<?php foreach($posts as $post):?>
<div class="row">
<?php if($post->image!=""):?>
<div class="col-md-3">

    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>

</div>
<?php endif; ?>
<div class="<?php if($post->image!=""){ echo "col-md-9";}else{ echo "col-md-12"; } ?>">
<h3 ><a class="post-title" href="./p-<?php echo $post->code; ?>"><?php echo $post->title; ?></a></h3>
<?php echo $post->brief; ?>
<p class="text-muted"><i class='fa fa-calendar'></i> <?php echo $post->created_at; ?></p>
</div>
</div>
<hr style="">
<?php endforeach; ?>

		</div>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<div class="col-md-4">
    <!-- - - - - - 
<?php foreach($lectures as $post):
?>

<h3 ><a class="post-title" href="./l-<?php echo $post->code; ?>"><?php echo $post->title; ?></a></h3>
<?php echo  substr($post->content, 0,100); ?>... <a href="./l-<?php echo $post->code; ?>">Leer mas</a>
<hr style="">
<?php endforeach; ?>
-->
    <!-- - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - -->
 <div class="panel panel-primary"> 
 <div class="panel-heading"><i class="fa fa-star"></i> SERIES</div>
<div class="panel-body">
<?php if(count($topics)>0):?>
<?php foreach($topics as $topic):?>
    <h4><a class="extra-title" href="./x-<?php echo $topic->code; ?>"><?php echo $topic->name; ?></a></h4>
    <p class="text-muted"><i class="fa fa-th-list"></i> <?php echo $topic->getKind2()->name; ?></p>
<hr>
<?php endforeach; ?>

<?php endif; ?>
</div>
</div>

		</div>
	</div>
<!-- The tag section -->
<div class="row">
<div class="col-md-12">
<?php
$tags = PostTagData::getPrincipals();
?>
<?php if(count($tags)>0):?>
<h2 class="sub-title">Etiquetas</h2>
<hr>
<?php foreach($tags as $tag): ?>
  <a href="javascript:void();" class="btn btn-default"><i class="fa fa-tag"></i> <?php echo $tag->name; ?></a>
<?php endforeach; ?>
<?php endif; ?>
</div>
</div>
</div>
