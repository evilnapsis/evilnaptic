<?php
$user=UserData::getById($_SESSION["user_id"]);
 if($user!=null&&$user->is_admin){

if(!empty($_GET)){
	$comment = CommentData::getById($_GET["id"]);
	if($_GET["st"]=="1"||$_GET["st"]=="2"||$_GET["st"]=="3"||$_GET["st"]=="4"){
		$comment->status = $_GET["st"];
		$comment->set_status();
	}
	Core::redir("./index.php?view=comments");
}
}

?>