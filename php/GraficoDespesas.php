<?php
	function Municipio(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Legislativa' or descricao = 'Judiciária' or descricao = 'Essencial à Justiça' or descricao = 'Administração';");
		$row = $res->fetch_row();
		$x = $row[0];
		$res = $con->query("SELECT valor FROM despesas_municipios where informacao = 'Total Despesa';");
		$row = $res->fetch_row();
		$div = $x/$row[0];
		$result .= 'Despesas com poderes executivo, legislativo e judiciário,'.$div.';';




	/*
		$result .= 'Defesa Nacional,'.';';
		$result .= 'Segurança Pública,'.';';
		$result .= 'Relações Exteriores,'.';';
		$result .= 'Assistência Social,'.';';
		$result .= 'Previdência Social,'.';';
		$result .= 'Saúde,'.';';
		$result .= 'Trabalho,'.';';
		$result .= 'Educação,'.';';
		$result .= 'Cultura,'.';';
		$result .= 'Direitos da Cidadania,'.';';
		$result .= 'Urbanismo,'.';';
		$result .= 'Habitação,'.';';
		$result .= 'Saneamento,'.';';
		$result .= 'Gestão Ambiental,'.';';
		$result .= 'Ciência e Tecnologia,'.';';
		$result .= 'Agricultura,'.';';
		$result .= 'Organização Agrária,'.';';
		$result .= 'Indústria,'.';';
		$result .= 'Comércio e Serviços,'.';';
		$result .= 'Comunicações,'.';';
		$result .= 'Energia,'.';';
		$result .= 'Transporte,'.';';
		$result .= 'Desporto e Lazer,'.';';
		$result .= 'Total Despesa,'.';';
		*/
		mysqli_close($con);
		echo $result;
	}
	function Estado(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join funcoes_finbras on d.cod_funcaoFinbra = cod_funcoes_finbras 
							inner join estado e on m.cod_estado = e.cod_estado
							where (descricao = 'Legislativa' or descricao = 'Judiciária' or descricao = 'Essencial à Justiça' or descricao = 'Administração') and m.cod_estado =".$_GET["cod"]."
							group by m.cod_estado;");
		$row = $res->fetch_row();
		$x = $row[0];
		$res = $con->query("SELECT sum(d.valor) FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado 
							where d.informacao = 'Total Despesa'
							group by m.cod_estado;");
		$row = $res->fetch_row();
		$div = $x/$row[0];
		$result .= 'Despesas com poderes executivo, legislativo e judiciário&'.$div.';';

		mysqli_close($con);
		echo $result;
	}

	if($_GET["tipoDivisao"] == "M")
		Municipio();
	else if	($_GET["tipoDivisao"] == "MR")
		MesoRegiao();
	else
		Estado();
?>