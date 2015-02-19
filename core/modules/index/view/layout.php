<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="utf8"/>
<?php if(isset($_GET["view"]) && $_GET["view"]=="post"):
$post = PostData::getByCode($_GET["code"]);
Core::$post = $post;
?>

<title> <?php echo $post->title; ?> | Evilnapsis </title>

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<?php echo $post->title; ?>">
<meta itemprop="description" content="<?php echo $post->brief; ?>">
<!-- <meta itemprop="image" content="http://www.example.com/image.jpg"> -->

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@evilnapsis">
<meta name="twitter:title" content="<?php echo $post->title; ?>">
<meta name="twitter:description" content="<?php echo $post->brief; ?>">
<meta name="twitter:creator" content="@evilnapsis">
<!-- Twitter summary card with large image must be at least 280x150px -->
<!-- <meta name="twitter:image:src" content="http://www.example.com/image.html"> -->

<!-- Open Graph data -->
<meta property="og:title" content="<?php echo $post->title; ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://www.evilnapsis.com/" />
<!-- <meta property="og:image" content="http://example.com/image.jpg" /> -->
<meta property="og:description" content="<?php echo $post->brief; ?>." />
<meta property="og:site_name" content="Evilnapsis homepage" />
<!-- <meta property="fb:admins" content="Facebook numberic ID" /> -->
<!-- fin de los meta tags -->


<?php else:?>
<title> Evilnapsis .:. Software &amp; Apps Development</title>
<?php endif;?>

<link rel="stylesheet" type="text/css" href="res/bootstrap3/css/bootstrap.min.css">
<script src="res/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="res/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="res/redactor/redactor.css">
  <script src="morris/raphael-min.js"></script>
  <script src="morris/morris.js"></script>
  <link rel="stylesheet" href="morris/morris.css">
  <link rel="stylesheet" href="morris/example.css">
  <link rel="stylesheet" href="res/css  /custom.css">

<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'es'}
</script>

</head>

<body style="background:#fdfdfd;">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=910344122317220&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<header class="clearfix">
<nav class="navbar navbar-default navbar-static-top" role="banner" style="">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand super-title" href="./" style="font-weight:bold;">EVILNɅPSIS</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-large"></i> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="./resume"> Resume</a></li>
          <li><a href="./portfolio"> Portafolio</a></li>
          <li><a href="./about"> Sobre mi</a></li>
        </ul>
      </li><?php if(!isset($_SESSION["user_id"])):?>
          


<?php else:?>
          <li><a href="index.php?view=home"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>

<?php endif; ?>
      </ul>
    <ul class="nav navbar-nav navbar-right">
    <li>
      <form class="navbar-form navbar-left" method="get" action="./index.php" role="search">
      <div class="form-group">
      <input type="hidden" name="view" value="search">
        <input type="text" name="q" class="form-control" placeholder="Buscar posts, temas ..">
      </div>
      <button type="submit" class="btn btn-default">Buscar</button>
    </form>

    </li>
<?php if(!isset($_SESSION["user_id"])):?>
<!--
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sobre mi <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=page1"><i class="fa fa-book"></i> PORTAFOLIO</a></li>
          <li><a href="index.php?view=page1"><i class="fa fa-wrench"></i> CV</a></li>
        </ul>
      </li>
      -->
<!--      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unete <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=login">Ingresar</a></li>
          <li><a href="index.php?view=register">Registro</a></li>
        </ul>
      </li>
-->
<?php else:
$user = UserData::getById($_SESSION["user_id"]);
$comments = CommentData::getUnReads();
?>
<!--          <li><a data-toggle="modal" href="#myModal"><i class="fa fa-bug"></i> Bug</a></li> -->
<?php if(count($comments)>0):?>
<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-comment"></i><sup><span class="label label-danger"><small><?php echo count($comments);?></small></span></sup> <b class="caret"></b></a>
        <ul class="dropdown-menu">
<?php foreach($comments as $c):?>
          <li><a href="javascript:void()"><i class="fa fa-comment"></i> <?php echo $c->email." | ".$c->comment;?></a></li>
<?php endforeach; ?>
          <li><a href="./index.php?view=comments"><i class="fa fa-th-list"></i> Todos los Comentarios</a></li>
        </ul>
      </li>
<?php endif; ?>
<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-large"></i> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="./index.php?view=viewposts"><i class="fa fa-th-list"></i> Posts</a></li>
          <li><a href="./index.php?view=comments"><i class="fa fa-th-list"></i> Comentarios</a></li>
        </ul>
      </li>
              <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->name." ".$user->lastname; ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=home">Dashboard</a></li>
<?php if($user->is_admin):?>
          <li><a href="index.php?view=newpost">Nuevo articulo</a></li>
          <li><a href="index.php?view=newcourse">Nuevo curso</a></li>
<?php endif; ?>
          <li><a href="logout.php">Salir</a></li>
        </ul>
      </li>





<?php endif; ?>
    </ul>

    </nav>
  </div>
  </nav>
</header>
<div class="clearfix"></div>
<?php 
	View::load("index");
?>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Reportar un BUG</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="index.php?action=addbug">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Seccion</label>
    <div class="col-lg-10">
      <input type="text" name="title" class="form-control" id="inputEmail1" placeholder="Seccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
      <textarea class="form-control redactor" rows="3" name="content" id="inputPassword1" placeholder="Descripcion del BUG"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"  name="is_important"> Afecta directamente el uso del sistema
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default btn-block"><i class="fa fa-bug"></i> Reportar bug</button>
    </div>
  </div>
</form>
</div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<br>
<section style="background:#f0f0f0;">
<br>  <div class="container">
  <div class="row">
    <div class="col-md-12">
</div>
</div>
  <div class="row">
    <div class="col-md-6">
    <h4>I AM EVILNAPSIS</h4>

  <div class="row">
    <div class="col-md-2 col-xs-2">
    <img src="imgs/yo.png" class="img-circle img-responsive img-thumbnail">
    </div>
    <div class="col-md-10 col-xs-10">
    <p>Soy Agustin Ramos Escalante un desarrollador de software freelance, mi combinacion de tecnologias favoritas en PHP + MySQL + Bootstrap, desarrollo aplicaciones para empresas.</p>
    </div>

    </div>

    </div>

    <div class="col-md-3">
    <h4>SOBRE MI</h4>
    <ul>
      <li><a href="./about">Sobre mi</a> </li>
      <li><a href="./magazine">Magazine</a> </li>
      <li><a href="./resume">Curriculum</a> </li>
      <li><a href="./portfolio">Portafolio</a> </li>
    </ul>
<br>    <h4>MAS</h4>
    <ul>
      <li><a href="http://inflask.com">InFlask</a> </li>
      <li><a href="http://entabasco.com">EnTabasco</a> </li>
      <li><a href="http://klimbr.com">Klimbr</a> </li>
    </ul>

    </div>

    <div class="col-md-3">
    <a href="" class="btn btn-primary">SUSCRIBETE!</a>
<br>    <h4>RECURSOS</h4>
    <ul>
      <li><a href="./downloads">Descargas</a> </li>
    </ul>
<br>
    <h4>REDES SOCIALES</h4>
    <ul>
      <li><a href="https://facebook.com/iamevilnapsis">Facebook</a> </li>
      <li><a href="https://twitter.com/evilnapsis">Twitter</a> </li>
      <li><a href="https://github.com/evilnapsis">GitHub</a> </li>
    </ul>
    </div>

  </div>
    <div class="row">
    <div class="col-md-12">
    <p class="text-muted">Evilnapsis &copy; 2015. Todos los derechos reservados</p>
</div>
</div>

  </div>
<br>

</section>
<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>

<script src="res/bootstrap3/js/bootstrap.min.js"></script>
<script src="res/redactor/redactor.min.js"></script>

<script type="text/javascript">


  $(document).ready(
    function()
    {
      $('.redactor').redactor();
    }
  );
  $(".tip").tooltip();
  $(".pop").popover({"trigger":"hover"});
  </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53190109-1', 'auto');
  ga('send', 'pageview');

</script>
</body>

</html>