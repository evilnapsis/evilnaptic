<?php

if($_SESSION["user_id"]!=""){
	$user= UserData::getById($_SESSION["user_id"]);
	if($user!=null&&$user->is_admin){
		$course = CourseData::getById($_POST["course_id"]);
		$course->name = $_POST["name"];
		$course->description = $_POST["description"];
		$course->category_id = $_POST["category_id"];
		$course->level_id = $_POST["level_id"];
		$course->kind2_id = $_POST["kind2_id"];
		$course->user_id = $_SESSION["user_id"];
		if(isset($_POST["is_public"])){ $course->is_public=1; }else{ $course->is_public=0; }
		if(isset($_POST["is_principal"])){ $course->is_principal=1; }else{ $course->is_principal=0; }
		if(isset($_POST["is_open"])){ $course->is_open=1; }else{ $course->is_open=0; }
		$c=$course->update();
		Core::redir("index.php?view=admincourse&course_id=".$_POST["course_id"]);
	}
}

?>