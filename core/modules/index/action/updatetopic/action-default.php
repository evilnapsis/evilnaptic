<?php

if($_SESSION["user_id"]!=""){
	$user= UserData::getById($_SESSION["user_id"]);
	if($user!=null&&$user->is_admin){
		$course = TopicData::getById($_POST["topic_id"]);
		$course->name = $_POST["name"];
		$course->description = $_POST["description"];
		if(isset($_POST["is_public"])){ $course->is_public=1; }else{ $course->is_public=0; }
		$c=$course->update();
		Core::redir("index.php?view=admintopic&topic_id=".$_POST["topic_id"]);
	}
}

?>