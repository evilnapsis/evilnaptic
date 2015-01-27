<?php

if(isset($_SESSION["user_id"])){
	$ucx = UserCourseData::getByUC($_SESSION["user_id"],$_GET["course_id"]);
	if($ucx==null){
		$uc = new UserCourseData();
		$uc->user_id = $_SESSION["user_id"];
		$uc->course_id = $_GET["course_id"];
		$u = $uc->add();
		if(!empty($u)){
		  print "<script>alert('Felicidades te has registrado en este curso exitosamente !!');</script>";  
			Core::redir("index.php?view=opencourse&course_id=".$_GET["course_id"]);
		}else{
			Core::redir("index.php?view=takecourse&course_id=".$_GET["course_id"]);
		}
	}
}

Core::redir("./");
?>