<?php
$topic = TopicData::getById($_GET["topic_id"]);
$course = CourseData::getById($topic->course_id);

// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<div class="container">

  <div class="row">
    <div class="col-md-12">
    <h2>Nueva Lectura</h2>
    <ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li><a href="index.php?view=admincourse&course_id=<?php echo $course->id; ?>"><?php echo $course->name; ?></a></li>
  <li><a href="index.php?view=admintopic&topic_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></li>
<li class="active">Nueva Lectura</li>
</ol>
<hr>
</div>
</div>
	<div class="row">
<div class="col-md-3">
<div class="list-group">

  <a href="index.php?view=admintopic&topic_id=<?php echo $topic->id; ?>" class="list-group-item"><i class="fa fa-chevron-left"></i> Regresar</a>
</div>
    </div>
		<div class="col-md-9">
		<form class="form-horizontal" role="form" method="post" action="index.php?action=addlecture">
  <div class="form-group">
    <div class="col-lg-12">
      <input type="title" name="title" class="form-control" id="inputEmail1" required placeholder="Titulo de la lectura">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <textarea  name="content" rows="5" class="redactor" id="inputEmail1" placeholder="Descripcion"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public"> Publicar
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
    <input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">
      <button type="submit" class="btn btn-block btn-default">Agregar Lectura</button>
    </div>
  </div>
</form>
		</div>
		
	</div>

</div>
