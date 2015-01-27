<?php
// print_r($_POST);
$product =  new ImageData();


$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$code = "";
for($i=0;$i<12;$i++){
	$code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
$product->code= $code;


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

$product->add();

Core::redir("index.php?view=openproject&project_id=".$_POST["project_id"]);

?>