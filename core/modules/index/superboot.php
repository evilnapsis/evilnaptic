<?php
session_start();


if(isset($_GET["view"])){
	if(!isset($_SESSION["user_id"]) && $_GET["view"]=="home" && $_GET["view"]=="opencourse"&& $_GET["view"]=="admincourse"&& $_GET["view"]=="opentopic"&& $_GET["view"]=="admintopic"&& $_GET["view"]=="openlecture"&& $_GET["view"]=="editlecture"){
		Core::redir("./");
	}
}

// superboot.php
// 14 octubre del 2014
// El codigo siguiente se ejecuta en todas los views y action

// echo "Hello superboot";


?>