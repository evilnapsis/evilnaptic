<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
$cnt=0;
$slides = SlideData::getPublics();



$posts = PostData::getPostPrincipals();

$web_posts = PostData::getWebPrincipals();
$ms_posts = PostData::getMSPrincipals();


$tips = PostData::getTipPrincipals();
$topics = CourseData::getPrincipals();

?>
<div style="background:#434343;margin-top:-21px;">
<div class="container">


  <div class="row">
  <div class="col-md-1">
<br>  
<!-- 
<h3><a href="">Proyectos Recientes</a></h3>
<h3><a href="">Centro de Ayuda</a></h3>
<h3><a href="">Proyectos Recientes</a></h3>
<h3><a href="">Proyectos Recientes</a></h3>
<h3><a href="">Proyectos Recientes</a></h3>
-->
  </div>

        <div class="col-md-10 ">

      <div class="row">
      <div class="col-md-12">
        <?php if(count($slides)>0):?>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
<?php foreach($slides as $s):?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $cnt; ?>" class="<?php if($cnt==0){ echo "active";}?>"></li>
<?php $cnt++; endforeach; ?>

      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
<?php $cnt=0; foreach($slides as $s):
$url = "storage/slides/".$s->image;
?>

        <div class="item <?php if($cnt==0){ echo "active"; }?>" style="background:url(<?php echo $url; ?>); height:350px;">


<!--          <img src="<?php echo $url; ?>" alt="..."> -->
          <div class="carousel-caption">
            <h2>
            <?php if($s->title_link!=""):?>
              <a href="<?php echo $s->title_link; ?>">
            <?php endif; ?>
            <?php echo $s->title; ?>
            <?php if($s->title_link!=""):?>
              </a>
            <?php endif; ?>

            </h2>
          </div>
        </div>
<?php $cnt++; endforeach; ?>
<!--
        <div class="item">
          <img src="http://placehold.it/800x300" alt="...">
          <div class="carousel-caption">
            <h2>Heading</h2>
          </div>
        </div>
        -->
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
  <?php endif; ?>


      </div>
      <!--- - - - - - - -->
      <!-- - - - - - - - - - -->
      </div>




    </div>
  </div>



</div>
</div>
<br>
<div class="container">
	<div class="row">

<!-- .tips 
		<div class="col-md-2">
<div class="panel panel-default">
<div class="panel-heading"></div>
<div class="panel-body">
<?php foreach($tips as $post):?>
<h4><a class="post-title" href="./p-<?php echo $post->code; ?>"><?php echo $post->title; ?></a></h4>
<?php echo $post->brief; ?>
<hr>
<?php endforeach; ?>
</div>
</div>
		</div>
 ./tips -->

		<div class="col-md-8">

<div class="row">
  <div class="col-md-6 col-sm-6">
    <div class="panel panel-default">
<div class="panel-heading">Desarrollo Web</div>
<div class="panel-body">
<?php $cnt=0; foreach($web_posts as $post):?>
<div class="row">
<?php if($cnt>0&&$post->image!=""):?>
<div class="col-md-3">

    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>

</div>
<?php endif; ?>
<div class="<?php if($cnt>0 && $post->image!=""){ echo "col-md-9";}else{ echo "col-md-12"; } ?>">
  <?php if($cnt==0 && $post->video!=""):?>
  <iframe src="https://youtube.com/embed/<?php echo $post->video; ?>" style="border:0;width:100%;"></iframe>
  <div class="clearfix"></div><br>
<?php elseif($cnt==0 && $post->image!=""):?>
    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>
<?php endif; ?>

<h4  style="margin:0;"><a class="post-title" href="./p-<?php echo $post->code; ?>"><?php echo $post->title; ?></a></h4>
  <?php echo $post->brief; ?>
<div class="clearfix"></div>
<a class="twitter-share-button"
  data-show-count="true"
  href="http://twitter.com"
  data-url="http://evilnapsis.com/p-<?php echo $post->code; ?>">
Tweet
</a>
<div class="g-plusone" data-size="medium" data-href="http://evilnapsis.com/p-<?php echo $post->code; ?>"></div>



</div>
</div>
<hr style="">
<?php $cnt++; endforeach; ?>
</div>
</div>
  </div>

  <div class="col-md-6 col-sm-6">
    <div class="panel panel-default">
<div class="panel-heading">Tecnologia Microsoft</div>
<div class="panel-body">
<?php $cnt=0; foreach($ms_posts as $post):?>
<div class="row">
<?php if($cnt>0&&$post->image!=""):?>
<div class="col-md-3">

    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>

</div>
<?php endif; ?>
<div class="<?php if($cnt>0 && $post->image!=""){ echo "col-md-9";}else{ echo "col-md-12"; } ?>">
  <?php if($cnt==0 && $post->video!=""):?>
  <iframe src="https://youtube.com/embed/<?php echo $post->video; ?>" style="border:0;width:100%;"></iframe>
  <div class="clearfix"></div><br>
<?php elseif($cnt==0 && $post->image!=""):?>
    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>
<?php endif; ?>
<h4  style="margin:0;"><a class="post-title" href="./p-<?php echo $post->code; ?>"><?php echo $post->title; ?></a></h4>
  <?php echo $post->brief; ?>

<div class="clearfix"></div>
<a class="twitter-share-button"
  data-show-count="true"
  href="http://twitter.com"
  data-url="http://evilnapsis.com/p-<?php echo $post->code; ?>">
Tweet
</a>
<div class="g-plusone" data-size="medium" data-href="http://evilnapsis.com/p-<?php echo $post->code; ?>"></div>


</div>
</div>
<hr style="">
<?php $cnt++; endforeach; ?>
</div>
</div>
  </div>

</div>


<!-- - - - - - - -  - - -->
<?php foreach($posts as $post):?>
<div class="row">
<?php if($post->image!=""):?>
<div class="col-md-3">

    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>

</div>
<?php endif; ?>
<div class="<?php if($post->image!=""){ echo "col-md-9";}else{ echo "col-md-12"; } ?>">
<h3 ><a class="post-title" href="./p-<?php echo $post->code; ?>"><?php echo $post->title; ?></a></h3>
<?php if($post->video!=""):?>
  <iframe src="https://youtube.com/embed/<?php echo $post->video; ?>" style="border:0;width:100%;"></iframe>
  <div class="clearfix"></div><br>
<?php endif; ?>
<?php echo $post->brief; ?>
<div class="clearfix"></div>
<a class="twitter-share-button"
  data-show-count="true"
  href="http://twitter.com"
  data-url="http://evilnapsis.com/p-<?php echo $post->code; ?>">
Tweet
</a>
<div class="g-plusone" data-size="medium" data-href="http://evilnapsis.com/p-<?php echo $post->code; ?>"></div>
<p class="text-muted"><i class='fa fa-calendar'></i> <?php echo $post->created_at; ?></p>
</div>
</div>
<hr style="">
<?php endforeach; ?>

		</div>
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
		<div class="col-md-4">
    <!-- - - - - - 
<?php foreach($lectures as $post):
?>

<h3 ><a class="post-title" href="./l-<?php echo $post->code; ?>"><?php echo $post->title; ?></a></h3>
<?php echo  substr($post->content, 0,100); ?>... <a href="./l-<?php echo $post->code; ?>">Leer mas</a>
<hr style="">
<?php endforeach; ?>
-->
    <!-- - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - -->


 <div class="panel panel-default"> 

 <div class="panel-heading"><i class="fa fa-star"></i> Sigueme</div>
<div class="panel-body">
<center><div class="g-person" data-href="//plus.google.com/u/0/116924969481257767095" data-layout="landscape" data-rel="author" style="width:100%;"></div></center>
<hr>
<div class="g-ytsubscribe" data-channel="evilnapsis" data-layout="default" data-count="undefined"></div>
<div class="fb-like" data-href="https://facebook.com/iamevilnapsis" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
<div class="g-plusone" data-size="medium" data-href="http://evilnapsis.com"></div>
<a class="twitter-share-button"
  data-show-count="true"
  href="https://twitter.com/share">
Tweet
</a>
<a class="twitter-follow-button"
  href="https://twitter.com/evilnapsis"
  data-show-count="true"
  data-lang="es">
 @evilnapsis
</a>
</div>
</div>
<?php if(count($topics)>0):?>
 <div class="panel panel-default"> 

 <div class="panel-heading"><i class="fa fa-star"></i> SERIES</div>
<div class="panel-body">
<?php foreach($topics as $topic):?>
    <h4><a class="extra-title" href="./x-<?php echo $topic->code; ?>"><?php echo $topic->name; ?></a></h4>
    <p class="text-muted"><i class="fa fa-th-list"></i> <?php echo $topic->getKind2()->name; ?></p>
<hr>
<?php endforeach; ?>

</div>
</div>
<!-- - - - - -  - - - - - -  - -->
<?php endif; ?>
<div class="panel panel-default">
<div class="panel-heading">
Top 5
</div>
<div class="panel-body">
  <?php 
  $top = PostViewData::getTop5ByKindId(1);
   ?>
<!-- - - - - - - - - - - - - - - - -->
<?php if(count($top)>0):?>
<?php foreach($top as $p):
$post = $p->getPost();
?>
<div class="row">
<?php if($post->image!=""):?>
<div class="col-md-4">
    <img src="<?php echo "storage/images/$post->image";?>" class="img-responsive"/>
</div>
<?php endif; ?>
<div class="<?php if($post->image!=""){ echo "col-md-8";}else{ echo "col-md-12"; } ?>">
<h4><a class="post-title" href="./p-<?php echo $post->code; ?>"><?php echo $post->title; ?></a></h4>

<a class="twitter-share-button"
  data-show-count="true"
  href="http://twitter.com"
  data-url="http://evilnapsis.com/p-<?php echo $post->code; ?>">
Tweet
</a>
<div class="g-plusone" data-size="medium" data-href="http://evilnapsis.com/p-<?php echo $post->code; ?>"></div>

</div>
</div>
<hr style="">
<?php endforeach; ?>
<?php endif; ?>
<!-- - - - - - - - - - - - - - - - -->
</div>
</div>

<!-- - - - - - - - - - - - -  - -->

		</div>
	</div>
<!-- The tag section -->
<div class="row">
<div class="col-md-12">
<?php
$tags = PostTagData::getPrincipals();
?>
<?php if(count($tags)>0):?>
<h2 class="sub-title">Etiquetas</h2>
<hr>
<?php foreach($tags as $tag): ?>
  <a href="javascript:void();" class="btn btn-default"><i class="fa fa-tag"></i> <?php echo $tag->name; ?></a>
<?php endforeach; ?>
<?php endif; ?>
</div>
</div>
</div>
