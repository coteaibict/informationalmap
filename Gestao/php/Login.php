<?php
	include("Autenticacao/Config.php");
	include("Autenticacao/Auth.php");

	$dbh = new PDO("mysql:host=192.168.0.129;dbname=obapl", "usobapl", "@_usobap_@");

	$config = new PHPAuth\Config($dbh);
	$auth   = new PHPAuth\Auth($dbh, $config);

	echo implode("|",$auth->login($_POST["usr"],$_POST["psw"]));


?>