<?php
	function Brasil(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(valor), cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'Total'");
		$row = $res->fetch_row();
		$tot = $row[0];

		$res = $con->query("SELECT sum(valor), informacao
							FROM raisestabelecimentos
							where valor != 0
							and informacao != 'Total'
							group by informacao;");
		while($row = $res->fetch_row()){
			$x = $row[0];

			$div = $x/$tot;
			$result .= $row[1].'&'.$div.';';
		}
		mysqli_close($con);
		echo $result;
	}
	function Municipio(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT valor, cod_raisestabelecimentos
							FROM raisestabelecimentos
							where informacao = 'Total'
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		$res = $con->query("SELECT valor, informacao
							FROM raisestabelecimentos
							where cod_municipio =".$_GET["cod"]."
							and valor != 0
							and informacao != 'Total'
							group by informacao;");
		while($row = $res->fetch_row()){
			$x = $row[0];

			$div = $x/$tot;
			$result .= $row[1].'&'.$div.';';
		}
		mysqli_close($con);
		echo $result;
	}
	function MesoRegiao(){
		include "ConexaoDB.php";
		$result = '';

		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where re.informacao = 'Total'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		$res = $con->query("SELECT sum(valor),re.informacao
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where m.cod_mesoregiao =".$_GET["cod"]."
							and valor != 0
							and re.informacao != 'Total'
							group by re.informacao;");
		while($row = $res->fetch_row()){
			$x = $row[0];

			$div = $x/$tot;
			$result .= $row[1].'&'.$div.';';
		}
		mysqli_close($con);
		echo $result;
	}
	function Estado(){
		include "ConexaoDB.php";
		$result = '';

		$res = $con->query("SELECT sum(valor)
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado= e.cod_estado
							where re.informacao = 'Total'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		$res = $con->query("SELECT sum(valor),re.informacao
							FROM raisestabelecimentos re
							inner join municipio m on m.cod_municipio = re.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_estado =".$_GET["cod"]."
							and valor != 0
							and re.informacao != 'Total'
							group by re.informacao;");
		while($row = $res->fetch_row()){
			$x = $row[0];

			$div = $x/$tot;
			$result .= $row[1].'&'.$div.';';
		}

		mysqli_close($con);
		echo $result;
	}
	if($_GET["cod"] == "")
		Brasil();
	else if($_GET["tipoDivisao"] == "M")
		Municipio();
	else if	($_GET["tipoDivisao"] == "MR")
		MesoRegiao();
	else
		Estado();
?>