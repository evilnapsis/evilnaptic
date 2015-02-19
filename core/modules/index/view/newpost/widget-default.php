<div class="container">

  <div class="row">
    <div class="col-md-12">
<!--    <a data-toggle="modal" href="#myModal" class="btn btn-default pull-right">Subir Imagen</a> -->
    <h2>Nuevo Post</h2>


  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<hr>
</div>
</div>
	<div class="row">
		<div class="col-md-12">
		<form class="form-horizontal" enctype="multipart/form-data"  role="form" method="post" action="index.php?action=addpost">
  <div class="form-group">
    <div class="col-lg-12">
      <input type="title" name="title" class="form-control" id="inputEmail1" required placeholder="Titulo de la lectura">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <textarea  name="brief" rows="3"  placeholder="Descripcion corta" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <textarea  name="content" rows="5" class="redactor" id="inputEmail1" placeholder="Descripcion"></textarea>
    </div>
  </div>
<div class="form-group">
    <div class="col-lg-12">
      <input type="file"  name="image" placeholder="Nombre">
    </div>
</div>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="title" name="video" class="form-control" id="inputEmail1" placeholder="Video">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="title" name="tags" class="form-control" id="inputEmail1" placeholder="Etiquetas">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-12">
    <select name="kind_id" class="form-control" required>
        <option value="">-- SELECCIONE TIPO DE PUBLICACION --</option>
      <?php foreach(KindData::getAll() as $cat):?>
        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-12">
    <select name="cat_id" class="form-control" required>
        <option value="">-- SELECCIONE CATEGORIA --</option>
      <?php foreach(CatData::getAll() as $cat):?>
        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="show_image"> Mostrar Imagen Destacada
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public"> Publicar
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_principal"> Principal
        </label>
</div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_sidebar"> Mostrar al lado
        </label>
</div>

    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
    <input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">
      <button type="submit" class="btn btn-block btn-default">Agregar Post</button>
    </div>
  </div>
</form>
		</div>
		
	</div>

</div>
