<?php 

$posts = PostData::getPostPrincipals2();
$npost = count($posts);
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
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - -->
<br><div class="container">
    <div class="row">
            <div class="col-md-12">
<center>           <br>
<img src="imgs/yo.png" style="width:180px;"  class="img-circle img-thumbnail">
<br> <h1 align="center" style="font-size:35px;font-weight:bold;width:70%;" class="text-primary">I AM EVILNɅPSIS</h1></center>   
            <p class="lead" align="center">Freelance, Web Developer, Geek, Father.</p>
 <center>
 <a href="https://mx.linkedin.com/in/evilnapsis" class="btn btn-default"><i class="fa fa-linkedin"></i></a> 
 <a href="https://github.com/evilnapsis" class="btn btn-default"><i class="fa fa-github"></i></a> 
<!-- <a href="https://behance.com/evilnapsis" class="btn btn-default"><i class="fa fa-behance-alt"></i></a>  -->
 <a href="https://youtube.com/evilnapsis" class="btn btn-default"><i class="fa fa-youtube-play"></i></a> 
 <a href="https://twitter.com/evilnapsis" class="btn btn-default"><i class="fa fa-twitter"></i></a> 
 <a href="https://facebook.com/iamevilnapsis" class="btn btn-default"><i class="fa fa-facebook"></i></a> 
 <a href="./resume" class="btn btn-default"><i class="fa fa-file-o"></i></a></center>
            <br><br><br><hr>
            </div>
    </div>
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
<center>         <h1 align="center" style="font-size:35px;font-weight:bold;width:70%;" class="text-primary">Articulos Recientes</h1></center>   
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
<?php if($p->image!="" && file_exists("storage/images/$p->image")):?>
<div class="col-md-3">

    <img src="<?php echo "storage/images/$p->image";?>" class="img-responsive"/>

</div>
<?php endif; ?>
<div class="<?php if($post->image!="" && file_exists("storage/images/$p->image")){ echo "col-md-9";}else{ echo "col-md-12"; } ?>">
            <h4><a href="./p-<?php echo $p->code;?>"><?php echo $p->title;?></a></h4>
            <p class="text-muted"><?php echo date("d/M/Y",strtotime($p->created_at));?> - <a href="javascript:void()"><?php echo $p->getCat()->name;?></a> </p>
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
<?php if($p->image!="" && file_exists("storage/images/$p->image")):?>
<div class="col-md-3">

    <img src="<?php echo "storage/images/$p->image";?>" class="img-responsive"/>

</div>
<?php endif; ?>
<div class="<?php if($post->image!="" && file_exists("storage/images/$p->image")){ echo "col-md-9";}else{ echo "col-md-12"; } ?>">
            <h4><a href="./p-<?php echo $p->code;?>"><?php echo $p->title;?></a></h4>
            <p class="text-muted"><?php echo date("d/M/Y",strtotime($p->created_at));?> - <a href="javascript:void()"><?php echo $p->getCat()->name;?></a> </p>
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
</div>
<br><br>