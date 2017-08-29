<?php
	function FundamentalIncompleto(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, 'pib', (select dc.valor from dadoscenso2010 dc where dc.informacao = 'Sem instrução e fundamental incompleto' and dc.cod_municipio = m.cod_municipio), m.nome,(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio)  
								from municipio m 
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado, 'pib', sum((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Sem instrução e fundamental incompleto' and dc.cod_municipio = m.cod_municipio)), e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio))  
								from municipio m inner join estado e on m.cod_estado = e.cod_estado
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Sem instrução e fundamental incompleto' and dc.cod_municipio = m.cod_municipio)), mr.nome,sum((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio))  
								from municipio m inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by mr.cod_mesoRegiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function FundamentalCompleto(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, 'pib', ((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Fundamental completo e médio incompleto' and dc.cod_municipio = m.cod_municipio)+(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Médio completo e superior incompleto' and dc.cod_municipio = m.cod_municipio)+(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Superior completo' and dc.cod_municipio = m.cod_municipio)), m.nome,(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio)  
								from municipio m 
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado, 'pib', sum(((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Fundamental completo e médio incompleto' and dc.cod_municipio = m.cod_municipio)+(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Médio completo e superior incompleto' and dc.cod_municipio = m.cod_municipio)+(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Superior completo' and dc.cod_municipio = m.cod_municipio))), e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio))  
								from municipio m inner join estado e on m.cod_estado = e.cod_estado
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Fundamental completo e médio incompleto' and dc.cod_municipio = m.cod_municipio)+(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Médio completo e superior incompleto' and dc.cod_municipio = m.cod_municipio)+(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Superior completo' and dc.cod_municipio = m.cod_municipio))), mr.nome,sum((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio))  
								from municipio m inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by mr.cod_mesoRegiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function MedioCompleto(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, 'pib', ((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Médio completo e superior incompleto' and dc.cod_municipio = m.cod_municipio)+(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Superior completo' and dc.cod_municipio = m.cod_municipio)), m.nome,(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio)  
								from municipio m 
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado, 'pib', sum(((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Médio completo e superior incompleto' and dc.cod_municipio = m.cod_municipio)+(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Superior completo' and dc.cod_municipio = m.cod_municipio))), e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio))  
								from municipio m inner join estado e on m.cod_estado = e.cod_estado
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Médio completo e superior incompleto' and dc.cod_municipio = m.cod_municipio)+(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Superior completo' and dc.cod_municipio = m.cod_municipio))), mr.nome,sum((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio))  
								from municipio m inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by mr.cod_mesoRegiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function SuperiorCompleto(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, 'pib', ((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Superior completo' and dc.cod_municipio = m.cod_municipio)), m.nome,(select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio)  
								from municipio m 
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado, 'pib', sum(((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Superior completo' and dc.cod_municipio = m.cod_municipio))), e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio))  
								from municipio m inner join estado e on m.cod_estado = e.cod_estado
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Superior completo' and dc.cod_municipio = m.cod_municipio))), mr.nome,sum((select dc.valor from dadoscenso2010 dc where dc.informacao = 'Total população mais de 10 anos' and cod_municipio = m.cod_municipio))  
								from municipio m inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by mr.cod_mesoRegiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function EstabelecimentoEduBasica(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome,pb.Populacao
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
								where dc.informacao = ' Estabelecimentos - Educação Básica  ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado 'pib', sum(dc.valor) , e.uf,sum(pb.Populacao)
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
                                inner join estado e on m.cod_estado = e.cod_estado
								where dc.informacao = ' Estabelecimentos - Educação Básica  ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao 'pib', sum(dc.valor) , mr.nome,sum(pb.Populacao)
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
                                inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
								where dc.informacao = ' Estabelecimentos - Educação Básica  ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by mr.cod_mesoRegiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function EstabelecimentoEduProfi(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome,pb.Populacao
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
								where dc.informacao = ' Estabelecimentos - Educação Profissional ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado 'pib', sum(dc.valor) , e.uf,sum(pb.Populacao)
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
                                inner join estado e on m.cod_estado = e.cod_estado
								where dc.informacao = ' Estabelecimentos - Educação Profissional ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao 'pib', sum(dc.valor) , mr.nome,sum(pb.Populacao)
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
                                inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
								where dc.informacao = ' Estabelecimentos - Educação Profissional ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by mr.cod_mesoRegiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function MatEduBasica(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome,pb.Populacao
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
								where dc.informacao = ' Matrículas - Educação Básica  ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado 'pib', sum(dc.valor) , e.uf,sum(pb.Populacao)
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
                                inner join estado e on m.cod_estado = e.cod_estado
								where dc.informacao = ' Matrículas - Educação Básica  ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao 'pib', sum(dc.valor) , mr.nome,sum(pb.Populacao)
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
                                inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
								where dc.informacao = ' Matrículas - Educação Básica  ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by mr.cod_mesoRegiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function MatEnMedio(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome,pb.Populacao
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
								where dc.informacao = ' Matrículas - Ensino  Médio ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado 'pib', sum(dc.valor) , e.uf,sum(pb.Populacao)
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
                                inner join estado e on m.cod_estado = e.cod_estado
								where dc.informacao = ' Matrículas - Ensino  Médio ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao 'pib', sum(dc.valor) , mr.nome,sum(pb.Populacao)
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
                                inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
								where dc.informacao = ' Matrículas - Ensino  Médio ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by mr.cod_mesoRegiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function MatEduProfi(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome,pb.Populacao
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
								where dc.informacao = ' Matrículas -Educação profissional ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado 'pib', sum(dc.valor) , e.uf,sum(pb.Populacao)
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
                                inner join estado e on m.cod_estado = e.cod_estado
								where dc.informacao = ' Matrículas -Educação profissional ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao 'pib', sum(dc.valor) , mr.nome,sum(pb.Populacao)
								from municipio m inner join pibmunicipalibge pb on pb.cod_municipio = m.cod_municipio
                                inner join dados_inep_censodaeducacaobasica2015 dc on dc.cod_municipio = m.cod_municipio
                                inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
								where dc.informacao = ' Matrículas -Educação profissional ' and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                group by mr.cod_mesoRegiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function ConcluintesAgriVet(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res1 = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
                                where dc.informacao = ' QT_CONCLUINTES_CURSO - Agricultura e veterinária Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                order by m.cod_municipio");

			$res2 = $con->query("SELECT  dc.valor 
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res1 = $con->query("SELECT e.cod_estado, 'pib', sum(dc.valor) , e.uf
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Agricultura e veterinária Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res1 = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(dc.valor) , mr.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Agricultura e veterinária Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row1 = $res1->fetch_row()) {
			$row2 = $res2->fetch_row();
	    	$result .= $row1[0] . "," . $row1[1] .",". $row1[2].','.$row1[3].",".$row2[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function ConcluintesCienNeg(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res1 = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
                                where dc.informacao = ' QT_CONCLUINTES_CURSO - Ciências sociais, negócios e direito Total 
'
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                order by m.cod_municipio");

			$res2 = $con->query("SELECT  dc.valor 
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res1 = $con->query("SELECT e.cod_estado, 'pib', sum(dc.valor) , e.uf
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Ciências sociais, negócios e direito Total 
'
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res1 = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(dc.valor) , mr.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Ciências sociais, negócios e direito Total 
'
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row1 = $res1->fetch_row()) {
			$row2 = $res2->fetch_row();
	    	$result .= $row1[0] . "," . $row1[1] .",". $row1[2].','.$row1[3].",".$row2[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function ConcluintesCienMatCom(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res1 = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
                                where dc.informacao = ' QT_CONCLUINTES_CURSO - Ciências, matemática e computação Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                order by m.cod_municipio");

			$res2 = $con->query("SELECT  dc.valor 
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res1 = $con->query("SELECT e.cod_estado, 'pib', sum(dc.valor) , e.uf
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Ciências, matemática e computação Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res1 = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(dc.valor) , mr.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Ciências, matemática e computação Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row1 = $res1->fetch_row()) {
			$row2 = $res2->fetch_row();
	    	$result .= $row1[0] . "," . $row1[1] .",". $row1[2].','.$row1[3].",".$row2[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function ConcluintesEdu(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res1 = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
                                where dc.informacao = ' QT_CONCLUINTES_CURSO - Educação Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                order by m.cod_municipio");

			$res2 = $con->query("SELECT  dc.valor 
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res1 = $con->query("SELECT e.cod_estado, 'pib', sum(dc.valor) , e.uf
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Educação Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res1 = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(dc.valor) , mr.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Educação Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row1 = $res1->fetch_row()) {
			$row2 = $res2->fetch_row();
	    	$result .= $row1[0] . "," . $row1[1] .",". $row1[2].','.$row1[3].",".$row2[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function ConcluintesEngProduCons(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res1 = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
                                where dc.informacao = ' QT_CONCLUINTES_CURSO - Engenharia, produção e construção Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                order by m.cod_municipio");

			$res2 = $con->query("SELECT  dc.valor 
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res1 = $con->query("SELECT e.cod_estado, 'pib', sum(dc.valor) , e.uf
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Engenharia, produção e construção Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res1 = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(dc.valor) , mr.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Engenharia, produção e construção Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row1 = $res1->fetch_row()) {
			$row2 = $res2->fetch_row();
	    	$result .= $row1[0] . "," . $row1[1] .",". $row1[2].','.$row1[3].",".$row2[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function ConcluintesHumaArt(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res1 = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
                                where dc.informacao = ' QT_CONCLUINTES_CURSO - Humanidades e artes Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                order by m.cod_municipio");

			$res2 = $con->query("SELECT  dc.valor 
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res1 = $con->query("SELECT e.cod_estado, 'pib', sum(dc.valor) , e.uf
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Humanidades e artes Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res1 = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(dc.valor) , mr.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Humanidades e artes Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row1 = $res1->fetch_row()) {
			$row2 = $res2->fetch_row();
	    	$result .= $row1[0] . "," . $row1[1] .",". $row1[2].','.$row1[3].",".$row2[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}


	function ConcluintesSaudeBem(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res1 = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
                                where dc.informacao = ' QT_CONCLUINTES_CURSO - Saúde e bem estar social Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                order by m.cod_municipio");

			$res2 = $con->query("SELECT  dc.valor 
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res1 = $con->query("SELECT e.cod_estado, 'pib', sum(dc.valor) , e.uf
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Saúde e bem estar social Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res1 = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(dc.valor) , mr.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Saúde e bem estar social Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row1 = $res1->fetch_row()) {
			$row2 = $res2->fetch_row();
	    	$result .= $row1[0] . "," . $row1[1] .",". $row1[2].','.$row1[3].",".$row2[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function ConcluintesServ(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res1 = $con->query("SELECT m.cod_municipio, 'pib', dc.valor , m.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
                                where dc.informacao = ' QT_CONCLUINTES_CURSO - Serviços Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                                order by m.cod_municipio");

			$res2 = $con->query("SELECT  dc.valor 
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res1 = $con->query("SELECT e.cod_estado, 'pib', sum(dc.valor) , e.uf
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Serviços Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by e.cod_estado
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res1 = $con->query("SELECT mr.cod_mesoRegiao, 'pib', sum(dc.valor) , mr.nome
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Serviços Total '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");

			$res2 = $con->query("SELECT  sum(dc.valor)
								from municipio m inner join dadoscensoeducacaosuperior dc on m.cod_municipio = dc.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
						        where dc.informacao = ' QT_CONCLUINTES_CURSO - Total geral '
								and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
						        group by mr.cod_mesoRegiao
								order by m.cod_municipio");
		}

		$result = "";
		while ($row1 = $res1->fetch_row()) {
			$row2 = $res2->fetch_row();
	    	$result .= $row1[0] . "," . $row1[1] .",". $row1[2].','.$row1[3].",".$row2[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function NumDot(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,'pib',sum(cm.Numero_de_Titulados_na_Pos_Graduacao_Doutorado), m.nome, null 
								from cursopos_municipio cm inner join municipio m on cm.cod_municipio = m.cod_municipio								
								where  m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
								group by m.cod_municipio ");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,'pib',sum(cm.Numero_de_Titulados_na_Pos_Graduacao_Doutorado), e.uf, null 
								from cursopos_municipio cm inner join municipio m on cm.cod_municipio = m.cod_municipio
								inner join estado e on m.cod_estado = e.cod_estado
								group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao,'pib',sum(cm.Numero_de_Titulados_na_Pos_Graduacao_Doutorado), mr.nome, null 
								from cursopos_municipio cm inner join municipio m on cm.cod_municipio = m.cod_municipio
								inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
								group by mr.cod_mesoRegiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	if ($_GET["variavel"] == 'Fundamental Incompleto'){
		FundamentalIncompleto();
	}
	else if ($_GET["variavel"] == 'Fundamental Completo'){
		FundamentalCompleto();
	}
	else if ($_GET["variavel"] == 'Médio Completo'){
		MedioCompleto();
	}
	else if ($_GET["variavel"] == 'Superior Completo'){
		SuperiorCompleto();
	}
	else if ($_GET["variavel"] == 'Estabelecimento de Educação Básica'){
		EstabelecimentoEduBasica();
	}
	else if ($_GET["variavel"] == 'Estabelecimento de Educação Profissional'){
		EstabelecimentoEduProfi();	
	}
	else if ($_GET["variavel"] == 'Matrículas Educação Básica'){
		MatEduBasica();
	}
	else if ($_GET["variavel"] == 'Matrículas Ensino Médio'){
		MatEnMedio();
	}
	else if ($_GET["variavel"] == 'Matrículas Educação Profissional'){
		MatEduProfi();
	}
	else if ($_GET["variavel"] == 'Concluintes Agricultura e veterinária'){
		ConcluintesAgriVet();
	}
	else if ($_GET["variavel"] == 'Concluintes Ciências sociais, negócios e direito'){
		ConcluintesCienNeg();
	}
	else if ($_GET["variavel"] == 'Concluintes Ciências, matemática e computação'){
		ConcluintesCienMatCom();
	}
	else if ($_GET["variavel"] == 'Concluintes Educação'){
		ConcluintesEdu();
	}
	else if ($_GET["variavel"] == 'Concluintes Engenharia, produção e construção'){
		ConcluintesEngProduCons();
	}
	else if ($_GET["variavel"] == 'Concluintes Humanidades e artes'){
		ConcluintesHumaArt();
	}
	else if ($_GET["variavel"] == 'Concluintes Saúde e bem estar social'){
		ConcluintesSaudeBem();
	}
	else if ($_GET["variavel"] == 'Concluintes Serviços'){
		ConcluintesServ();
	}
	else if ($_GET["variavel"] == 'Número de Doutores'){
		NumDot();
	}
?>