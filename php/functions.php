<?php
	function EnsinoFundamentalCompleto(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,r.informacao, r.valor, m.Nome, pm.Populacao 
								from dadosextraidosdaraiz r inner join municipio m on r.cod_municipio = m.cod_municipio 
								inner join coordenadas_municipios cm on cm.cod_muncipio = m.cod_municipio
								inner join pibmunicipalibge pm on m.cod_municipio = pm.cod_municipio
								where r.informacao =  'Fundamental Completo' and m.cod_municipio != 2206720 and pm.cod_ano = 12");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado, r.informacao, sum(r.valor), e.Uf, sum(pm.Populacao) from dadosextraidosdaraiz r inner join municipio m
								on r.cod_municipio = m.cod_municipio inner join estado e on m.cod_estado = e.cod_estado
                                inner join pibmunicipalibge pm on m.cod_municipio = pm.cod_municipio
								where r.informacao =  'Fundamental Completo' and pm.cod_ano = 12
                                group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoRegiao, r.informacao, sum(r.valor), mr.Nome, sum(pm.Populacao) from dadosextraidosdaraiz r inner join municipio m
								on r.cod_municipio = m.cod_municipio inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
                                inner join pibmunicipalibge pm on m.cod_municipio = pm.cod_municipio
								where r.informacao =  'Fundamental Completo' and pm.cod_ano = 12
                                group by mr.cod_mesoRegiao");
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
								group by s.cod_setor, am.cod_municipio");
		}
		if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado, s.cod_setor, count(am.cod_apl)
								from apl_municipio am inner join apl a on am.cod_apl = a.cod_apl
								inner join setor s on a.cod_setor = s.cod_setor 
                                inner join municipio m on m.cod_municipio = am.cod_municipio
                                inner join estado e on m.cod_estado = e.cod_estado
                                group by s.cod_setor, e.cod_estado");
		}
		if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao, s.cod_setor, count(am.cod_apl)
								from apl_municipio am inner join apl a on am.cod_apl = a.cod_apl
								inner join setor s on a.cod_setor = s.cod_setor 
                                inner join municipio m on m.cod_municipio = am.cod_municipio
                                inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
                                group by s.cod_setor, mr.cod_mesoRegiao");
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