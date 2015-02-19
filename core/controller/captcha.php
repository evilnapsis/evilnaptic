<?php
//
//session_start();

$limit = 100;

$_SESSION["num1"] = rand(1,$limit);
$_SESSION["num2"] = rand(1,$limit);

function show(){
	return $_SESSION["num1"]." + ".$_SESSION["num2"];
}

?>
