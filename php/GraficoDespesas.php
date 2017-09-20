<?php
	function Brasil(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where (descricao = 'Legislativa' or descricao = 'Judiciária' or descricao = 'Essencial à Justiça' or descricao = 'Administração')
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$res = $con->query("SELECT sum(valor) FROM despesas_municipios where informacao = 'Total Despesa'							");
		$row = $res->fetch_row();
		$tot = $row[0];

		$div = $x/$tot;
		$result .= 'Despesas com poderes executivo, legislativo e judiciário&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Defesa Nacional' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Defesa Nacional&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Segurança Pública' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Segurança Pública&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Relações Exteriores' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Relações Exteriores&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Assistência Social' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Assistência Social&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Previdência Social' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Previdência Social&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Saúde' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Saúde&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Trabalho' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Trabalho&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Educação' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Educação&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Cultura' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Cultura&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Direitos da Cidadania' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Direitos da Cidadania&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Urbanismo' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Urbanismo&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Habitação' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Habitação&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Saneamento' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Saneamento&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Gestão Ambiental' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Gestão Ambiental&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Ciência e Tecnologia' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Ciência e Tecnologia&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Agricultura' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Agricultura&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Organização Agrária' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Organização Agrária&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Indústria' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Indústria&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Comércio e Serviços' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Comércio e Serviços&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Comunicações' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Comunicações&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Energia' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Energia&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Transporte' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Transporte&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Desporto e Lazer' 
							");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Desporto e Lazer&'.$div.';';
/*
		$result .= 'Total Despesa&'.$tot.';';

		*/
		mysqli_close($con);
		echo $result;
	}
	function Municipio(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where (descricao = 'Legislativa' or descricao = 'Judiciária' or descricao = 'Essencial à Justiça' or descricao = 'Administração')
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$res = $con->query("SELECT valor FROM despesas_municipios where informacao = 'Total Despesa'							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		$div = $x/$tot;
		$result .= 'Despesas com poderes executivo, legislativo e judiciário&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Defesa Nacional' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Defesa Nacional&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Segurança Pública' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Segurança Pública&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Relações Exteriores' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Relações Exteriores&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Assistência Social' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Assistência Social&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Previdência Social' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Previdência Social&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Saúde' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Saúde&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Trabalho' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Trabalho&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Educação' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Educação&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Cultura' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Cultura&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Direitos da Cidadania' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Direitos da Cidadania&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Urbanismo' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Urbanismo&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Habitação' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Habitação&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Saneamento' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Saneamento&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Gestão Ambiental' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Gestão Ambiental&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Ciência e Tecnologia' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Ciência e Tecnologia&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Agricultura' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Agricultura&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Organização Agrária' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Organização Agrária&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Indústria' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Indústria&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Comércio e Serviços' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Comércio e Serviços&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Comunicações' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Comunicações&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Energia' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Energia&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Transporte' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Transporte&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Desporto e Lazer' 
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Desporto e Lazer&'.$div.';';
/*
		$result .= 'Total Despesa&'.$tot.';';

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
							where (descricao = 'Legislativa' or descricao = 'Judiciária' or descricao = 'Essencial à Justiça' or descricao = 'Administração') 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$res = $con->query("SELECT sum(d.valor) FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado 
							where d.informacao = 'Total Despesa'
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];
		$div = $x/$tot;
		$result .= 'Despesas com poderes executivo, legislativo e judiciário&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras
							inner join estado e on m.cod_estado = e.cod_estado 
							where descricao = 'Defesa Nacional' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Defesa Nacional&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras				 
							where descricao = 'Segurança Pública' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Segurança Pública&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Relações Exteriores' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Relações Exteriores&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios  d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Assistência Social' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Assistência Social&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios  d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Previdência Social' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Previdência Social&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Saúde' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Saúde&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Trabalho' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Trabalho&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Educação' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Educação&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Cultura' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Cultura&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Direitos da Cidadania' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Direitos da Cidadania&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Urbanismo' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Urbanismo&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Habitação' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Habitação&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Saneamento' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Saneamento&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Gestão Ambiental' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Gestão Ambiental&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Ciência e Tecnologia' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Ciência e Tecnologia&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Agricultura' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Agricultura&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Organização Agrária' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Organização Agrária&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Indústria' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Indústria&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Comércio e Serviços' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Comércio e Serviços&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Comunicações' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Comunicações&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Energia' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Energia&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Transporte' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Transporte&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Desporto e Lazer' 
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Desporto e Lazer&'.$div.';';
/*
		$result .= 'Total Despesa&'.$tot.';';

		*/

		mysqli_close($con);
		echo $result;
	}
	function MesoRegiao(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join funcoes_finbras on d.cod_funcaoFinbra = cod_funcoes_finbras 
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where (descricao = 'Legislativa' or descricao = 'Judiciária' or descricao = 'Essencial à Justiça' or descricao = 'Administração') 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$res = $con->query("SELECT sum(d.valor) FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao 
							where d.informacao = 'Total Despesa'
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];
		$div = $x/$tot;
		$result .= 'Despesas com poderes executivo, legislativo e judiciário&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao 
							where descricao = 'Defesa Nacional' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Defesa Nacional&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras				 
							where descricao = 'Segurança Pública' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Segurança Pública&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao 
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Relações Exteriores' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Relações Exteriores&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios  d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Assistência Social' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Assistência Social&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios  d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Previdência Social' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Previdência Social&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Saúde' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Saúde&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Trabalho' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Trabalho&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Educação' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Educação&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Cultura' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Cultura&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Direitos da Cidadania' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Direitos da Cidadania&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Urbanismo' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Urbanismo&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Habitação' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Habitação&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Saneamento' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Saneamento&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Gestão Ambiental' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Gestão Ambiental&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Ciência e Tecnologia' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Ciência e Tecnologia&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Agricultura' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Agricultura&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Organização Agrária' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Organização Agrária&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Indústria' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Indústria&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Comércio e Serviços' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Comércio e Serviços&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Comunicações' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Comunicações&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Energia' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Energia&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Transporte' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Transporte&'.$div.';';

		$res = $con->query("SELECT valor 
							FROM despesas_municipios d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							inner join funcoes_finbras on cod_funcaoFinbra = cod_funcoes_finbras 
							where descricao = 'Desporto e Lazer' 
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];
		$div = $x/$tot;
		$result .= 'Desporto e Lazer&'.$div.';';
/*
		$result .= 'Total Despesa&'.$tot.';';

		*/

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