<?php

if($_SESSION["user_id"]!=""){
	$user= UserData::getById($_SESSION["user_id"]);
	if($user!=null&&$user->is_admin){
		$course = new LectureData();

$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$code = "";
for($i=0;$i<11;$i++){
    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
        $course->code= $code;

		$course->title = $_POST["title"];
		$course->content = mysql_escape_string($_POST["content"]);
		if(isset($_POST["is_public"])){ $course->is_public=1; }else{ $course->is_public=0; }
		$course->topic_id = $_POST["topic_id"];
		$c=$course->add();
		Core::redir("index.php?view=editlecture&lecture_id=".$c[1]);
	}
}

?>