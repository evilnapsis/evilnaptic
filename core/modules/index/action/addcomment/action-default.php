<?php
if(!empty($_POST)){
$c = new CommentData();
$c->name = $_POST["name"];
$c->email = $_POST["email"];
$c->comment = $_POST["comment"];
$c->ref_id = $_POST["ref_id"];
$c->entry_id = $_POST["entry_id"];
$c->status = 1;
$c->add();
if($_POST["ref_id"]==1){
	$post = PostData::getById($_POST["entry_id"]);
	Core::redir("./p-".$post->code);
}
}
?>