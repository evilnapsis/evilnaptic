<?php
// print_r($_POST);
$product =  ProjectData::getById($_POST["project_id"]);
foreach ($_POST as $k => $v) {
	$product->$k = mysql_escape_string($v);
	# code...
}

if(isset($_POST["is_public"])) { $product->is_public=1; }else{ $product->is_public=0; }
if(isset($_POST["is_principal"])) { $product->is_principal=1; }else{ $product->is_principal=0; }

// $product->name = $_POST["name"];

 $product->update();
$_SESSION["product_updated"]= 1;
 Core::redir("index.php?view=editproject&project_id=".$_POST["project_id"]);

?>