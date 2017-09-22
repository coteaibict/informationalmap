<?php
	function PIB(){
		include "ConexaoDB.php";
		$result = '';

		if($_GET["cod"] == ""){
			$res = $con->query("SELECT sum(pm.PIB) ,pm.cod_ano +2001
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 				
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
                            group by pm.cod_ano;");

		}else if($_GET["tipoDivisao"] == "M"){
			$res = $con->query("SELECT pm.PIB ,pm.cod_ano +2001
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 				
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							and m.cod_municipio =".$_GET["cod"]."
                            group by pm.cod_ano;");

		}else if($_GET["tipoDivisao"] == "MR"){
			$res = $con->query("SELECT sum(pm.PIB) ,pm.cod_ano +2001
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao				
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							and m.cod_mesoregiao =".$_GET["cod"]."
                            group by pm.cod_ano;");

		}else if($_GET["tipoDivisao"] == "E"){
			$res = $con->query("SELECT sum(pm.PIB) ,pm.cod_ano +2001
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado				
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							and m.cod_estado =".$_GET["cod"]."
                            group by pm.cod_ano;");
		}

		while($row = $res->fetch_row()){
			$x = $row[0];

			$y = $row[1];
			$result .= $y.'&'.$x.';';
		}

		mysqli_close($con);
		echo $result;
	}

	if ($_GET["variavel"] == "PIB"){
		PIB();
	}

?>