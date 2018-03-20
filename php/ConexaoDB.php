<?php
	
	$con = new mysqli('192.168.0.129', 'usobapl', '@_usobap_@','obapl', '3306');
	if (mysqli_connect_errno()){
	  die ("Falha ao se conectar com MySql: " . mysqli_connect_error());
	}
	if (!$con->set_charset("utf8")) {
    	printf("Error loading character set utf8: %s\n", $mysqli->error);
    	exit();
    }
?>
