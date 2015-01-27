<?php
// print_r($_POST);
$product =  ImageData::getById($_POST["image_id"]);



foreach ($_POST as $k => $v) {
	$product->$k = $v;
	# code...
}


    		$handle = new Upload($_FILES['image']);
        	if ($handle->uploaded) {
        		$url="storage/projects/".$_POST["project_id"];
            	$handle->Process($url);
                $product->image = $handle->file_dst_name;
    		}

if(isset($_POST["is_public"])) { $product->is_public=1; }else{ $product->is_public=0; }
if(isset($_POST["is_principal"])) { $product->is_principal=1; }else{ $product->is_principal=0; }
if(isset($_POST["is_slide"])) { $product->is_slide=1; }else{ $product->is_slide=0; }
// if(isset($_POST["in_existence"])) { $product->in_existence=1; }else{ $product->in_existence=0; }

// $product->name = $_POST["name"];

$product->update();

Core::redir("index.php?view=editimage&image_id=".$_POST["image_id"]);

?>