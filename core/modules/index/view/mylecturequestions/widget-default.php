<?php
$lecture = LectureData::getById($_GET["lecture_id"]);
$topic = TopicData::getById($lecture->topic_id);
$course = CourseData::getById($topic->course_id);
$questions = QuestionData::getAllByLectureId($_GET["lecture_id"]);
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<div class="container">

  <div class="row">
    <div class="col-md-12">
    <h3><?php echo $lecture->title; ?> <small>Preguntas</small></h3>
    <ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li><a href="index.php?view=opencourse&course_id=<?php echo $course->id; ?>"><?php echo $course->name; ?></a></li>
  <li><a href="index.php?view=opentopic&topic_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></li>
  <li class=""><a><?php echo $lecture->title;?></a></li>
  <li class="active">Preguntas</li>

</ol>

<hr>
</div>
</div>
  <div class="row">
    <div class="col-md-12">
<?php if(count($questions)>0):?>
<table class="table table-bordered">
<thead>
  <th>Usuario</th>
  <th>Pregunta</th>
  <th>Respuesta</th>
  <th>Fecha</th>
</thead>

<?php foreach($questions as $lf):?>
<tr>
  <td><?php echo $lf->getUser()->name." ".$lf->getUser()->lastname; ?></td>
      <td><?php echo $lf->question; ?></td>
      <td><?php echo $lf->answer;?></td>
      <td><?php echo $lf->created_at; ?></td>
</tr>
<?php 
$lf->read();
endforeach;?>
</table>
<?php else:?>
  <div class="jumbotron">
  <h2>No hay retroalimentacion</h2>
  </div>
<?php endif; ?>
    </div>

</div>
