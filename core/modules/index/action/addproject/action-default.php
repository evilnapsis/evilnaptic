<?php
// print_r($_POST);
$product =  new ProjectData();
foreach ($_POST as $k => $v) {
	$product->$k = mysql_real_escape_string($v);
	# code...
}
/*    		$handle = new Upload($_FILES['image']);
        	if ($handle->uploaded) {
        		$url="storage/products/";
            	$handle->Process($url);

                $product->image = $handle->file_dst_name;
    		}
*/
if(isset($_POST["is_public"])) { $product->is_public=1; }else{ $product->is_public=0; }
// if(isset($_POST["in_existence"])) { $product->in_existence=1; }else{ $product->in_existence=0; }

// $product->name = $_POST["name"];

$product->add();

 Core::redir("index.php?view=projects");

?>