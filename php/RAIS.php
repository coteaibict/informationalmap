<?php
	function ExtrativaMineral(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao      , valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio								
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '1 NULL Emprego NULL Extrativa mineral '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '1 NULL Emprego NULL Extrativa mineral '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '1 NULL Emprego NULL Extrativa mineral '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function IndustriaTransformacao(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '2 NULL Emprego NULL  Indústria de transformação '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '2 NULL Emprego NULL  Indústria de transformação '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '2 NULL Emprego NULL  Indústria de transformação '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function ServicosIndustriais(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '3 NULL  Emprego NULL Servicos industriais de utilidade pública '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '3 NULL  Emprego NULL Servicos industriais de utilidade pública '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '3 NULL  Emprego NULL Servicos industriais de utilidade pública '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function ConstrucaoCivil(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '4 NULL  Emprego NULL  Construção Civil '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '4 NULL  Emprego NULL  Construção Civil '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '4 NULL  Emprego NULL  Construção Civil '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}
		mysqli_close($con);
		echo $result;
	}

	function Comercio(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '5 NULL  Emprego NULL  Comércio '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '5 NULL  Emprego NULL  Comércio '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '5 NULL  Emprego NULL  Comércio '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}  
		mysqli_close($con);
		echo $result;
	}

	function Servicos(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '6 NULL  Emprego NULL  Serviços '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '6 NULL  Emprego NULL  Serviços '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '6 NULL  Emprego NULL  Serviços '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}    
		mysqli_close($con);
		echo $result;
	}

	function AdministracaoPublica(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '7 NULL  Emprego NULL  Administração Pública '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '7 NULL  Emprego NULL  Administração Pública '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '7 NULL  Emprego NULL  Administração Pública '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}  
		mysqli_close($con);
		echo $result;
	}

	function Agropecuaria(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '8 NULL  Emprego NULL  Agropecuária, extração vegetal, caça e pesca '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '8 NULL  Emprego NULL  Agropecuária, extração vegetal, caça e pesca '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '8 NULL  Emprego NULL  Agropecuária, extração vegetal, caça e pesca '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Emprego NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}  
		mysqli_close($con);
		echo $result;
	}

	function Rem_ExtrativaMineral(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '1 NULL Remuneração Mensal  NULL Extrativa mineral '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '1 NULL Remuneração Mensal  NULL Extrativa mineral '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '1 NULL Remuneração Mensal  NULL Extrativa mineral '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function Rem_IndustriaTransformacao(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '2 NULL Remuneração Mensal  NULL  Indústria de transformação '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '2 NULL Remuneração Mensal  NULL  Indústria de transformação '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '2 NULL Remuneração Mensal  NULL  Indústria de transformação '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function Rem_ServicosIndustriais(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '3 NULL  Remuneração Mensal  NULL Servicos industriais de utilidade pública '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '3 NULL  Remuneração Mensal  NULL Servicos industriais de utilidade pública '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '3 NULL  Remuneração Mensal  NULL Servicos industriais de utilidade pública '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function Rem_ConstrucaoCivil(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '4 NULL  Remuneração Mensal  NULL  Construção Civil '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '4 NULL  Remuneração Mensal  NULL  Construção Civil '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'					
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '4 NULL  Remuneração Mensal  NULL  Construção Civil '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}
		mysqli_close($con);
		echo $result;
	}

	function Rem_Comercio(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '5 NULL  Remuneração Mensal  NULL  Comércio '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '5 NULL  Remuneração Mensal  NULL  Comércio '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '5 NULL  Remuneração Mensal  NULL  Comércio '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}  
		mysqli_close($con);
		echo $result;
	}

	function Rem_Servicos(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '6 NULL  Remuneração Mensal  NULL  Serviços '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '6 NULL  Remuneração Mensal  NULL  Serviços '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '6 NULL  Remuneração Mensal  NULL  Serviços '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}    
		mysqli_close($con);
		echo $result;
	}

	function Rem_AdministracaoPublica(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '7 NULL  Remuneração Mensal  NULL  Administração Pública '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '7 NULL  Remuneração Mensal  NULL  Administração Pública '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '7 NULL  Remuneração Mensal  NULL  Administração Pública '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}  
		mysqli_close($con);
		echo $result;
	}

	function Rem_Agropecuaria(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,a.descricao, valor , m.nome,null
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '8 NULL  Remuneração Mensal  NULL  Agropecuária, extração vegetal, caça e pesca '
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");

			$resd = $con->query("SELECT valor
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
								group by m.cod_municipio, a.cod_ano;");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,a.descricao,sum(valor), e.uf,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '8 NULL  Remuneração Mensal  NULL  Agropecuária, extração vegetal, caça e pesca '
								group by e.cod_estado,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join estado e on e.cod_estado = m.cod_estado 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_estado,a.cod_ano;");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao,sum(valor), e.nome,null 
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = '8 NULL  Remuneração Mensal  NULL  Agropecuária, extração vegetal, caça e pesca '
								group by e.cod_mesoRegiao,a.cod_ano;");
			$resd = $con->query("SELECT sum(valor)
								FROM dadosextraidosdaraiz d 
								inner join municipio m on d.cod_municipio = m.cod_municipio 
								inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao 
								inner join ano a on a.cod_ano = d.cod_ano
								where informacao = ' Remuneração Mensal  NULL  Total'
								group by e.cod_mesoRegiao,a.cod_ano;");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
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
	else if ($_GET["variavel"] == 'Empregados: Agropecuárias'){
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
	else if ($_GET["variavel"] == 'Remuneração média: Agropecuárias'){
		Rem_Agropecuaria();
	}
?>






