<?php

$p = ProjectData::getByName($_GET["name"]);
$slides = $p->getSlides();
$images = $p->getPublics();
?>
<?php if($p!=null):?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="./<?php echo $_GET["name"]; ?>" class="btn btn-default pull-right"> <i class="fa fa-circle-o"></i> Ir al Proyecto</a>
      <h2><?php echo $p->title; ?> <small>Galeria</small></h2>
      <hr>
</div>
</div>

<br>

<div class="row">
      <div class="col-md-12 col-xs-12">

    <div class="row">

<?php foreach($images as $i):?>
      <div class="col-md-3 col-sm-6 col-xs-6">
      <h4><a href="./image-<?php echo $i->code; ?>"><?php echo $i->title; ?></a></h4>
      <a href="./image-<?php echo $i->code; ?>"><img src="storage/projects/<?php echo $i->project_id; ?>/<?php echo $i->image; ?>" alt="..." class="img-responsive"></a>
      <br></div>
<?php endforeach; ?>

      </div>


      </div>
      </div>
<br>

</div>
<br><br><br><br><br>

<?php endif; ?>