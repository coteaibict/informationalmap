<?php
	function PopulacaoTotal(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT  m.cod_municipio, '', pb.Populacao , m.nome,null
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
								where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT  m.cod_estado, '', sum(pb.Populacao) , e.uf,null
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
								where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT  m.cod_mesoRegiao, '', sum(pb.Populacao) , e.nome,null
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
								where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function IDHMunicipal(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT  m.cod_municipio, '', pb.valor , m.nome,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT  m.cod_estado, '', sum(pb.valor) , e.uf,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT  m.cod_mesoRegiao, '', sum(pb.valor) , e.nome,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function IDHEducacao(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT  m.cod_municipio, '', pb.valor , m.nome,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal - Dimensão Educação ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT  m.cod_estado, '', sum(pb.valor) , e.uf,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal - Dimensão Educação ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT  m.cod_mesoRegiao, '', sum(pb.valor) , e.nome,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal - Dimensão Educação ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function IDHLongevidade(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT  m.cod_municipio, '', pb.valor , m.nome,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal  - Dimensão Longevidade ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT  m.cod_estado, '', sum(pb.valor) , e.uf,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal  - Dimensão Longevidade ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT  m.cod_mesoRegiao, '', sum(pb.valor) , e.nome,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal  - Dimensão Longevidade ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function IDHRenda(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT  m.cod_municipio, '', pb.valor , m.nome,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal - Dimensão Renda ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT  m.cod_estado, '', sum(pb.valor) , e.uf,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal - Dimensão Renda ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT  m.cod_mesoRegiao, '', sum(pb.valor) , e.nome,null
								from municipio m inner join idh pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = 'Índice de Desenvolvimento Humano Municipal - Dimensão Renda ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function GINI(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT  m.cod_municipio, '', pb.valor , m.nome,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = 'Índice de Gini (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT  m.cod_estado, '', sum(pb.valor), e.uf,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = 'Índice de Gini (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT  m.cod_mesoRegiao, '', sum(pb.valor), m.nome,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = 'Índice de Gini (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function ExtremamentePobres(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT  m.cod_municipio, '', pb.valor , m.nome,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = ' extremamente pobres (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
			$resd = $con->query("SELECT  pb.valor
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = ' População total (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_municipio
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT  m.cod_estado, '', sum(pb.valor), e.uf,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = ' extremamente pobres (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_estado
								order by m.cod_municipio");
			$resd = $con->query("SELECT  sum(pb.valor)
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = ' População total (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT  m.cod_mesoRegiao, '', sum(pb.valor), m.nome,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = ' extremamente pobres (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_mesoRegiao
								order by m.cod_municipio");
			$resd = $con->query("SELECT  sum(pb.valor)
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = ' População total (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_mesoRegiao
								order by m.cod_municipio");
		}


		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function Pobres(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT  m.cod_municipio, '', pb.valor , m.nome,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = 'pobres (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
			$resd = $con->query("SELECT  pb.valor
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = ' População total (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_municipio
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT  m.cod_estado, '', sum(pb.valor), e.uf,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = 'pobres (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_estado
								order by m.cod_municipio");
			$resd = $con->query("SELECT  sum(pb.valor)
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = ' População total (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT  m.cod_mesoRegiao, '', sum(pb.valor), m.nome,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = 'pobres (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_mesoRegiao
								order by m.cod_municipio");
			$resd = $con->query("SELECT  sum(pb.valor)
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = ' População total (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_mesoRegiao
								order by m.cod_municipio");
		}


		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function VulneraveisPobres(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT  m.cod_municipio, '', pb.valor , m.nome,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = 'vulneráveis à pobreza (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
			$resd = $con->query("SELECT  pb.valor
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
                                where pb.informacao = ' População total (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_municipio
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT  m.cod_estado, '', sum(pb.valor), e.uf,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = 'vulneráveis à pobreza (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_estado
								order by m.cod_municipio");
			$resd = $con->query("SELECT  sum(pb.valor)
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado 
                                where pb.informacao = ' População total (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT  m.cod_mesoRegiao, '', sum(pb.valor), m.nome,null
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = 'vulneráveis à pobreza (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_mesoRegiao
								order by m.cod_municipio");
			$resd = $con->query("SELECT  sum(pb.valor)
								from municipio m inner join dadosatlasbrasilpnud pb on pb.cod_municipio = m.cod_municipio
								inner join mesoRegiao e on m.cod_mesoRegiao = e.cod_mesoRegiao 
                                where pb.informacao = ' População total (2010) ' 
                                and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_mesoRegiao
								order by m.cod_municipio");
		}


		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	if ($_GET["variavel"] == 'População Total'){
		PopulacaoTotal();
	}
	else if ($_GET["variavel"] == 'IDH Municipal'){
		IDHMunicipal();
	}
	else if ($_GET["variavel"] == 'IDH Municipal – Educação'){
		IDHEducacao();
	}
	else if ($_GET["variavel"] == 'IDH Municipal – Longevidade'){
		IDHLongevidade();
	}
	else if ($_GET["variavel"] == 'IDH Municipal – Renda'){
		IDHRenda();
	}
	else if ($_GET["variavel"] == 'Índice de GINI'){		
		GINI();
	}
	else if ($_GET["variavel"] == 'Extremamente Pobres'){
		ExtremamentePobres();
	}
	else if ($_GET["variavel"] == 'Pobres'){
		Pobres();
	}
	else if ($_GET["variavel"] == 'Vulneráveis à pobreza'){
		VulneraveisPobres();
	}

?>