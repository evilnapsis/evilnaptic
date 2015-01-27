<?php
$post = PostData::getById($_GET["post_id"]);

?>
<div class="container">

  <div class="row">
    <div class="col-md-12">
    <h2><?php echo $post->title; ?></h2>
<hr>
</div>
</div>
	<div class="row">
		<div class="col-md-12">
		<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="index.php?action=updatepost">
  <div class="form-group">
    <div class="col-lg-12">
      <input type="title" name="title" value="<?php echo $post->title; ?>" class="form-control" id="inputEmail1" required placeholder="Titulo de la lectura">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <textarea  name="brief" rows="3"  placeholder="Descripcion corta" class="form-control"><?php echo $post->brief; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <textarea  name="content" rows="5" class="redactor" id="inputEmail1" placeholder="Descripcion"><?php echo $post->content; ?></textarea>
    </div>
  </div>
<div class="form-group">
    <div class="col-lg-12">
      <input type="file"  name="image" placeholder="Nombre">
    </div>
</div>
<?php if($post->image!=""):?>
<div class="form-group">
    <div class="col-lg-12">
    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>
    </div>
</div>
<?php endif; ?>
  <div class="form-group">
    <div class="col-lg-12">
      <input type="title" name="tags" class="form-control" id="inputEmail1" placeholder="Etiquetas">
    </div>
  </div>
<?php
$tags = PostTagData::getAllByPostId($post->id);
foreach ($tags as $tag) {
  echo "<span class='label label-success'><a href='./index.php?action=#'>&times;</a>&nbsp;".$tag->getTag()->name."</span> ";
}

?>
<br><br>
  <div class="form-group">
    <div class="col-lg-12">
    <select name="kind_id" class="form-control" required>
        <option value="">-- SELECCIONE TIPO DE PUBLICACION --</option>
      <?php foreach(KindData::getAll() as $cat):?>
        <option value="<?php echo $cat->id; ?>" <?php if($post->kind_id==$cat->id){ echo "selected";}?>><?php echo $cat->name; ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-12">
    <select name="cat_id" class="form-control" required>
        <option value="">-- SELECCIONE CATEGORIA --</option>
      <?php foreach(CatData::getAll() as $cat):?>
        <option value="<?php echo $cat->id; ?>" <?php if($post->cat_id==$cat->id){ echo "selected";}?>><?php echo $cat->name; ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public" <?php if($post->is_public){ echo "checked";}?>> Publicar
        </label><br>
        <label>
          <input type="checkbox" name="is_principal" <?php if($post->is_principal){ echo "checked";}?>> Principal
        </label><br>
        <label>
          <input type="checkbox" name="is_sidebar" <?php if($post->is_sidebar){ echo "checked";}?>> Mostrar al lado
        </label>

      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
    <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
      <button type="submit" class="btn btn-block btn-default">Actualizar Post</button>
    </div>
  </div>
</form>
		</div>
		
	</div>

</div>
