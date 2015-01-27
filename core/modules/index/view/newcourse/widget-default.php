<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<div class="container">
	<div class="row">

		<div class="col-md-12">
		<h2>Nuevo Curso</h2>
<form class="form-horizontal" role="form" method="post" action="index.php?action=addcourse">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre del curso</label>
    <div class="col-lg-9">
      <input type="text" name="name" class="form-control" id="inputEmail1" required placeholder="Nombre del curso">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Descripcion del curso</label>
    <div class="col-lg-9">
      <textarea  name="description" rows="5" class="form-control" id="inputEmail1" placeholder="Descripcion"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Tipo</label>
    <div class="col-lg-9">
    <select name="kind2_id" class="form-control" required>
        <option value="">-- SELECCIONE TIPO --</option>
      <?php foreach(Kind2Data::getAll() as $cat):?>
        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
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
    		<option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
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
    		<option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
    	<?php endforeach; ?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
      <button type="submit" class="btn btn-block btn-default">Agregar curso</button>
    </div>
  </div>
</form>
		</div>
		
	</div>

</div>
