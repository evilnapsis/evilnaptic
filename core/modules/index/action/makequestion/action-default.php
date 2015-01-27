<?php

// print_r($_POST);

$question = new QuestionData();
$question->question = $_POST["description"];
$question->lecture_id = $_POST["lecture_id"];
$question->user_id = $_SESSION["user_id"];
$question->add();

Core::redir("index.php?view=openlecture&lecture_id=".$_POST["lecture_id"]);
?>