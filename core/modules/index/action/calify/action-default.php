<?php
// print_r($_POST);
$lu = LectureFeedbackData::getByLU($_POST["lecture_id"],$_SESSION["user_id"]);

if($lu==null){
$lf = new LectureFeedbackData();
if(isset($_POST["is_readed"])){ $lf->is_readed=1;}else{ $lf->is_readed=0; }
if(isset($_POST["is_understanded"])){ $lf->is_understanded=1;}else{ $lf->is_understanded=0; }
if(isset($_POST["is_calified"])){ $lf->is_calified=1;}else{ $lf->is_calified=0; }
$lf->calification = $_POST["calification"];
$lf->comment = $_POST["comment"];
$lf->lecture_id =$_POST["lecture_id"];
$lf->user_id =$_SESSION["user_id"];
$lf->add();
}
Core::redir("index.php?view=openlecture&lecture_id=".$_POST["lecture_id"]);
?>