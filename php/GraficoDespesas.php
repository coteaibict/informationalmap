<?php
	function Municipio(){
		include "ConexaoDB.php";
		
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