<?php

if($_SESSION["user_id"]!=""){
	$user= UserData::getById($_SESSION["user_id"]);
	if($user!=null&&$user->is_admin){
		$course = PostData::getById($_POST["post_id"]);
		$course->title = $_POST["title"];
		$course->brief = mysql_escape_string($_POST["brief"]);
		$course->content = mysql_escape_string($_POST["content"]);
    		$handle = new Upload($_FILES['image']);
        	if ($handle->uploaded) {
        		$url="storage/images/";
            	$handle->Process($url);
                $course->image = $handle->file_dst_name;
    		}

		if(isset($_POST["is_public"])){ $course->is_public=1; }else{ $course->is_public=0; }
		if(isset($_POST["is_principal"])){ $course->is_principal=1; }else{ $course->is_principal=0; }
		if(isset($_POST["is_sidebar"])){ $course->is_sidebar=1; }else{ $course->is_sidebar=0; }
		$course->cat_id = $_POST["cat_id"];
		$course->kind_id = $_POST["kind_id"];
		// $course->user_id=$_SESSION["user_id"];
		$c=$course->update();
    	/////////////////// the tag update
    		if($_POST["tags"]!=""){
    			$tags = explode(",", $_POST["tags"]);
    			foreach ($tags as $tag) {
    				$e = TagData::getByName($tag);
    				if($e==null){
    					$e = new TagData();
    					$e->name = $tag;
    					$id = $e->add();
    					$e->id=$id[1];
    				}
    				if(PostTagData::getByPT($_POST["post_id"],$e->id)==null){
    					$pt = new PostTagData();
    					$pt->post_id = $_POST["post_id"];
    					$pt->tag_id = $e->id;
    					$pt->add();
    				}
    			}
    		}
    	//////////////////

		Core::redir("index.php?view=editpost&post_id=".$_POST["post_id"]);
	}
}

?>