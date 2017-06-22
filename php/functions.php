<?php
	function EnsinoFundamentalCompleto(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,r.informacao, r.valor, m.Nome, pm.Populacao 
								from dadosextraidosdaraiz r inner join municipio m on r.cod_municipio = m.cod_municipio 
								inner join coordenadas_municipios cm on cm.cod_muncipio = m.cod_municipio
								inner join pibmunicipalibge pm on m.cod_municipio = pm.cod_municipio
								where r.informacao =  'Fundamental Completo' and m.cod_municipio != 2206720 and pm.cod_ano = 13");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado, r.informacao, sum(r.valor), e.Uf, sum(pm.Populacao) from dadosextraidosdaraiz r inner join municipio m
								on r.cod_municipio = m.cod_municipio inner join estado e on m.cod_estado = e.cod_estado
                                inner join pibmunicipalibge pm on m.cod_municipio = pm.cod_municipio
								where r.informacao =  'Fundamental Completo' and pm.cod_ano = 13
                                group by e.cod_estado");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}

	function SetoresPorDivsao(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT am.cod_municipio, s.cod_setor, count(am.cod_apl)
								from apl_municipio am inner join apl a on am.cod_apl = a.cod_apl
								inner join setor s on a.cod_setor = s.cod_setor
								group by am.cod_municipio");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].";";
		} 

		mysqli_close($con);
		echo $result;
	}

	if($_GET["variavel"] == "SetoresPorDivsao"){
		SetoresPorDivsao();
	}
	else if($_GET["variavel"] == "FundamentalCom"){
		EnsinoFundamentalCompleto();
	}

?>