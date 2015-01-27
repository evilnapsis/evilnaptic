<?php

$question = new BugData();
$question->title = $_POST["title"];
$question->content = $_POST["content"];
if(isset($_POST["is_important"])){ $question->is_important=1;}else{ $question->is_important=0; }
$question->user_id = $_SESSION["user_id"];
$question->add();


Core::redir("index.php?view=home");

?>