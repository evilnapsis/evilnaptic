<?php
$user=UserData::getById($_SESSION["user_id"]);
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
?>
<?php if($user!=null&&$user->is_admin):?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
<h3>Comentarios</h3>
<div class="btn-toolbar">
	<div class="btn-group">
	<a href="./index.php?view=newpost" class="btn btn-default"><i class="fa fa-file"></i></a>
	</div>
	<div class="btn-group">
	<a href="./index.php?view=viewposts" class="btn btn-default"><i class="fa fa-th-list"></i></a>
	</div>
</div>
<br>
<table class="table table-bordered">
<thead>
<th></th>
	<th>Nombre</th>
	<th>Entrada</th>
	<th>Comentario</th>
	<th>Status</th>
	<th>Fecha</th>
	<th></th>
</thead>
<?php foreach(CommentData::getAll() as $c):?>
<tr>
<td style="width:30px;">
	<?php if($c->is_readed):?>
		<i class="fa fa-check-circle"></i>
	<?php endif; ?>
</td>
<td><?php echo $c->name;?> | <?php echo $c->email?></td>
<td><?php echo $c->getEntry()->title; ?></td>
<td><?php echo $c->comment;?></td>
<td><?php echo $c->getStatus();?></td>
<td><?php echo date("d-M-Y h:i:s",strtotime($c->created_at));?></td>
<td>
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    Accion <span class="caret"></span>
  </button>
  <ul class="dropdown-menu pull-right" role="menu">
    <li><a href="./index.php?action=setcommentstatus&id=<?php echo $c->id; ?>&st=1">Pendiente</a></li>
    <li><a href="./index.php?action=setcommentstatus&id=<?php echo $c->id; ?>&st=2">Aprobar y mostrar</a></li>
    <li><a href="./index.php?action=setcommentstatus&id=<?php echo $c->id; ?>&st=3">Aprobay y no mostrar</a></li>
    <li class="divider"></li>
    <li><a href="./index.php?action=setcommentstatus&id=<?php echo $c->id; ?>&st=4">Rechazar</a></li>
  </ul>
</div>


<a href="index.php?view=editpost&post_id=<?php echo $c->id; ?>"><?php if($c->is_public){ echo "<i class='fa fa-check-circle-o tip' title='Publico'></i>"; }?> <?php echo $c->title; ?></a></td>
</tr>
<?php
$c->read();
 endforeach; ?>
</table>
		</div>
		
	</div>

</div>
<?php endif; ?>


<br><br><br><br><br>