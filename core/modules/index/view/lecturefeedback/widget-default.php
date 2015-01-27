<?php
$lecture = LectureData::getById($_GET["lecture_id"]);
$topic = TopicData::getById($lecture->topic_id);
$course = CourseData::getById($topic->course_id);
$califications = LectureFeedbackData::getAllByLectureId($_GET["lecture_id"]);
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<div class="container">

  <div class="row">
    <div class="col-md-12">
    <h3><?php echo $lecture->title; ?></h3>
    <ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li><a href="index.php?view=admincourse&course_id=<?php echo $course->id; ?>"><?php echo $course->name; ?></a></li>
  <li><a href="index.php?view=admintopic&topic_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></li>
  <li class=""><a><?php echo $lecture->title;?></a></li>
  <li class="active">RETROALIMENTACION</li>

</ol>

<hr>
</div>
</div>
	<div class="row">
		<div class="col-md-12">
<?php if(count($califications)>0):?>
<table class="table table-bordered">
<thead>
  <th>Usuario</th>
  <th>Leido</th>
  <th>Entendido</th>
  <th>Calificado</th>
  <th>Calificacion</th>
  <th>Comentario</th>
  <th>Fecha</th>
</thead>

<?php foreach($califications as $lf):?>
<tr>
  <td><?php echo $lf->getUser()->name." ".$lf->getUser()->lastname; ?></td>
      <td><?php if($lf->is_readed):?><i class="fa fa-check-circle"></i><?php else:?><i class="fa fa-remove-circle"></i><?php endif; ?></td>
      <td><?php if($lf->is_understanded):?><i class="fa fa-check-circle"></i><?php else:?><i class="fa fa-remove-circle"></i><?php endif; ?></td>
      <td><?php if($lf->is_calified):?><i class="fa fa-check-circle"></i><?php else:?><i class="fa fa-remove-circle"></i><?php endif; ?></td>
      <td><?php echo $lf->calification; ?></td>
      <td><?php echo $lf->comment; ?></td>
      <td><?php echo $lf->created_at; ?></td>
</tr>
<?php endforeach;?>
</table>
<?php else:?>
  <div class="jumbotron">
  <h2>No hay retroalimentacion</h2>
  </div>
<?php endif; ?>
		</div>

</div>
