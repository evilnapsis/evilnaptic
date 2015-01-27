<?php
$lecture = LectureData::getById($_GET["lecture_id"]);
$topic = TopicData::getById($lecture->topic_id);
$course = CourseData::getById($topic->course_id);
$questions = QuestionData::getAllByLectureId($_GET["lecture_id"]);
if($course->user_id!= $_SESSION["user_id"]){
  Core::redir("./");
}// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<div class="container">

  <div class="row">
    <div class="col-md-12">
    <h3><?php echo $lecture->title; ?> <small>Preguntas</small></h3>
    <ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li><a href="index.php?view=admincourse&course_id=<?php echo $course->id; ?>"><?php echo $course->name; ?></a></li>
  <li><a href="index.php?view=admintopic&topic_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></li>
  <li class=""><a><?php echo $lecture->title;?></a></li>
  <li class="active">PREGUNTAS</li>

</ol>

<hr>
</div>
</div>
	<div class="row">
		<div class="col-md-12">
<?php if(count($questions)>0):?>
<table class="table table-bordered">
<thead>
  <th>Leido</th>
  <th>Usuario</th>
  <th>Pregunta</th>
  <th>Respuesta</th>
  <th>Publico</th>
  <th>Fecha</th>
  <th></th>
</thead>

<?php foreach($questions as $lf):?>
<tr>
<form method="post" action="index.php?action=makeanswer">
      <td><center><?php if($lf->is_readed):?><i class="fa fa-check-circle"></i><?php else:?><i class="fa fa-remove-circle"></i><?php endif; ?></center></td>
  <td><?php echo $lf->getUser()->name." ".$lf->getUser()->lastname; ?></td>
      <td><?php echo $lf->question; ?></td>
      <td><textarea class="form-control" name="answer"><?php echo $lf->answer;?></textarea></td>
      <td><center><input type="checkbox" name="is_public" <?php if($lf->is_public){ echo "checked"; }?>></center></td>
      <td><?php echo $lf->created_at; ?></td>
      <td><input type="hidden" name="question_id" value="<?php echo $lf->id; ?>"><input type="submit" class="btn btn-success" value="Actualizar"></td>
</form>
</tr>
<?php 
$lf->read();
endforeach;?>
</table>
<?php else:?>
  <div class="jumbotron">
  <h2>No hay preguntas</h2>
  </div>
<?php endif; ?>
		</div>

</div>
