


<?php



$topics = TopicData::getPublicsByCourseId($_GET["course_id"]);


//$lecture = LectureData::getById($_GET["lecture_id"]);
//$topic = TopicData::getById($lecture->topic_id);
$course = CourseData::getById($_GET["course_id"]);
if($course->user_id!= $_SESSION["user_id"]){
  Core::redir("./");
}// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<div class="container">

  <div class="row">
    <div class="col-md-12">
    <h3><?php echo $course->name; ?> <small>Preguntas</small></h3>
    <ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li><a href="index.php?view=admincourse&course_id=<?php echo $course->id; ?>"><?php echo $course->name; ?></a></li>
  <li class="active">PREGUNTAS</li>

</ol>

<hr>
</div>
</div>
	<div class="row">
		<div class="col-md-12">
<?php 




	?>
<table class="table table-bordered">
<thead>
  <th>Lectura</th>
  <th>Usuario</th>
  <th>Leido</th>
  <th>Entendido</th>
  <th>Calificado</th>
  <th>Calificacion</th>
  <th>Comentario</th>
  <th>Fecha</th>
</thead>

<?php
foreach ($topics as $topic) {
	foreach (LectureData::getPublicsByTopicId($topic->id) as $lecture) {
$questions = LectureFeedbackData::getAllByLectureId($lecture->id);

 foreach($questions as $lf):?>
<tr>
<td><a href="index.php?view=lecturefeedback&lecture_id=<?php echo $lf->lecture_id; ?>"><?php echo $lf->getLecture()->getTopic()->no." ".$lf->getLecture()->getTopic()->name." &gt; ".$lf->getLecture()->title; ?></a> </td>
  <td><?php echo $lf->getUser()->name." ".$lf->getUser()->lastname; ?></td>
      <td><center> <?php if($lf->is_readed){ echo "<i class='fa fa-check-circle'></i>"; }?></center></td>
      <td><center> <?php if($lf->is_understanded){ echo "<i class='fa fa-check-circle'></i>"; }?></center></td>
      <td><center> <?php if($lf->is_calified){ echo "<i class='fa fa-check-circle'></i>"; }?></center></td>
      <td><?php echo $lf->calification; ?></td>
      <td><?php echo $lf->comment; ?></td>
      <td><?php echo $lf->created_at; ?></td>
</tr>
<?php 
endforeach;?>
<?php }
}
?>

</table>

		</div>

</div>
