<?php
$image = ImageData::getByCode($_GET["code"]);
$p = ProjectData::getById($image->project_id);
$images = $p->getPublics();
$rands = $p->get4rands();
// $images = $p->get4Images();
?>
<?php if($image!=null):?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="btn-toolbar pull-right">
      <div class="btn-group"><a href="./<?php echo $p->short_name; ?>" class="btn btn-default"> <i class="fa fa-circle-o"></i> <?php echo $p->title; ?></a></div>
      <div class="btn-group"><a href="./<?php echo $p->short_name; ?>-galery" class="btn btn-default"> <i class="fa fa-th-large"></i> Ir a la Galeria</a></div>
      </div>
      <h2><?php echo $image->title; ?>       <div class="fb-like" style="margin:0;" data-href="http://inflask.com/image-<?php echo $_GET["code"];?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
</h2>
      <hr>

      <div class="row">
      <div class="col-md-9">
        <img src="storage/projects/<?php echo $p->id; ?>/<?php echo $image->image; ?>" class="img-responsive">
        <br>
        <?php echo $image->description; ?>
      </div>
      <div class="col-md-3">
      <?php if(count($images)>0):?>  


<div class="panel panel-default">
  <div class="panel-heading"><i class="fa fa-picture-o"></i> Imagenes</div>
  <div class="panel-body">
<ul class="media-list">
<?php foreach($images as $im):?>
  <li class="media">
    <a class="pull-left" href="./image-<?php echo $im->code; ?>">
      <img class="media-object" style="width:64px;" src="storage/projects/<?php echo $p->id; ?>/<?php echo $im->image; ?>" alt="...">
    </a>
    <div class="media-body">
      <h4><a href="./image-<?php echo $im->code; ?>"><?php echo $im->title; ?></a></h4>
    </div>
  </li>
<?php endforeach; ?>
</ul>
  </div>
</div>

<?php endif; ?>


      </div>
      </div>
</div>
</div>

<br>
<!-- - - - - - - - - - - - - - - - -->
<div class="row">
      <div class="col-md-12 col-xs-12">
      <h3>Mas Imagenes</h3>
      <hr>

    <div class="row">

<?php foreach($rands as $i):?>
      <div class="col-md-3 col-xs-3">
      <h4><a href="./image-<?php echo $i->code; ?>"><?php echo $i->title; ?></a></h4>
      <br>
      <img src="storage/projects/<?php echo $i->project_id; ?>/<?php echo $i->image; ?>" alt="..." class="img-responsive">
      </div>
<?php endforeach; ?>

      </div>


      </div>
      </div>
<br>

</div>
<br><br><br><br><br>

<?php endif; ?>