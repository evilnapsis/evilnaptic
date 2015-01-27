<?php

if($_SESSION["user_id"]!=""){
	$user= UserData::getById($_SESSION["user_id"]);
	if($user!=null&&$user->is_admin){
		$course = new CourseData();
		$course->name = $_POST["name"];
		$course->description = $_POST["description"];
		$course->category_id = $_POST["category_id"];
		$course->level_id = $_POST["level_id"];
		$course->user_id = $_SESSION["user_id"];
		$course->kind2_id = $_POST["kind2_id"];
		$c=$course->add();
		Core::redir("index.php?view=admincourse&course_id=".$c[1]);
	}
}

?>