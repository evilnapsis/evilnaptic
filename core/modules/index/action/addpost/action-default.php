<?php

if($_SESSION["user_id"]!=""){
	$user= UserData::getById($_SESSION["user_id"]);
	if($user!=null&&$user->is_admin){
		$course = new PostData();


$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$code = "";
for($i=0;$i<11;$i++){
    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
        $course->code= $code;
		$course->title = $_POST["title"];
		$course->brief = mysql_escape_string($_POST["brief"]);
		$course->content = mysql_escape_string($_POST["content"]);

    		$handle = new Upload($_FILES['image']);
        	if ($handle->uploaded) {
        		$url="storage/images/".$_POST["project_id"];
            	$handle->Process($url);
                $course->image = $handle->file_dst_name;
    		}


		if(isset($_POST["is_public"])){ $course->is_public=1; }else{ $course->is_public=0; }
		if(isset($_POST["is_principal"])){ $course->is_principal=1; }else{ $course->is_principal=0; }
		if(isset($_POST["is_sidebar"])){ $course->is_sidebar=1; }else{ $course->is_sidebar=0; }
        if(isset($_POST["show_image"])){ $course->show_image=1; }else{ $course->show_image=0; }
        $course->video = $_POST["video"];
		$course->cat_id = $_POST["cat_id"];
		$course->kind_id = $_POST["kind_id"];
		$course->user_id=$_SESSION["user_id"];
		$c=$course->add();
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
                        $e = TagData::getByName($tag);
    				}
    				if(PostTagData::getByPT($c[1],$e->id)==null){
    					$pt = new PostTagData();
    					$pt->post_id = $c[1];
    					$pt->tag_id = $e->id;
    					$pt->add();
    				}
    			}
    		}
    	//////////////////

		Core::redir("index.php?view=editpost&post_id=".$c[1]);
	}
}

?>