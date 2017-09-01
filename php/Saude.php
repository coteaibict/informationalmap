<?php
	function QntMedicos(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function RecursosSaude(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	if ($_GET["variavel"] == 'Quantidade de Médicos'){
		QntMedicos();
	}
	else if ($_GET["variavel"] == 'Recursos humanos da área da saúde'){
		RecursosSaude();
	}
?>