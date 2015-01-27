<?php 
$course = CourseData::getById($_GET["course_id"]);
$people = UserCourseData::getAllByCourseId($course->id);
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<h2>Personas</h2>
		<ol class="breadcrumb">
  <li><a href="index,php?view=home">Inicio</a></li>
  <li><a href="index.php?view=admincourse&course_id=<?php echo $course->id; ?>"><?php echo $course->name; ?></a></li>
  <li class="active">PERSONAS</li>
</ol>
		<hr>

<?php if(count($people)>0):?>
<?php foreach($people as $p):
$px = $p->getUser();
?>
<h4><?php echo $px->name." ".$px->lastname;?></h4>
<a href=""><i class="fa fa-envelope-o"> Enviar mensaje</i></a>
<?php endforeach ; ?>
<?php endif; ?>

		</div>
	</div>
</div>