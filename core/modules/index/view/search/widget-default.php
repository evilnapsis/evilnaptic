<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
$posts = PostData::getPostLike($_GET["q"]);
$tips = PostData::getTipLike($_GET["q"]);
$topics = CourseData::getTopicLike($_GET["q"]);
$howtos = CourseData::getHowToLike($_GET["q"]);
$courses = CourseData::getCourseLike($_GET["q"]);

?>
<div style="background:#f0f0f0;margin-top:-21px;">
<div class="container"><br>
  <div class="row">
    <div class="col-md-12">
    <h2>Evilnapsis HomePage</h2>
    <p>I <i class="fa fa-heart"></i> Build stuffs.</p>
    </div>
</div><br>
</div>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-3">
<h3>Tips</h3>
    <hr>  
<?php foreach($tips as $post):?>
<h3><a class="post-title" href="./index.php?view=post&id=<?php echo $post->id; ?>&kid=<?php echo $post->kind_id; ?>"><?php echo $post->title; ?></a></h3>
<?php echo $post->brief; ?>
<?php endforeach; ?>

    </div>
    <div class="col-md-6">
<!-- - - - - - - - - - - - - - -->
<!--
<div id="carousel-example-generic" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active">
      <img src="imgs/slides/01.png" alt="...">
      <div class="carousel-caption">
        Sistema de encuestas
      </div>
    </div>

  </div>

  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="icon-next"></span>
  </a>
</div>
-->
<!-- - - - - - - - - - - - - - -->
<?php foreach($posts as $post):?>
<div class="row">
<?php if($post->image!=""):?>
<div class="col-md-3">

    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>

</div>
<?php endif; ?>
<div class="<?php if($post->image!=""){ echo "col-md-9";}else{ echo "col-md-12"; } ?>">
<h2 style="margin:0;"><a class="post-title" href="./index.php?view=post&id=<?php echo $post->id; ?>&kid=<?php echo $post->kind_id; ?>&t=<?php echo strtolower( str_replace(" ", "-", $post->title) ); ?>"><?php echo $post->title; ?></a></h2>
<?php echo $post->brief; ?>
</div>
</div>
<hr style="">
<?php endforeach; ?>

    </div>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <div class="col-md-3">
 <div class="box box-one"> 
 <div class="box-title">Cursos y Tutoriales</div>
<div class="box-body">
<?php if(count($topics)>0):?>
<?php foreach($topics as $topic):?>
    <h3><a class="sub-title" href="index.php?view=takecourse&course_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></h3>

    <p class="list-group-item-text"><?php echo $topic->description; ?></p>

<hr>
<?php endforeach; ?>

<?php endif; ?>
<?php if(count($howtos)>0):?>
<h3>Tutoriales</h3>
<hr>
<?php foreach($howtos as $topic):?>
   <h3><a class="sub-title" href="index.php?view=takecourse&course_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></h3>

    <p class="list-group-item-text"><?php echo $topic->description; ?></p>

<hr>
<?php endforeach; ?>

<?php endif; ?>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<?php if(count($courses)>0):?>
<?php foreach($courses as $topic):?>
   <h3><a class="sub-title" href="index.php?view=takecourse&course_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></h3>

    <p class="list-group-item-text"><?php echo $topic->description; ?></p>

<hr>
<?php endforeach; ?>

<?php endif; ?>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
</div>
</div>

    </div>
  </div>

</div>
