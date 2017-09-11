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
	function PIB(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,'PIB', pm.PIB ,m.Nome, null 
								from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 					
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) and pm.cod_ano = 12");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,'PIB', sum(pm.PIB), e.Uf, null 
								from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                                inner join estado e on m.cod_estado = e.cod_estado
								where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano = 12
                                group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoregiao,'PIB', sum(pm.PIB), mr.Nome, null 
								from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                                inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
								where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano = 12
                                group by mr.cod_mesoregiao");
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

	function ValorAddRelativo($valor){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,'".str_replace("_"," ", $valor)."',". $valor .",m.Nome, null 
								from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 					
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) and pm.cod_ano = 12");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT e.cod_estado,'".str_replace("_"," ", $valor)."', sum(".$valor."), e.Uf, null
								from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                                inner join estado e on m.cod_estado = e.cod_estado
								where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano = 12
                                group by e.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT mr.cod_mesoregiao,'".str_replace("_"," ", $valor)."', sum(".$valor."), mr.Nome, null 
								from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                                inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
								where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano = 12
                                group by mr.cod_mesoregiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
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
	else if($_GET["variavel"] == "PIB"){
		PIB();
	}
	else if($_GET["variavel"] == "bAgro"){
		ValorAddRelativo("Valor_adicionado_bruto_da_Agropecuaria");
	}
	else if($_GET["variavel"] == "bIndus"){
		ValorAddRelativo("Valor_adicionado_bruto_da_Industria");
	}
	else if($_GET["variavel"] == "bServ"){
		ValorAddRelativo("Valor_add_bru_Servs_precos_corr_ex_Admin_saude_edu_pub_e_seg_soc");
	}
	else if($_GET["variavel"] == "bAdmin"){
		ValorAddRelativo("Valor_add_bru_Admin_sau_edu_pubs_seg_soc");
	}
	else if($_GET["variavel"] == "imLiq"){
		ValorAddRelativo("impostos_liquidos_de_subsidios_sobre_produtos");
	}
	
?>