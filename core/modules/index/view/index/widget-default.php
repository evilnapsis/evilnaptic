<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
$posts = PostData::getPostPrincipals();
$tips = PostData::getTipPrincipals();
$topics = CourseData::getTopicPrincipals();
$howtos = CourseData::getHowToPrincipals();
$courses = CourseData::getCoursePrincipals();
$lectures = LectureData::get10Publics();

?>
<div style="background:url(imgs/header.jpg) center ; background-size:cover;margin-top:-21px;">
<br><div class="container"><br>
  <div class="row">
    <div class="col-md-12">
    <h2>Evilnapsis HomePage</h2>
    <p>I <i class="fa fa-heart"></i> Build stuffs.</p>
    </div>
</div><br>
</div>
<br></div>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-2">
<?php foreach($tips as $post):?>
<h3><a class="post-title" href="./index.php?view=post&id=<?php echo $post->id; ?>&kid=<?php echo $post->kind_id; ?>"><?php echo $post->title; ?></a></h3>
<?php echo $post->brief; ?>
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
<h3 ><a class="post-title" href="./index.php?view=post&id=<?php echo $post->id; ?>&kid=<?php echo $post->kind_id; ?>&t=<?php echo strtolower( str_replace(" ", "-", $post->title) ); ?>"><?php echo $post->title; ?></a></h3>
<?php echo $post->brief; ?>
</div>
</div>
<hr style="">
<?php endforeach; ?>

		</div>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<div class="col-md-4">
    <!-- - - - - - -->
<?php foreach($lectures as $post):?>
<h3 ><a class="post-title" href="./index.php?view=openlecture&lecture_id=<?php echo $post->lid; ?>"><?php echo $post->title; ?></a></h3>
<?php echo  substr($post->content, 0,100); ?>... <a href="./index.php?view=openlecture&lecture_id=<?php echo $post->lid; ?>">Leer mas</a>
<hr style="">
<?php endforeach; ?>

    <!-- - - - - - -->
 <div class="panel panel-default"> 
 <div class="panel-heading">Temas, Cursos y Tutoriales</div>
<div class="panel-body">
<?php if(count($topics)>0):?>
<?php foreach($topics as $topic):?>
    <h4><a class="extra-title" href="index.php?view=takecourse&course_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></h4>
    <p class="text-muted"><i class="fa fa-th-list"></i> Tema</p>
<hr>
<?php endforeach; ?>

<?php endif; ?>
<?php if(count($howtos)>0):?>
<?php foreach($howtos as $topic):?>
   <h4><a class="extra-title" href="index.php?view=takecourse&course_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></h4>

    <p class="text-muted"><i class="fa fa-th-list"></i> Tutorial</p>

<hr>
<?php endforeach; ?>

<?php endif; ?>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<?php if(count($courses)>0):?>
<?php foreach($courses as $topic):?>
   <h4><a class="extra-title" href="index.php?view=takecourse&course_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></h4>

    <p class="text-muted"><i class="fa fa-th-list"></i> Curso</p>

<hr>
<?php endforeach; ?>

<?php endif; ?>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
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
<?php foreach($tags as $tag): ?>
  <a href="javascript:void();" class="btn btn-default"><i class="fa fa-tag"></i> <?php echo $tag->name; ?></a>
<?php endforeach; ?>
<?php endif; ?>
</div>
</div>
</div>
