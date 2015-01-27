<?php
$lecture = LectureData::getById($_GET["lecture_id"]);
$topic = TopicData::getById($lecture->topic_id);
$course = CourseData::getById($topic->course_id);
if($course->user_id!= $_SESSION["user_id"]){
  Core::redir("./");
}
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<div class="container">

  <div class="row">
    <div class="col-md-12">
    <h3><?php if($lecture->is_public){ echo "<i class='fa fa-check-circle-o tip' title='Publico'></i>"; }?> <?php echo $lecture->title; ?> <small>Editar</small></h3>
    <ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li><a href="index.php?view=admincourse&course_id=<?php echo $course->id; ?>"><?php echo $course->name; ?></a></li>
  <li><a href="index.php?view=admintopic&topic_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></li>
  <li class="active"><?php echo $lecture->title;?></li>
</ol>
<hr>
</div>
</div>
	<div class="row">
<div class="col-md-3">
<div class="list-group">

  <a href="index.php?view=admintopic&topic_id=<?php echo $lecture->topic_id; ?>" class="list-group-item"><i class="fa fa-chevron-left"></i> Regresar</a>
  <a href="index.php?view=openlecture&lecture_id=<?php echo $lecture->id; ?>" class="list-group-item"><i class="fa fa-eye"></i> Vista previa</a>
</div>
    </div>
		<div class="col-md-9">
		<form class="form-horizontal" role="form" method="post" action="index.php?action=updatelecture">
  <div class="form-group">
    <div class="col-lg-12">
      <input type="title" name="title" value="<?php echo $lecture->title; ?>" class="form-control" id="inputEmail1" required placeholder="Titulo de la lectura">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <textarea  name="content" rows="5" class="redactor" id="inputEmail1" placeholder="Descripcion"><?php echo $lecture->content; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public" <?php if($lecture->is_public){ echo "checked";}?>> Publicar
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
        <input type="hidden" name="lecture_id" value="<?php echo $lecture->id;?>">

      <button type="submit" class="btn btn-block btn-success">Actualizar Lectura</button>
    </div>
  </div>
</form>
		</div>
		
	</div>

</div>
