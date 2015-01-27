<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<div class="container">
	<div class="row">

		<div class="col-md-12">
		<h2>Nuevo tema</h2>
<form class="form-horizontal" role="form" method="post" action="index.php?action=addtopic">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre del tema</label>
    <div class="col-lg-2">
      <input type="text" name="no" class="form-control" id="inputEmail1" required placeholder="Numero">
    </div>
    <div class="col-lg-7">
      <input type="text" name="name" class="form-control" id="inputEmail1" required placeholder="Nombre del tema">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Descripcion del tema</label>
    <div class="col-lg-9">
      <textarea  name="description" rows="5" class="form-control" id="inputEmail1" placeholder="Descripcion"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
    <input type="hidden" name="course_id" value="<?php echo $_GET["course_id"];?>">
      <button type="submit" class="btn btn-block btn-default">Agregar tema</button>
    </div>
  </div>
</form>
		</div>
		
	</div>

</div>
