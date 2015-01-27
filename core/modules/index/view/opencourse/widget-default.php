<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
$course = CourseData::getById($_GET["course_id"]);
if(!$course->is_open){
if(UserCourseData::getByUC($_SESSION["user_id"],$course->id)==null){
  print "<script>alert('No estas inscrito en este curso !!');</script>";  
  Core::redir("index.php?view=takecourse&course_id=".$course->id);
}
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
		<h3><?php echo $course->name; ?></h3>
    <ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li class="active"><?php echo $course->name; ?></li>
</ol>

<hr>
		</div>
		<div class="col-md-3">
<?php if(isset($_SESSION["user_id"])):?>
<h4 class="text-center">Progreso</h4>
<?php 
$topics = TopicData::getPublicsByCourseId($course->id);
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

// print_r($l);

// $progress = 0;
?>
<h1 class="text-center"><?php echo number_format($progress,2,".",","); ?>%</h1>
<div class="progress" style="height:10px;">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress; ?>%;">
    <span class="sr-only"><?php echo $progress; ?>% Complete</span>
  </div>
</div>
<a data-toggle="modal" href="#myModal" >Como Progresar ??</a>
	
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Como progresar</h4>
        </div>
        <div class="modal-body">

<div class="row">
<div class="col-md-7">
	<p>Al final de cada lectura encontraras un recuadro similar al de la derecha.</p>
	<p>El progreso se mide en base a que hallas leido y entendido completamente cada una de las lecturas del curso.</p>
	<p class="alert alert-danger">No marques una lectura como leida y entendida hasta que no hallas finalizado la lectura.</p>
	<p>Si tienes dudas en alguna lectura, recurre a la seccion de preguntas, puedes preguntar o ayudarte de las preguntas que ya estan respondidas.</p>
	<p class="alert alert-info">Si estas completamente convencido con la lectura, entonces, califica la lectura como mas te perezca.</p>
</div>

<div class="col-md-5">
	<img src="res/imgs/feedback.png" class="img-responsive">
</div>
</div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Entendido</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php endif; ?>
		</div>
		</div>

	<div class="row">
		
		<div class="col-md-9">
<div class="panel panel-default">
<div class="panel-heading">Lecciones</div>
<div class="list-group">
<?php foreach(TopicData::getPublicsByCourseId($_GET["course_id"]) as $c):?>
  <a href="index.php?view=opentopic&topic_id=<?php echo $c->id; ?>" class="list-group-item">
    <h4 class="list-group-item-heading"><?php echo $c->no." - ".$c->name; ?></h4>
    <p class="list-group-item-text"><?php echo $c->description; ?>
</p>
  </a>
<?php endforeach; ?>

</div>


</div>

		</div>
		<div class="col-md-3">

<br><br>
<!--
<div class="list-group">

  <a href="#" class="list-group-item"><i class="fa fa-comment"></i> Comentarios</a>
  <a href="#" class="list-group-item"><i class="fa fa-star"></i> Calificaciones</a>
  <a href="#" class="list-group-item"><i class="fa fa-bell-o"></i> Notificaciones</a>
</div>
-->


		</div>
	</div>

</div>
