<?php

print_r($_POST);
$question = QuestionData::getById($_POST["question_id"]);
$question->answer = $_POST["answer"];
if(isset($_POST["is_public"])){ $question->is_public=1;}else{ $question->is_public=0; }
$question->answer();

Core::redir("index.php?view=questions&lecture_id=".$question->lecture_id);

?>