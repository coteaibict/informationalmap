<?php
	function Municipio(){
		include "ConexaoDB.php";
		$result="";
		$result .= "Despesas com poderes executivo, legislativo e judiciário,".//valor do select.";";


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