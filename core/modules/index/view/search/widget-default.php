<?php if(isset($_GET["q"]) && $_GET["q"]!=""):?>
<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);

$posts = PostData::getPostLike($_GET["q"]);
$npost = count($posts);
?>
<?php if($npost>0):?>
<?php
if($npost%2==0){
  // numero de posts par
  $l1 = $npost/2;
  $l2 = $npost/2;
}else{
  // impar
  $hpost = floor($npost/2);
  $l1 = $hpost+1;
  $l2 = $hpost;
}
?>

<div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
<center>         <h1 align="center" style="font-size:35px;font-weight:bold;width:70%;" class="text-primary">Busqueda [<?php echo $_GET["q"]; ?>]</h1></center>   
<br>

    <div class="row">
            <div class="col-md-8 col-md-offset-2">
    <div class="row">
<?php $cnt=0;?>
            <div class="col-md-6">
<?php for($i=0;$i<$l1;$i++):
$p = $posts[$cnt];
?>
<div class="row">
<?php if($p->image!=""&& file_exists("storage/images/$p->image")):?>
<div class="col-md-3">

    <img src="<?php echo "storage/images/$p->image";?>" class="img-responsive"/>

</div>
<?php endif; ?>
<div class="<?php if($post->image!=""&& file_exists("storage/images/$p->image")){ echo "col-md-9";}else{ echo "col-md-12"; } ?>">
            <h4><a href="./p-<?php echo $p->code;?>"><?php echo $p->title;?></a></h4>
            <p class="text-muted"><?php echo date("d/M/Y",strtotime($p->created_at));?> - <a href="./blog/category-inflask"><?php echo $p->getCat()->name;?></a> </p>
</div>
</div>
<hr>
          <?php $cnt++;
endfor; ?>
            </div>
            <div class="col-md-6">
<?php for($i=0;$i<$l2;$i++):
$p = $posts[$cnt];
?>
<div class="row">
<?php if($p->image!=""&& file_exists("storage/images/$p->image")):?>
<div class="col-md-3">

    <img src="<?php echo "storage/images/$p->image";?>" class="img-responsive"/>

</div>
<?php endif; ?>
<div class="<?php if($post->image!=""&& file_exists("storage/images/$p->image")){ echo "col-md-9";}else{ echo "col-md-12"; } ?>">
            <h4><a href="./p-<?php echo $p->code;?>"><?php echo $p->title;?></a></h4>
            <p class="text-muted"><?php echo date("d/M/Y",strtotime($p->created_at));?> - <a href="./blog/category-inflask"><?php echo $p->getCat()->name;?></a> </p>
</div>
</div>
<hr>
          <?php $cnt++;
endfor; ?>

            </div>
    </div>
            </div>

    </div>


            </div>
    </div>
</div>
<?php else:?>
  <div class="container">
  <div class="row">
    <div class="col-md-12">
<br><br><br>
    <h1 style="width:75%;font-size:50px;">No hay resultados</h1>
    <p class="lead">Su busqueda [<?php echo $_GET["q"]?>] no genero ningun resultado, por favor intente de nuevo con otro termino.</p>
    <a href="./" class="btn btn-primary">Ir al inicio</a>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
</div>
</div>
</div>

<?php endif; ?>
<?php else:?>
  <div class="container">
  <div class="row">
    <div class="col-md-12">
<br><br><br>
    <h1 style="width:75%;font-size:50px;">Busqueda vacia</h1>
    <p class="lead">No se puede procesar una peticion de busqueda varia</p>
    <a href="./" class="btn btn-primary">Ir al inicio</a>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
</div>
</div>
</div>

<?php endif;?>