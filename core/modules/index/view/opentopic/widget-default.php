<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
$topic = TopicData::getById($_GET["topic_id"]);
$course = CourseData::getById($topic->course_id);
if(UserCourseData::getByUC($_SESSION["user_id"],$course->id)==null){
  print "<script>alert('No estas inscrito en este curso !!');</script>";  
  Core::redir("index.php?view=takecourse&course_id=".$course->id);
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<h3><?php echo $topic->name; ?></h3>
<ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li><a href="index.php?view=opencourse&course_id=<?php echo $course->id; ?>"><?php echo $course->name; ?></a></li>
  <li class="active"><?php echo $topic->name; ?></li>
</ol>
<hr>
		</div>
		</div>

	<div class="row">
		<div class="col-md-3">
<div class="list-group">
  <a href="index.php?view=opencourse&course_id=<?php echo $course->id; ?>" class="list-group-item active"><i class="fa fa-circle-o"></i> <?php echo $course->name; ?></a>

  <a href="javascript:void()" class="list-group-item"><i class="fa fa-file-text"></i>  Lecturas</a>
  <a href="index.php?view=topicquestions&topic_id=<?php echo $topic->id; ?>" class="list-group-item"><i class="fa fa-question"></i> Mis Preguntas</a>

</div>






		</div>
		<div class="col-md-9">

<div class="panel panel-default">
<div class="panel-heading">Lista de Lecturas</div>

<table class="table table-bordered">
<thead>
	<th>Lectura</th>
	<th>Preguntas</th>
	<th style="width:100px;">Anotaciones</th>
</thead>

<?php foreach(LectureData::getPublicsByTopicId($_GET["topic_id"]) as $c):?>


<tr>
<td>
  <a href="./l-<?php echo $c->code; ?>">
    <i class="fa fa-file-text"></i> <?php echo $c->title; ?>
  </a>
  </td>
  <td style="width:100px;">
  	<a href="index.php?view=mylecturequestions&lecture_id=<?php echo $c->id; ?>"><?php echo count(QuestionData::getAllByLU($c->id,$_SESSION["user_id"]));?></a>
  </td>
  <td style="width:100px;"></td>
</tr>
<?php endforeach; ?>

  </table>

</div>
</div>
		</div>
		
	</div>

