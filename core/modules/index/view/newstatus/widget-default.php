<div class="container">

  <div class="row">
    <div class="col-md-12">
<!--    <a data-toggle="modal" href="#myModal" class="btn btn-default pull-right">Subir Imagen</a> -->
    <h2>Nuevo Status</h2>


<hr>
</div>
</div>
	<div class="row">
		<div class="col-md-12">
		<form class="form-horizontal" enctype="multipart/form-data"  role="form" method="post" action="index.php?action=addstatus">
  <div class="form-group">
    <div class="col-lg-12">
      <textarea  name="brief" rows="3"  placeholder="Descripcion corta" class="form-control"></textarea>
    </div>
  </div>
<div class="form-group">
    <div class="col-lg-12">
      <input type="file"  name="image" placeholder="Nombre">
    </div>
</div>

  <div class="form-group">
    <div class="col-lg-12">
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
<br><br><br>