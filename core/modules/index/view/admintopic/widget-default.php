<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
$topic = TopicData::getById($_GET["topic_id"]);
$course = CourseData::getById($topic->course_id);
$lectures = LectureData::getAllByTopicId($_GET["topic_id"]);
if($course->user_id!= $_SESSION["user_id"]){
  Core::redir("./");
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<h3><?php if($topic->is_public){ echo "<i class='fa fa-check-circle-o tip' title='Publico'></i>"; }?> <?php echo $topic->name; ?></h3>
    <ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li><a href="index.php?view=admincourse&course_id=<?php echo $course->id; ?>"><?php echo $course->name; ?></a></li>
  <li class="active"><?php echo $topic->name; ?></li>
</ol>
<hr>
		</div>
		</div>

	<div class="row">
		<div class="col-md-3">
<div class="list-group">
  <a href="index.php?view=admincourse&course_id=<?php echo $course->id; ?>" class="list-group-item active"><i class="fa fa-circle-o"></i> <?php echo $course->name; ?></a>

  <a href="index.php?view=newlecture&topic_id=<?php echo $topic->id; ?>" class="list-group-item"><i class="fa fa-plus"></i> Nueva Lectura</a>
  <a href="index.php?view=newvideo&topic_id=<?php echo $topic->id; ?>" class="list-group-item"><i class="fa fa-plus"></i> Nuevo Video</a>
  <a data-toggle="modal" href="#myModal"  class="list-group-item"><i class="fa fa-pencil"></i> Editar Topico</a>

</div>








  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Topico</h4>
        </div>
        <div class="modal-body">
<form class="form-horizontal" role="form" method="post" action="index.php?action=updatetopic">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre del curso</label>
    <div class="col-lg-9">
      <input type="text" name="name" class="form-control" value="<?php echo $topic->name; ?>" id="inputEmail1" required placeholder="Nombre del curso">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Descripcion del curso</label>
    <div class="col-lg-9">
      <textarea  name="description" rows="5" class="form-control" id="inputEmail1" placeholder="Descripcion"><?php echo $topic->description; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public" <?php if($topic->is_public){ echo "checked"; }?> > Es publico
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
    	<input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">
      <button type="submit" class="btn btn-block btn-success">Actualizar topico</button>
    </div>
  </div>
</form>        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->



		</div>
		<div class="col-md-9">


<div style="font-size:18px;">Lista de Lecturas</div>
<?php if(count($lectures)>0):?>
<?php foreach($lectures as $c):?>
<h4><a href="index.php?view=editlecture&lecture_id=<?php echo $c->id; ?>"><?php if($c->is_public){ echo "<i class='fa fa-check-circle-o tip' title='Publico'></i>"; }?> <?php echo $c->title; ?></a></h4>
<a href="index.php?view=questions&lecture_id=<?php echo $c->id; ?>">Preguntas(<?php echo count(QuestionData::getUnreadByLectureId($c->id));?>)</a>
| <a href="index.php?view=lecturefeedback&lecture_id=<?php echo $c->id; ?>">Feedback</a>
<hr>
<?php endforeach; ?>
<?php else:?>
  <h3>No hay lecturas.</h3>
  <p>Para agregar una lectura debes dar click en el boton <b>Nueva Lectura</b></p>
<?php endif;?>

		</div>
		
	</div>

</div>
