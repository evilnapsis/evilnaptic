<?php

$slides = ImageData::getPrincipals();
$images = ImageData::getPublicsByProject();

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="btn-toolbar pull-right">
    <div class="btn-group">
    </div>

</div>
      <h2>Protafolio</h2>
      <p class="lead"></p>
      <hr>
</div>
</div>
	<div class="row">
		<div class="col-md-6">
    <h4>Descripcion</h4>
		</div>
		<div class="col-md-6"><br><br>


<?php if(count($slides)>0):
$s = 0;
?>
<div id="carousel-example-generic" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
<?php foreach($slides as $sli):?>
    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $s;?>" <?php if($s==0):?>class="active" <?php endif; ?> ></li>
<?php $s++; endforeach; $s=0;?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
<?php foreach($slides as $sli):?>
    <div class="item <?php if($s==0){ echo "active"; }?>">
      <img src="storage/projects/<?php echo $sli->project_id; ?>/<?php echo $sli->image; ?>" alt="...">
      <div class="carousel-caption">
        <h4><?php echo $sli->title; ?></h4>
      </div>
    </div>
<?php $s++; endforeach; ?>
  <!-- Controls -->
<!--  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="icon-next"></span>
  </a> -->
</div>    

</div>
<?php endif; ?>





</div>
	</div>

<br>

<div class="row">
      <div class="col-md-12 col-xs-12">
      <h2>Proyectos</h2>
      <hr>

    <div class="row">

<?php foreach($images as $i):?>
      <div class="col-md-3 col-xs-3">
      <h4><a href="./<?php echo $i->getProject()->short_name; ?>"><?php echo $i->getProject()->title; ?></a></h4>
      <br>
      <img src="storage/projects/<?php echo $i->project_id; ?>/<?php echo $i->image; ?>" alt="..." class="img-responsive">
      <br><p><?php echo $i->getProject()->description; ?></p>
      </div>
<?php endforeach; ?>

      </div>


      </div>
      </div>
<br>

</div>
<br>
