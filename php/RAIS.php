<?php
	function ExtrativaMineral(){
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
	function IndustriaTransformacao(){
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

	function ServicosIndustriais(){
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

	function ConstrucaoCivil(){
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

	function Comercio(){
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

	function Servicos(){
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

	function AdministracaoPublica(){
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

	function Agropecuaria(){
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

	function Rem_ExtrativaMineral(){
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

	function Rem_IndustriaTransformacao(){
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

	function Rem_ServicosIndustriais(){
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

	function Rem_ConstrucaoCivil(){
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

	function Rem_Comercio(){
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

	function Rem_Servicos(){
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

	function Rem_AdministracaoPublica(){
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

	function Rem_Agropecuaria(){
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


	if ($_GET["variavel"] == 'Empregados: Extrativa mineral'){
		ExtrativaMineral();
	}
	else if ($_GET["variavel"] == 'Empregados: Indústria de Transformação'){
		IndustriaTransformacao();
	}
	else if ($_GET["variavel"] == 'Empregados: Serviços Industriais'){
		ServicosIndustriais();
	}
	else if ($_GET["variavel"] == 'Empregados: Construção Civil'){
		ConstrucaoCivil();
	}
	else if ($_GET["variavel"] == 'Empregados: Comércio'){
		Comercio();
	}
	else if ($_GET["variavel"] == 'Empregados: Serviços'){
		Servicos();
	}
	else if ($_GET["variavel"] == 'Empregados: Administração Pública'){
		AdministracaoPublica();
	}
	else if ($_GET["variavel"] == 'Empregados: Agropecuárias, extração, caça e pesca'){
		Agropecuaria();
	}
	else if ($_GET["variavel"] == 'Remuneração média: Extrativa mineral'){
		Rem_ExtrativaMineral();
	}
	else if ($_GET["variavel"] == 'Remuneração média: Indústria de Transformação'){
		Rem_IndustriaTransformacao();
	}
	else if ($_GET["variavel"] == 'Remuneração média: Serviços Industriais'){
		Rem_ServicosIndustriais();
	}
	else if ($_GET["variavel"] == 'Remuneração média: Construção Civil'){
		Rem_ConstrucaoCivil();
	}
	else if ($_GET["variavel"] == 'Remuneração média: Comércio'){
		Rem_Comercio();
	}
	else if ($_GET["variavel"] == 'Remuneração média: Serviços'){
		Rem_Servicos();
	}
	else if ($_GET["variavel"] == 'Remuneração média: Administração Pública'){
		Rem_AdministracaoPublica();
	}
	else if ($_GET["variavel"] == 'Remuneração média: Agropecuárias, extração, caça e pesca'){
		Rem_Agropecuaria();
	}
?>







