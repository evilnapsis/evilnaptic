<div class="container">
<?php
$p = ProjectData::getById($_GET["project_id"]);
?>



        <!-- Main Content -->

          <div class="row">
            <div class="col-md-12">
                  <a  href="index.php?view=newproduct" class="pull-right btn-sm btn btn-default">Agregar Proyecto</a>
  <!-- Button trigger modal -->


            <h2><?php echo $p->title; ?> <small>Editar</small></h2>
            </div>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-star"></i> <?php echo $p->title; ?>
                </div>
                <div class="widget-body ">

<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?action=updateproject">
  <div class="form-group">

    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" name="title" value="<?php echo $p->title; ?>" placeholder="Nombre del Proyecto">
    </div>
<label for="inputEmail1" class="col-lg-2 control-label">Prefijo</label>
    <div class="col-lg-2">
      <input type="text" class="form-control"  value="<?php echo $p->preffix; ?>" name="preffix" placeholder="Prefijo">
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre corto</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" name="short_name" value="<?php echo $p->short_name; ?>" placeholder="Nombre corto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
      <textarea class="form-control" id="inputPassword1" placeholder="Descripcion" rows="3" name="description"><?php echo $p->description; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Resumen</label>
    <div class="col-lg-10">
      <textarea class="form-control" id="inputPassword1" placeholder="Resumen" rows="6" name="resume"><?php echo $p->resume; ?></textarea>
    </div>
  </div>
  <div class="form-group">
     <div class="col-lg-10 col-md-offset-2">
      <div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control" placeholder="Precio" value="<?php echo $p->price; ?>" name="price">
</div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-2">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public" <?php if($p->is_public){ echo "checked"; }?>> Es Visible
        </label>
      </div>
    </div>
    <div class="col-lg-offset-2 col-lg-2">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_principal" <?php if($p->is_principal){ echo "checked"; }?>> Es Principal
        </label>
      </div>
    </div>
  </div>



<input type="hidden" name="project_id" value="<?php echo $_GET["project_id"];?>">
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-6">
      <button type="submit" class="btn btn-success btn-block">Actualizar Proyecto</button>
    </div>
    <div class="col-lg-4">
      <button type="reset" class="btn btn-default btn-block">Limpiar Campos</button>
    </div>
  </div>
</form>
                  
                </div>
              </div>
            </div>

          </div>

<br><br>
</div>