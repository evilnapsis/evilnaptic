<?php
// print_r($_SERVER["PHP_SELF"]);
// print_r($_SESSION);
$courses = CourseData::getPublics();
$categories = CategoryData::getAll();
$levels = LevelData::getAll();
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
    <h2>Todos los cursos</h2>
<hr>
		</div>
	</div>
	<div class="row">
    <div class="col-md-3">

<?php if(count($categories)>0):?>
<div class="panel panel-default">
<div class="panel-heading">Categorias</div>

<div class="list-group">

<?php foreach($categories as $course):?>

  <a href="javascript:void()" class="list-group-item">
    <?php echo $course->name; ?>
  </a>

<?php endforeach; ?>
</div>
</div>

<?php endif; ?>

<?php if(count($levels)>0):?>
<div class="panel panel-default">
<div class="panel-heading">Categorias</div>

<div class="list-group">

<?php foreach($levels as $course):?>

  <a href="javascript:void()" class="list-group-item">
    <?php echo $course->name; ?>
  </a>

<?php endforeach; ?>
</div>
</div>

<?php endif; ?>

    </div>
    <div class="col-md-9">
<?php if(count($courses)>0):?>
<?php foreach($courses as $course):?>
    <h3><?php echo $course->name; ?></h3>

    <p class="list-group-item-text"><?php echo $course->description; ?></p>
<br><p><b>Categoria:</b> <?php echo $course->getCategory()->name; ?> | <b>Nivel:</b> <?php echo $course->getLevel()->name; ?></p>

<br>  <a href="index.php?view=takecourse&course_id=<?php echo $course->id; ?>" class="btn btn-primary">Informarcion del Curso</a>
<hr>
<?php endforeach; ?>

<?php endif; ?>
		</div>
		<!-- -->

		<!-- -->
	</div>
</div>
