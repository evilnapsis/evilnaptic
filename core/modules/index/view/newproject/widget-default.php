<div class="container">
        <!-- Main Content -->

          <div class="row">
            <div class="col-md-12">
  <!-- Button trigger modal -->


            <h2>ProyectoS</h2>
            </div>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-star"></i> Nuevo Proyecto
                </div>
                <div class="widget-body ">

<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?action=addproject">
  <div class="form-group">

    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" name="name" placeholder="Nombre del Proyecto">
    </div>
<label for="inputEmail1" class="col-lg-2 control-label">Prefijo</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" name="preffix" placeholder="Prefijo">
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre corto</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" name="short_name" placeholder="Nombre corto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
      <textarea class="form-control" id="inputPassword1" placeholder="Descripcion" rows="3" name="description"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Resumen</label>
    <div class="col-lg-10">
      <textarea class="form-control" id="inputPassword1" placeholder="Resumen" rows="6" name="resume"></textarea>
    </div>
  </div>
  <div class="form-group">
     <div class="col-lg-10 col-md-offset-2">
      <div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control" placeholder="Precio" name="price">
</div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-3">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public"> Es Visible
        </label>
      </div>
    </div>

  </div>




  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-6">
      <button type="submit" class="btn btn-primary btn-block">Agregar Proyecto</button>
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
</div>
<br><br>