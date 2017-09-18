<?php
	function Municipio(){
		include "ConexaoDB.php";
		$result = '';

		mysqli_close($con);
		echo $result;
	}

	function MesoRegiao(){
		include "ConexaoDB.php";
		$result = '';

		mysqli_close($con);
		echo $result;
	}

	function Estado(){
		include "ConexaoDB.php";
		$result = '';

		mysqli_close($con);
		echo $result;
	}

	if($_GET["tipoDivisao"] == "M")
		Municipio();
	else if	($_GET["tipoDivisao"] == "MR")
		MesoRegiao();
	else
		Estado();



?>