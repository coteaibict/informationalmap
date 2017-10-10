<?php
	function Brasil(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(qtd)
							FROM patentes p 
							inner join ano a on a.cod_ano=p.cod_ano
							where a.descricao = ".$_GET["ano"]);
		$row = $res->fetch_row();
		$tot = $row[0];

		$res = $con->query("SELECT sum(qtd), tipo
							FROM patentes p
							inner join ano a on a.cod_ano=p.cod_ano
							where a.descricao = ".$_GET["ano"]."
							group by p.tipo;");
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
		$res = $con->query("SELECT sum(qtd)
							FROM patentes p
							inner join ano a on a.cod_ano=p.cod_ano
							where a.descricao = ".$_GET["ano"]."
							and cod_municipio = ".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		$res = $con->query("SELECT qtd, tipo
							FROM patentes p
							inner join ano a on a.cod_ano=p.cod_ano
							where cod_municipio =".$_GET["cod"]."
							and a.descricao = ".$_GET["ano"]."
							group by tipo;");
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
		$res = $con->query("SELECT sum(qtd)
							FROM patentes p 
							inner join municipio m on p.cod_municipio = m.cod_municipio
							inner join MesoRegiao e on e.cod_mesoregiao = m.cod_mesoregiao
							inner join ano a on a.cod_ano=p.cod_ano
							where a.descricao = ".$_GET["ano"]."
							and e.cod_mesoregiao = ".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		$res = $con->query("SELECT sum(qtd),tipo
							FROM patentes p 
							inner join municipio m on p.cod_municipio = m.cod_municipio
							inner join MesoRegiao e on e.cod_mesoregiao = m.cod_mesoregiao
							inner join ano a on a.cod_ano=p.cod_ano
							where a.descricao = ".$_GET["ano"]."
							and e.cod_mesoregiao = ".$_GET["cod"]."
							group by tipo;");


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
		$res = $con->query("SELECT sum(qtd)
							FROM patentes p 
							inner join municipio m on p.cod_municipio = m.cod_municipio
							inner join estado e on e.cod_estado = m.cod_estado
							inner join ano a on a.cod_ano=p.cod_ano
							where a.descricao = ".$_GET["ano"]."
							and e.cod_estado = ".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		$res = $con->query("SELECT sum(qtd),tipo
							FROM patentes p 
							inner join municipio m on p.cod_municipio = m.cod_municipio
							inner join estado e on e.cod_estado = m.cod_estado
							inner join ano a on a.cod_ano=p.cod_ano
							where a.descricao = ".$_GET["ano"]."
							and e.cod_estado = ".$_GET["cod"]."
							group by tipo;");

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