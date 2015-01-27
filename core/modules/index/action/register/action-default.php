<?php 

if(!empty($_POST)){
	$user = UserData::getByEmail($_POST["email"]);
	if($user==null){
		$person = new UserData();
		$person->name = $_POST["name"];
		$person->lastname = $_POST["lastname"];
		$person->email = $_POST["email"];
		$person->password = sha1(md5($_POST["password"]));
		$person->add();
		print "<script>alert(\"Usuario $_POST[name] $_POST[lastname] registrado Exitosamente, Ahora inicia sesion!!!\");</script>";
		Core::redir("index.php?view=login");
	}else{
		print "<script>alert(\"Usuario ya esta registrado !!!\");</script>";
		Core::redir("index.php?view=login");
	}
}




Core::redir("./");

?>