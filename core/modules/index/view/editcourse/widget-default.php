<?php
$course = CourseData::getById($_GET["course_id"]);
?>
<div class="container">
	<div class="row">

		<div class="col-md-12">
		<h2><?php echo $course->name; ?> <small>Ediar</small></h2>

		</div>
		
	</div>

</div>
