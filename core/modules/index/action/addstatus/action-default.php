<?php

if($_SESSION["user_id"]!=""){
	$user= UserData::getById($_SESSION["user_id"]);
	if($user!=null&&$user->is_admin){
		$course = new StatusData();


$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$code = "";
for($i=0;$i<11;$i++){
    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
        $course->code= $code;
		$course->brief = mysql_escape_string($_POST["brief"]);

    		$handle = new Upload($_FILES['image']);
        	if ($handle->uploaded) {
        		$url="storage/images/".$_POST["project_id"];
            	$handle->Process($url);
                $course->image = $handle->file_dst_name;
    		}


		if(isset($_POST["is_public"])){ $course->is_public=1; }else{ $course->is_public=0; }
		$course->user_id=$_SESSION["user_id"];
		$c=$course->add();

		Core::redir("index.php?view=editstatus&status_id=".$c[1]);
	}
}

?>