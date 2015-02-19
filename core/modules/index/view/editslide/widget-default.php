<?php
$post = SlideData::getById($_GET["slide_id"]);

?>

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
		<form class="form-horizontal" enctype="multipart/form-data"  role="form" method="post" action="index.php?action=updateslide">

<div class="form-group">
    <div class="col-lg-12">
      <input type="file"  name="image" placeholder="Nombre">
<?php if($post->image!=""):?>
<div class="form-group">
    <div class="col-lg-12">
    <img src="<?php echo "storage/slides/$post->image";?>" class="img-responsive"/>
    </div>
</div>
<?php endif; ?>

    </div>
</div>

  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" name="video" value="<?php echo $post->video; ?>" class="form-control" id="inputEmail1"  placeholder="Video">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" name="link" value="<?php echo $post->link; ?>" class="form-control" id="inputEmail1"  placeholder="Link">
    </div>
  </div>


  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" name="title" value="<?php echo $post->title; ?>" class="form-control" id="inputEmail1"  placeholder="Titulo de la lectura">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" name="title_link" value="<?php echo $post->title_link; ?>" class="form-control" id="inputEmail1"  placeholder="Link del titulo">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" name="subtitle" value="<?php echo $post->subtitle; ?>" class="form-control" id="inputEmail1"  placeholder="Subtitulo">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" name="subtitle_link" value="<?php echo $post->subtitle_link; ?>" class="form-control" id="inputEmail1"  placeholder="Link del Subtitulo">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" name="button_text" class="form-control" value="<?php echo $post->button_text; ?>" id="inputEmail1"  placeholder="Texto del boton">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" name="button_class" class="form-control" value="<?php echo $post->button_class; ?>" id="inputEmail1"  placeholder="Clase del boton">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" name="button_link" class="form-control" value="<?php echo $post->button_link; ?>" id="inputEmail1"  placeholder="Enlace del boton">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="text" name="position" value="<?php echo $post->position; ?>" class="form-control" id="inputEmail1"  placeholder="Posicion">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public" <?php if($post->is_public){ echo "checked";}?>> Publicar
        </label>
      </div>

    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
    <input type="hidden" name="slide_id" value="<?php echo $post->id; ?>">

      <button type="submit" class="btn btn-block btn-default">Agregar Slide</button>
    </div>
  </div>
</form>
		</div>
		
	</div>

</div>
