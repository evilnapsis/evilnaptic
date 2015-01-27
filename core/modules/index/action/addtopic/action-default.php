<?php

if($_SESSION["user_id"]!=""){
	$user= UserData::getById($_SESSION["user_id"]);
	if($user!=null&&$user->is_admin){
		$course = new TopicData();
		$course->no = $_POST["no"];
		$course->name = $_POST["name"];
		$course->description = $_POST["description"];
		$course->course_id = $_POST["course_id"];
		$c=$course->add();
		Core::redir("index.php?view=admintopic&topic_id=".$c[1]);
	}
}

?>