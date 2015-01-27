<?php
$lecture = LectureData::getById($_GET["lecture_id"]);
$topic = TopicData::getById($lecture->topic_id);
$course = CourseData::getById($topic->course_id);
if(!$course->is_open){
if(UserCourseData::getByUC($_SESSION["user_id"],$course->id)==null){
  print "<script>alert('No estas inscrito en este curso !!');</script>";  
  Core::redir("index.php?view=takecourse&course_id=".$course->id);
}
}

// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<div class="container">

  <div class="row">
    <div class="col-md-12">
    <h3><?php echo $lecture->title; ?></h3>
    <ol class="breadcrumb">
  <li><a href="index.php?view=home">Inicio</a></li>
  <li><a href="index.php?view=opencourse&course_id=<?php echo $course->id; ?>"><?php echo $course->name; ?></a></li>
  <li><a href="index.php?view=opentopic&topic_id=<?php echo $topic->id; ?>"><?php echo $topic->name; ?></a></li>
  <li class="active"><?php echo $lecture->title;?></li>
</ol>

<hr>
</div>
</div>
	<div class="row">

		<div class="col-md-9">
      <?php echo ($lecture->content); ?>
      <!-- Button trigger modal -->

  <hr>

<?php if(isset($_SESSION["iser_id"])):?>
  <a data-toggle="modal" href="#myModal" class="btn btn-default pull-right"><i class="fa fa-question"></i> Hacer una pregunta</a>
<?php endif; ?>
      <p class="lead">Preguntas</p>
<?php
$questions = QuestionData::getPublicsByLectureId($lecture->id);
?>
<?php if(count($questions)>0):?>

<table class="table table-bordered">
<thead>
  <th>Usuario</th>
  <th>Pregunta</th>
  <th>Respuesta</th>
  <th>Fecha</th>
</thead>

<?php foreach($questions as $lf):?>
<tr>
  <td><?php echo $lf->getUser()->name." ".$lf->getUser()->lastname; ?></td>
      <td><?php echo $lf->question; ?></td>
      <td><?php echo $lf->answer;?></td>
      <td><?php echo $lf->created_at; ?></td>
</tr>
<?php 
$lf->read();
endforeach;?>
</table>

<?php else:?>
<p class="alert alert-info">Aun no hay preguntas</p>
<?php endif; ?>
<p class="text-muted">* Las preguntas importantes se publican aqui</p>
<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Nueva pregunta</h4>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" role="form" method="post" action="index.php?action=makequestion">
  <div class="form-group">
    <div class="col-lg-12">
      <textarea name="description" class="form-control" id="inputEmail1" placeholder="Escribe tu pregunta"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
    <input type="hidden" name="lecture_id" value="<?php echo $_GET["lecture_id"];?>">
      <button type="submit" class="btn btn-block btn-default">Enviar pregunta</button>
    </div>
  </div>
</form>
        </div>
       
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  


  	</div>
		<div class="col-md-3">
<?php if(isset($_SESSION["user_id"])):?>
    <h4>Retroalimentacion</h4>
<?php $lf = LectureFeedbackData::getByLU($_GET["lecture_id"],$_SESSION["user_id"]);?>
<?php if($lf==null):?>
    <form class="form-horizontal" role="form" method="post" action="index.php?action=calify">
  <div class="form-group">
    <div class="col-md-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_readed"> He leido completamente
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_understanded"> He entendido completamente
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_calified"> Calificar esta lectura
        </label>
      </div>
    </div>
  </div>
   <div class="form-group">
       <div class="col-md-12">

    <label for="exampleInputEmail1">Calificacion (0-5)=<span id="cal"><b>0</b></span></label>
    <input type="range" value="0" min="0" max="5" step="0.1" name="calification" id="calification">
    </div>
  </div>
   <div class="form-group">
    <div class="col-md-12">
    <label for="exampleInputEmail1">Comentario</label>
    <textarea  class="form-control" name="comment" id="exampleInputEmail1" placeholder="Que opinas de esta lectura ??"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12">
    <input type="hidden" name="lecture_id" value="<?php echo $_GET["lecture_id"];?>">
      <button type="submit" class="btn btn-block btn-warning"><i class="fa fa-retweet"></i> Retoalimentar</button>
    </div>
  </div>
<script>
  $("#calification").change(function(){ $("#cal").html("<b>"+$("#calification").val()+"</b>"); });
</script>
</form>
<?php else:?>
  <table class="table table-bordered">
    <tr>
      <td>Leido Completamente</td>
      <td><?php if($lf->is_readed):?><i class="fa fa-check-circle"></i><?php else:?><i class="fa fa-remove-circle"></i><?php endif; ?></td>
    </tr>
    <tr>
      <td>Entendido Completamente</td>
      <td><?php if($lf->is_understanded):?><i class="fa fa-check-circle"></i><?php else:?><i class="fa fa-remove-circle"></i><?php endif; ?></td>
    </tr>
<?php if($lf->is_calified):?>
    <tr>
      <td>Calificacion</td>
      <td><?php echo $lf->calification; ?></td>
    </tr>
    <tr>
      <td>Comentario</td>
      <td><?php echo $lf->comment; ?></td>
    </tr>
<?php endif; ?>
  </table>
  <?php endif; ?>
  <?php endif; ?>
    </div>
</div>
