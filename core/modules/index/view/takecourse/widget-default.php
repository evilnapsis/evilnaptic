<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
$course = CourseData::getById($_GET["course_id"]);
$topics = TopicData::getPublicsByCourseId($course->id);
$kind = Kind2Data::getById($course->kind2_id);
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="sub-title"><?php echo $course->name; ?></h2>
			<hr/>


<div class="row">
	<div class="col-md-5">
<br>		<?php echo $course->description; ?>
<br><br>
<p><b>Categoria:</b> <?php echo $course->getCategory()->name; ?> | <b>Nivel:</b> <?php echo $course->getLevel()->name; ?></p>
<br><br>
<?php
$ucs = UserCourseData::getAllByCourseId($course->id);

?>

<br>		<div class="row">
	<div class="col-md-6">
	<?php if(isset($_SESSION["user_id"])):?>
<?php if(UserCourseData::getByUC($_SESSION["user_id"],$course->id)==null):?>
	<a href="index.php?action=takecourse&course_id=<?php echo $course->id; ?>" class="btn pop  btn-primary btn-block" data-container="body" data-toggle="popover" data-placement="top" data-triger="hover" data-content="<?php echo count($ucs);?> personas inscritas.">Tomar <?php echo $kind->name;?></a>
<?php else:?>
	<a href="index.php?view=opencourse&course_id=<?php echo $course->id; ?>" class="btn  btn-success btn-block"><i class="fa fa-check"></i> Ya Registrado</a>
<?php endif;?>
	<?php else:?>

<?php if($course->is_open):?>
	<a href="index.php?view=opencourse&course_id=<?php echo $course->id; ?>" class="btn  btn-success btn-block"><i class="fa fa-folder-open"></i> Abrir</a>
<?php else:?>
	<a href="index.php?view=register" class="btn  btn-default btn-block">Registrate</a>
<?php endif; ?>



	<?php endif; ?>
	</div>
	<div class="col-md-6"><a href="" class="btn  btn-default btn-block">Enviar Mensaje</a></div>
	</div>

	</div>
	<div class="col-md-7">
		<div style="font-size:18px;">Lista de Temas</div>
		<?php foreach($topics as $c):?>
		<div style="font-size:24px;"><?php echo $c->no." - ".$c->name; ?></div>
		<?php echo $c->description; ?>
		<br><br>
		<?php endforeach; ?>
	</div>
</div>


		</div>
		<!-- -->
	</div>
</div>
