<?php
$user=UserData::getById($_SESSION["user_id"]);
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<?php if($user!=null&&$user->is_admin):?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
<div class="list-group">

  <a href="index.php?view=newpost" class="list-group-item"><i class="fa fa-plus"></i> Nuevo articulo</a>
  <a href="index.php?view=newcourse" class="list-group-item"><i class="fa fa-plus"></i> Nuevo curso</a>
  <a href="index.php?view=viewposts" class="list-group-item"><i class="fa fa-th-list"></i> Posts</a>
  <a href="index.php?view=projects" class="list-group-item"><i class="fa fa-th-large"></i> Proyectos</a>
  <a href="index.php?view=opencourses" class="list-group-item"><i class="fa fa-th-large"></i> Cursos</a>
</div>
		</div>
		<div class="col-md-9">

		</div>
		
	</div>

</div>
<?php else:

$courses = UserCourseData::getAllByUserId($_SESSION["user_id"]);
?>
	<div class="container">
	<div class="row">
		<div class="col-md-9">
<?php if(count($courses)>0):?>
<h3>Mis Cursos</h3>
<hr>
<?php foreach($courses as $cx):
$c = $cx->getCourse();	
?>
<h3><a href="index.php?view=opencourse&course_id=<?php echo $c->id; ?>"><?php echo $c->name; ?></a></h3>
<?php echo $c->description; ?>

<?php 
$topics = TopicData::getPublicsByCourseId($c->id);
$l = 0;
$coursed = 0;
foreach ($topics as $topic) {
	foreach (LectureData::getPublicsByTopicId($topic->id) as $lecture) {
		$l++;
		if(LectureFeedbackData::getByLU($lecture->id,$_SESSION["user_id"])){
			$coursed++;
		}

	}
}
if($l>0&&$coursed>0){
$progress = ($coursed/$l)*100;
}else{
	$progress=0;
}
?>
<br><br><div class="progress tip" title="<?php echo $progress; ?>% Completado" style="height:10px;">
  <div class="progress-bar "  role="progressbar" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress; ?>%;">
    <span class="sr-only"><?php echo $progress; ?>% Complete</span>
  </div>
</div>
<hr>
<?php endforeach; ?>
<?php else:?>
	<div class="jumbotron">
	<h2>No estas tomando cursos</h2>
	<p>Empieza buscando tus cursos favoritos.</p>
	</div>
<?php endif; ?>
<br><br><br>
		</div>
		
	</div>

</div>

<?php endif; ?>