<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
$course = CourseData::getById($_GET["course_id"]);
if($course->user_id!= $_SESSION["user_id"]){
  Core::redir("./");
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<h3><?php if($course->is_public){ echo "<i class='fa fa-check-circle-o tip' title='Publico'></i>"; }?> <?php echo $course->name; ?></h3>
    <ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li class="active"><?php echo $course->name; ?></li>
</ol>

<hr>
		</div>
		</div>

	<div class="row">
		<div class="col-md-3">
<div class="list-group">

  <a href="index.php?view=newtopic&course_id=<?php echo $course->id; ?>" class="list-group-item"><i class="fa fa-plus"></i> Nuevo Tema</a>
  <a href="index.php?view=people&course_id=<?php echo $course->id; ?>" class="list-group-item"><i class="fa fa-users"></i> Personas</a>
  <a href="index.php?view=coursequestions&course_id=<?php echo $course->id; ?>" class="list-group-item"><i class="fa fa-question"></i> Preguntas</a>
  <a href="index.php?view=coursefeedback&course_id=<?php echo $course->id; ?>" class="list-group-item"><i class="fa fa-retweet"></i> Feedback</a>
  <a href="#" class="list-group-item"><i class="fa fa-bell-o"></i> Notificaciones</a>
  <a data-toggle="modal" href="#myModal"  class="list-group-item"><i class="fa fa-pencil"></i> Editar Curso</a>
</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Curso</h4>
        </div>
        <div class="modal-body">
<form class="form-horizontal" role="form" method="post" action="index.php?action=updatecourse">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre del curso</label>
    <div class="col-lg-9">
      <input type="text" name="name" class="form-control" value="<?php echo $course->name; ?>" id="inputEmail1" required placeholder="Nombre del curso">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Descripcion del curso</label>
    <div class="col-lg-9">
      <textarea  name="description" rows="5" class="form-control redactor" id="inputEmail1" placeholder="Descripcion"><?php echo $course->description; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Tipo</label>
    <div class="col-lg-9">
    <select name="kind2_id" class="form-control" required>
        <option value="">-- SELECCIONE TIPO --</option>
      <?php foreach(Kind2Data::getAll() as $cat):?>
        <option value="<?php echo $cat->id; ?>" <?php if($cat->id==$course->kind2_id){ echo "selected";}?> ><?php echo $cat->name; ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Categoria</label>
    <div class="col-lg-9">
    <select name="category_id" class="form-control" required>
    		<option value="">-- SELECCIONE CATEGORIA --</option>
    	<?php foreach(CategoryData::getAll() as $cat):?>
    		<option value="<?php echo $cat->id; ?>" <?php if($cat->id==$course->category_id){ echo "selected";}?> ><?php echo $cat->name; ?></option>
    	<?php endforeach; ?>
    </select>
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nivel</label>
    <div class="col-lg-9">
    <select name="level_id" class="form-control" required>
    		<option value="">-- SELECCIONE NIVEL --</option>
    	<?php foreach(LevelData::getAll() as $cat):?>
    		<option value="<?php echo $cat->id; ?>" <?php if($cat->id==$course->level_id){ echo "selected";}?>><?php echo $cat->name; ?></option>
    	<?php endforeach; ?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public" <?php if($course->is_public){ echo "checked"; }?> > Es publico
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_principal" <?php if($course->is_principal){ echo "checked"; }?> > Es principal
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_open" <?php if($course->is_open){ echo "checked"; }?> > Es Abierto
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
    	<input type="hidden" name="course_id" value="<?php echo $course->id; ?>">
      <button type="submit" class="btn btn-block btn-success">Actualizar curso</button>
    </div>
  </div>
</form>        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->



		</div>
		<div class="col-md-9">
<div style="font-size:18px;">Lista de Temas</div>
<?php foreach(TopicData::getAllByCourseId($_GET["course_id"]) as $c):?>
<h4> <a href="index.php?view=admintopic&topic_id=<?php echo $c->id; ?>"><?php if($c->is_public){ echo "<i class='fa fa-check-circle-o tip' title='Publico'></i>"; }?> <?php echo $c->no." - ".$c->name; ?></a></p>
<?php echo $c->description; ?>
<hr>
<?php endforeach; ?>

		</div>
		
	</div>

</div>
