<?php
if(count($_GET)>0){
$cat = ImageData::getById($_GET["image_id"]);
$p = $cat->project_id;
$cat->del();

Core::redir("index.php?view=openproject&project_id=".$p);
}
?>