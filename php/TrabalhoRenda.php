<?php

function PossuemOcupacao(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, valor, m.nome, null from dadoscenso2010 dc
							inner join municipio m on m.cod_municipio = dc.cod_municipio
							inner join ano a on a.cod_ano = dc.cod_ano
							where dc.informacao = 'Total ocupados mais de 10 anos'
							and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
							group by a.cod_ano  ");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum(valor), e.uf,null from dadoscenso2010 dc
							inner join municipio m on m.cod_municipio = dc.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							inner join ano a on a.cod_ano = dc.cod_ano
							where dc.informacao = 'Total ocupados mais de 10 anos'
                            group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao, a.descricao, sum(valor), e.Nome, null from dadoscenso2010 dc
							inner join municipio m on m.cod_municipio = dc.cod_municipio
							inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
							inner join ano a on a.cod_ano = dc.cod_ano
							where dc.informacao = 'Total ocupados mais de 10 anos'
                            group by e.cod_mesoRegiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function PossuemOcupacaoPercentual(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, 100*(dc.valor),m.nome,(select dc.valor 
								from dadoscenso2010 dc 
								where dc.cod_municipio = m.cod_municipio
								and informacao like  'Total população mais de 10 anos') as 'Empregado (%)'
							from municipio m
                            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
                            inner join ano a on a.cod_ano = dc.cod_ano
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
							and informacao like  'Total ocupados mais de 10 anos'
                            group by m.cod_municipio, a.cod_ano
							order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, 100*sum(dc.valor),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total população mais de 10 anos')) as 'Empregado (%)'
							from municipio m
                            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
                            inner join ano a on a.cod_ano = dc.cod_ano
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
							and informacao like  'Total ocupados mais de 10 anos'
                            group by m.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, 100*sum(dc.valor),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total população mais de 10 anos')) as 'Empregado (%)'
							from municipio m
                            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
                            inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            inner join ano a on a.cod_ano = dc.cod_ano
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
							and informacao like  'Total ocupados mais de 10 anos'
                            group by m.cod_mesoRegiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}



function Empregados(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, dc.valor,m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos') as 'Empregado (%)' 
							from municipio m
				            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
				            inner join ano a on a.cod_ano = dc.cod_ano
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
				            and informacao like  'Empregados'
				            group by m.cod_municipio, dc.cod_ano
							order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, sum(dc.valor),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)'
			from municipio m
            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
            inner join ano a on a.cod_ano = dc.cod_ano
            inner join estado e on e.cod_estado = m.cod_estado
			where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
            and informacao like  'Empregados'
            group by m.cod_estado, dc.cod_ano
			order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, sum(dc.valor),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)'
			from municipio m
            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
            inner join ano a on a.cod_ano = dc.cod_ano
            inner join mesoregiao e on e.cod_mesoregiao = m.cod_mesoregiao
			where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
            and informacao like  'Empregados'
            group by m.cod_mesoregiao, dc.cod_ano
			order by m.cod_municipio");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}



function ComCarteiraAssinada(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, dc.valor,m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos') as 'Empregado (%)' 
							from municipio m
				            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
				            inner join ano a on a.cod_ano = dc.cod_ano
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
				            and informacao like  'Empregados  com carteira de trabalho assinada'
				            group by m.cod_municipio, dc.cod_ano
							order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, sum(dc.valor),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)'
			from municipio m
            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
            inner join ano a on a.cod_ano = dc.cod_ano
            inner join estado e on e.cod_estado = m.cod_estado
			where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
            and informacao like  'Empregados  com carteira de trabalho assinada'
            group by m.cod_estado, dc.cod_ano
			order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, sum(dc.valor),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)'
			from municipio m
            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
            inner join ano a on a.cod_ano = dc.cod_ano
            inner join mesoregiao e on e.cod_mesoregiao = m.cod_mesoregiao
			where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
            and informacao like  'Empregados  com carteira de trabalho assinada'
            group by m.cod_mesoregiao, dc.cod_ano
			order by m.cod_municipio");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function SemCarteiraAssinada(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, dc.valor,m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos') as 'Empregado (%)' 
							from municipio m
				            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
				            inner join ano a on a.cod_ano = dc.cod_ano
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
				            and informacao like  'Empregados  outros sem carteira de trabalho assinada'
				            group by m.cod_municipio, dc.cod_ano
							order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, sum(dc.valor),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)'
			from municipio m
            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
            inner join ano a on a.cod_ano = dc.cod_ano
            inner join estado e on e.cod_estado = m.cod_estado
			where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
            and informacao like  'Empregados  outros sem carteira de trabalho assinada'
            group by m.cod_estado, dc.cod_ano
			order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, sum(dc.valor),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)'
			from municipio m
            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
            inner join ano a on a.cod_ano = dc.cod_ano
            inner join mesoregiao e on e.cod_mesoregiao = m.cod_mesoregiao
			where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
            and informacao like  'Empregados  outros sem carteira de trabalho assinada'
            group by m.cod_mesoregiao, dc.cod_ano
			order by m.cod_municipio");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function FuncionariosPublicos(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, dc.valor,m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos') as 'Empregado (%)' 
							from municipio m
				            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
				            inner join ano a on a.cod_ano = dc.cod_ano
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
				            and informacao like  'Empregados  militares e funcionários públicos estatutários'
				            group by m.cod_municipio, dc.cod_ano
							order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, sum(dc.valor),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)'
			from municipio m
            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
            inner join ano a on a.cod_ano = dc.cod_ano
            inner join estado e on e.cod_estado = m.cod_estado
			where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
            and informacao like  'Empregados  militares e funcionários públicos estatutários'
            group by m.cod_estado, dc.cod_ano
			order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, sum(dc.valor),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)'
			from municipio m
            inner join dadoscenso2010 dc on dc.cod_municipio = m.cod_municipio
            inner join ano a on a.cod_ano = dc.cod_ano
            inner join mesoregiao e on e.cod_mesoregiao = m.cod_mesoregiao
			where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
            and informacao like  'Empregados  militares e funcionários públicos estatutários'
            group by m.cod_mesoregiao, dc.cod_ano
			order by m.cod_municipio");
	}
	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

//=========================================================================================================================

function OutroTipodeRenda(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Não remunerados em ajuda a membro do domicílio')+(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Trabalhadores na produção para o próprio consumo')+(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Empregadores')+(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Conta própria'),m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Total ocupados mais de 10 anos') as 'Empregado (%)' from municipio m where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Não remunerados em ajuda a membro do domicílio'))+sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Trabalhadores na produção para o próprio consumo'))+sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Empregadores'))+sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Conta própria')),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)' from
							municipio m inner join estado e on m.cod_estado = e.cod_estado
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Não remunerados em ajuda a membro do domicílio'))+sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Trabalhadores na produção para o próprio consumo'))+sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Empregadores'))+sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Conta própria')),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total ocupados mais de 10 anos')) from
							municipio m inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            group by e.Nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function HomensComRendimento(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,  a.descricao, (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Homens' limit 1),m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Pessoas Mais de 10 anos com rendimentos' limit 1) as 'Empregado (%)' from municipio m where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Homens' limit 1)),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Pessoas Mais de 10 anos com rendimentos' limit 1)) as 'Empregado (%)' from
							municipio m inner join estado e on m.cod_estado = e.cod_estado
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Homens' limit 1)),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Pessoas Mais de 10 anos com rendimentos' limit 1)) from
							municipio m inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            group by e.Nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function MulheresComRedendimento(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Mulheres' limit 1),m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Pessoas Mais de 10 anos com rendimentos' limit 1) as 'Empregado (%)' from municipio m where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mulheres' limit 1)),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Pessoas Mais de 10 anos com rendimentos' limit 1)) as 'Empregado (%)' from
							municipio m inner join estado e on m.cod_estado = e.cod_estado
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mulheres' limit 1)),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Pessoas Mais de 10 anos com rendimentos' limit 1)) from
							municipio m inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            group by e.Nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function MediaRendimentoHomens(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, valor, m.nome, null 
							from dadoscenso2010 dc
							inner join municipio m on m.cod_municipio = dc.cod_municipio
							where dc.informacao = 'Rendimento Médio Mensal NULLHomens'
							and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)  
                            group by m.cod_municipio, a.cod_ano order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum(valor)/count(*),e.uf, null 
							from dadoscenso2010 dc
							inner join municipio m on m.cod_municipio = dc.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where dc.informacao = 'Rendimento Médio Mensal NULLHomens'
                            group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao, a.descricao, sum(valor)/count(*), e.nome, null 
							from dadoscenso2010 dc
							inner join municipio m on m.cod_municipio = dc.cod_municipio
							inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
							where dc.informacao = 'Rendimento Médio Mensal NULLHomens'
                            group by e.cod_mesoRegiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function MediaRendimentoMulheres(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, valor, m.nome, null 
							from dadoscenso2010 dc
							inner join municipio m on m.cod_municipio = dc.cod_municipio
							where dc.informacao = 'Rendimento Médio Mensal NULLMulheres'
							and m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)   order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum(valor)/count(*), e.uf, null from dadoscenso2010 dc
							inner join municipio m on m.cod_municipio = dc.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where dc.informacao = 'Rendimento Médio Mensal NULLMulheres'
                            group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao, a.descricao, sum(valor)/count(*), e.nome, null from dadoscenso2010 dc
							inner join municipio m on m.cod_municipio = dc.cod_municipio
							inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
							where dc.informacao = 'Rendimento Médio Mensal NULLMulheres'
                            group by e.cod_mesoRegiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function AteUmSalario(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio  and informacao like  'Até 1 salário mínimo' limit 1),m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1) as 'Empregado (%)' from municipio m where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Até 1 salário mínimo' limit 1)),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) as 'Empregado (%)' from
							municipio m inner join estado e on m.cod_estado = e.cod_estado
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Até 1 salário mínimo' limit 1)),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) from
							municipio m inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            group by e.Nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function DeUmaDoisSalarios(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Mais de 1 a 2 salários mínimos' limit 1),m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Total' limit 1) as 'Empregado (%)' from municipio m where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 1 a 2 salários mínimos' limit 1)),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) as 'Empregado (%)' from
							municipio m inner join estado e on m.cod_estado = e.cod_estado
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 1 a 2 salários mínimos' limit 1)),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) from
							municipio m inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            group by e.Nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function DeDoisaTresSalarios(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Mais de 2 a 3 salários mínimos' limit 1),m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Total' limit 1) as 'Empregado (%)' from municipio m where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 2 a 3 salários mínimos' limit 1)),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) as 'Empregado (%)' from
							municipio m inner join estado e on m.cod_estado = e.cod_estado
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 2 a 3 salários mínimos' limit 1)),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) from
							municipio m inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            group by e.Nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function DeTresaCincoSalarios(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Mais de 3 a 5 salários mínimos' limit 1),m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Total' limit 1) as 'Empregado (%)' from municipio m where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 3 a 5 salários mínimos' limit 1)),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) as 'Empregado (%)' from
							municipio m inner join estado e on m.cod_estado = e.cod_estado
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 3 a 5 salários mínimos' limit 1)),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) from
							municipio m inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            group by e.Nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function DeCincoaDezSalarios(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Mais de 5 a 10 salários mínimos' limit 1),m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Total' limit 1) as 'Empregado (%)' from municipio m where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 5 a 10 salários mínimos' limit 1)),e.uf, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) as 'Empregado (%)' from
							municipio m inner join estado e on m.cod_estado = e.cod_estado
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao,a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 5 a 10 salários mínimos' limit 1)),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) from
							municipio m inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            group by e.Nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function DeDezaVinteSalarios(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Mais de 10 a 20 salários mínimos' limit 1),m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Total' limit 1) as 'Empregado (%)' from municipio m where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,  a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 10 a 20 salários mínimos' limit 1)),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) as 'Empregado (%)' from
							municipio m inner join estado e on m.cod_estado = e.cod_estado
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 10 a 20 salários mínimos' limit 1)),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) from
							municipio m inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            group by e.Nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function MaisdeVinteSalarios(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Mais de 20 salários mínimos' limit 1),m.nome,(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio   and informacao like  'Total' limit 1) as 'Empregado (%)' from municipio m where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)order by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 20 salários mínimos' limit 1)),e.uf,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) as 'Empregado (%)' from
							municipio m inner join estado e on m.cod_estado = e.cod_estado
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT e.cod_mesoRegiao, a.descricao, sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Mais de 20 salários mínimos' limit 1)),e.nome,sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total' limit 1)) from
							municipio m inner join mesoregiao e on m.cod_mesoRegiao = e.cod_mesoRegiao
                            group by e.Nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

if($_GET["variavel"] == "Possuem Ocupação"){
	PossuemOcupacao();
}
else if($_GET["variavel"] == "Possuem Ocupação%"){
	PossuemOcupacaoPercentual();
}
else if($_GET["variavel"] == "Empregados"){
	Empregados();
}
else if($_GET["variavel"] == "Com Carteira Assinada"){
	ComCarteiraAssinada();
}
else if($_GET["variavel"] == "Sem Carteira Assinada"){
	SemCarteiraAssinada();
}
else if($_GET["variavel"] == "Funcionários Públicos"){
	FuncionariosPublicos();
}
else if($_GET["variavel"] == "Outro tipo de renda"){
	OutroTipodeRenda();
}
else if($_GET["variavel"] == "Homens com rendimento"){
	HomensComRendimento();
}
else if($_GET["variavel"] == "Mulheres com rendimento"){
	MulheresComRedendimento();
}
else if($_GET["variavel"] == "Média rendimento homens"){
	MediaRendimentoHomens();
}
else if($_GET["variavel"] == "Média rendimento mulheres"){
	MediaRendimentoMulheres();
}
else if($_GET["variavel"] == "Até 1 salário"){
	AteUmSalario();
}
else if($_GET["variavel"] == "De 1 a 2 salários"){
	DeUmaDoisSalarios();
}
else if($_GET["variavel"] == "De 2 a 3 salários"){
	DeDoisaTresSalarios();
}
else if($_GET["variavel"] == "De 3 a 5 salários"){
	DeTresaCincoSalarios();
}
else if($_GET["variavel"] == "De 5 a 10 salários"){
	DeCincoaDezSalarios();
}
else if($_GET["variavel"] == "De 10 a 20 salários"){
	DeDezaVinteSalarios();
}
else if($_GET["variavel"] == "Mais de 20 salários"){
	MaisdeVinteSalarios();
}
?>