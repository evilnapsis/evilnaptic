<html>
<head>
<meta charset="utf8"/>
<title>Evilnapsis HomePage</title>

<link rel="stylesheet" type="text/css" href="res/bootstrap3/css/bootstrap.min.css">
<script src="res/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="res/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="res/redactor/redactor.css">
<style type="text/css">
  hr{
    border-color:#f0f0f0;border-style:dashed;
  }
/*
  .super-title,.post-title:hover{
    color:#3498db;
    text-decoration: none;
    font-weight:bold;
  }


  .post-title,.post-title:hover{
    color:yellow;
    text-decoration: none;
    font-weight:bold;
    -webkit-text-stroke: 2px black;
    -moz-text-stroke: 2px black;
    -o-text-stroke: 2px black;
    text-stroke: 2px black;
  }
  .extra-title,.extra-title:hover{
    color:blue;
    text-decoration: none;
    font-weight:bold;
    -webkit-text-stroke: 2px black;
    -moz-text-stroke: 2px black;
    -o-text-stroke: 2px black;
    text-stroke: 2px black;
  }
  .sub-title,.sub-title:hover{
    color:orange;
    text-decoration: none;
    font-weight:bold;
    -webkit-text-stroke: 2px black;
    -moz-text-stroke: 2px black;
    -o-text-stroke: 2px black;
    text-stroke: 2px black;
  }

  .box.box-one {
    border: 2px orange solid;
  }
  .box {

  }
  .box.box-one .box-title{
    padding:10px;
    background:orange;
    color:white;
    font-weight: bold;
  }

  .box .box-body{
    padding:10px;
  }
*/
</style>
</head>
<?php 
/// print_r($_GLOBAL); 
?>
<body>
<header class="navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand super-title" href="./">Evilnapsis</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
<?php if(!isset($_SESSION["user_id"])):?>
          <li><a href="./"><i class="fa fa-coffee"></i> Inicio</a></li>
          
<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-large"></i> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="./"><i class="fa fa-code"></i> Programacion</a></li>
          <li><a href="./"><i class="fa fa-rocket"></i> StartUps</a></li>
          <li><a href="./"><i class="fa fa-laptop"></i> Tecnologia</a></li>
          <li><a href="./"><i class="fa fa-mobile-phone"></i> Mobile</a></li>
        </ul>
      </li>

<?php else:?>
          <li><a href="index.php?view=home"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
<?php endif; ?>
      </ul>
    <ul class="nav navbar-nav navbar-right">
    <li>
      <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
      <input type="hidden" name="view" value="search">
        <input type="text" name="q" class="form-control" placeholder="Buscar posts, temas ..">
      </div>
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
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unete <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=login">Ingresar</a></li>
          <li><a href="index.php?view=register">Registro</a></li>
        </ul>
      </li>

<?php else:
$user = UserData::getById($_SESSION["user_id"]);
?>
<!--          <li><a data-toggle="modal" href="#myModal"><i class="fa fa-bug"></i> Bug</a></li> -->
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->name." ".$user->lastname; ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=home">Dashboard</a></li>
          <li><a href="index.php?view=newpost">Nuevo articulo</a></li>
          <li><a href="index.php?view=newcourse">Nuevo curso</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
      </li>





<?php endif; ?>
    </ul>

    </nav>
  </div>
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
<section>
  <div class="container">
  <div class="row">
    <div class="col-md-12"><hr>
</div>
</div>
  <div class="row">
    <div class="col-md-6">
    <h4>I AM EVILNAPSIS</h4>

  <div class="row">
    <div class="col-md-2">
    <img src="imgs/yo.png" class="img-circle img-responsive img-thumbnail">
    </div>
    <div class="col-md-10">
    <p>Soy Agustin Ramos Escalante un desarrollador de software freelance, mi combinacion de tecnologias favoritas en PHP + MySQL + Bootstrap, desarrollo aplicaciones para empresas.</p>
    </div>

    </div>

    </div>

    <div class="col-md-3">
    <h4>SOBRE MI</h4>
    <ul>
      <li><a href="./about">Sobre mi</a> </li>
      <li><a href="./resume">Curriculum</a> </li>
      <li><a href="./portfolio">Portafolio</a> </li>
    </ul>
    </div>

    <div class="col-md-3">
    <h4>REDES SOCIALES</h4>
    <ul>
      <li><a href="https://facebook.com/iamevilnapsis">Facebook</a> </li>
      <li><a href="https://twitter.com/evilnapsis">Twitter</a> </li>
      <li><a href="https://github.com/evilnapsis">GitHub</a> </li>
    </ul>
    </div>

  </div>
  </div>
</section>
<br>
<br>
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