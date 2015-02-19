<?php

if($_SESSION["user_id"]!=""){
	$user= UserData::getById($_SESSION["user_id"]);
	if($user!=null&&$user->is_admin){
		$course = SlideData::getById($_POST["slide_id"]);

		$course->title = $_POST["title"];
        $course->title_link = $_POST["title_link"];
        $course->subtitle = $_POST["subtitle"];
        $course->subtitle_link = $_POST["subtitle_link"];
        $course->video = $_POST["video"];
        $course->link = $_POST["link"];
        $course->position = $_POST["position"];

        $course->button_text = $_POST["button_text"];
        $course->button_class = $_POST["button_class"];
        $course->button_link = $_POST["button_link"];

    		$handle = new Upload($_FILES['image']);
        	if ($handle->uploaded) {
        		$url="storage/slides/";
            	$handle->Process($url);
                $course->image = $handle->file_dst_name;
    		}

		if(isset($_POST["is_public"])){ $course->is_public=1; }else{ $course->is_public=0; }
		// $course->user_id=$_SESSION["user_id"];
		$c=$course->update();

		Core::redir("index.php?view=editslide&slide_id=".$_POST["slide_id"]);
	}
}

?>