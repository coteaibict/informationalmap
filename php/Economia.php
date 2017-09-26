<?php

function PIB(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, pm.PIB ,m.Nome, null 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio, a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum(pm.PIB), e.Uf, null 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                            group by e.cod_estado, a.cod_ano,a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,a.descricao, sum(pm.PIB), mr.Nome, null 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                            group by mr.cod_mesoregiao, a.cod_ano, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function PibPerCapita(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, pm.PIB ,m.Nome, pm.Populacao
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
							group by m.cod_municipio, a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum(pm.PIB)/count(*), e.Uf, pm.Populacao 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) 
                            group by e.cod_estado, a.cod_ano, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,a.descricao, sum(pm.PIB)/count(*), mr.Nome, pm.Populacao 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) 
                            group by mr.cod_mesoregiao, a.cod_ano, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function ImpostosRecolhidos(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, pm.Impostos_liquidos_de_subsidios_sobre_produtos ,m.Nome, null
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio,a.cod_ano ");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum(pm.Impostos_liquidos_de_subsidios_sobre_produtos), e.Uf, null
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) 
                            group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,a.descricao, sum(pm.Impostos_liquidos_de_subsidios_sobre_produtos), mr.Nome, null 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) 
                            group by mr.cod_mesoregiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}


function PibAgropecuaria(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, pm.Valor_adicionado_bruto_da_Agropecuaria ,m.Nome, null
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
							group by m.cod_municipio, a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum(pm.Valor_adicionado_bruto_da_Agropecuaria), e.Uf, null
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) 
                            group by e.cod_estado, a.cod_ano, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,a.descricao, sum(pm.Valor_adicionado_bruto_da_Agropecuaria), mr.Nome, null 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) 
                            group by mr.cod_mesoregiao, a.cod_ano, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function PibIndustrial(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, pm.Valor_adicionado_bruto_da_Industria ,m.Nome, null
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
							group by m.cod_municipio, a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum(pm.Valor_adicionado_bruto_da_Industria), e.Uf, null
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) 
                            group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,a.descricao, sum(pm.Valor_adicionado_bruto_da_Industria), mr.Nome, null 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) 
                            group by mr.cod_mesoregiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function PibServicos(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc ,m.Nome, null
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) 
							group by m.cod_municipio, a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum(pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc), e.Uf, null
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) 
                            group by e.cod_estado, a.cod_ano,a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,a.descricao, sum(pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc), mr.Nome, null 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) 
                            group by mr.cod_mesoregiao, a.cod_ano,a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function ReceitasTotais(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, sum(rm.valor), m.nome, null 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
                            inner join ano a on a.cod_ano = rm.cod_ano
							where rm.informacao = 'Total Receitas' and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio,a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,  a.descricao, sum(rm.valor), e.uf,null 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
                            inner join estado e on e.cod_estado = m.cod_estado
                            inner join ano a on a.cod_ano = rm.cod_ano
							where rm.informacao = 'Total Receitas' and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao,  a.descricao, sum(rm.valor),mr.Nome, null 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
                            inner join ano a on a.cod_ano = rm.cod_ano
                            inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
							where rm.informacao = 'Total Receitas' and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by mr.cod_mesoregiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function DespesasTotais(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, sum(dm.valor),m.nome, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join ano a on a.cod_ano = dm.cod_ano
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio,a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum(dm.valor), e.uf, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join estado e on e.cod_estado = m.cod_estado
                            inner join ano a on a.cod_ano = dm.cod_ano
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao,  a.descricao, sum(dm.valor),mr.Nome, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
                            inner join ano a on a.cod_ano = dm.cod_ano
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by mr.cod_mesoregiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function DespesasSobreReceitas(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,  a.descricao, sum(dm.valor)*100/sum(rm.valor),m.nome, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join ano a on a.cod_ano = dm.cod_ano
                            inner join receitas_municipios rm on m.cod_municipio = rm.cod_municipio
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio,a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum(dm.valor)*100/sum(rm.valor),e.uf, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join estado e on e.cod_estado = m.cod_estado
                            inner join ano a on a.cod_ano = dm.cod_ano
                            inner join receitas_municipios rm on m.cod_municipio = rm.cod_municipio
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao,  a.descricao, sum(dm.valor)*100/sum(rm.valor),mr.Nome, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join ano a on a.cod_ano = dm.cod_ano
                            inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
                            inner join receitas_municipios rm on m.cod_municipio = rm.cod_municipio
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by mr.cod_mesoregiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function Exportacoes(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, mdic.exportacao,m.Nome,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join ano a on a.cod_ano = mdic.cod_ano
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio,a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, mdic.exportacao,e.uf,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join ano a on a.cod_ano = mdic.cod_ano
							inner join estado e on e.cod_estado = m.cod_estado
							group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao, a.descricao, mdic.exportacao, mr.Nome,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
							inner join ano a on a.cod_ano = mdic.cod_ano
							group by mr.cod_mesoregiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function Importacoes(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, mdic.importacao, m.Nome,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join ano a on a.cod_ano = mdic.cod_ano
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio,a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, a.descricao, sum(mdic.importacao), e.uf,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join ano a on a.cod_ano = mdic.cod_ano
							inner join estado e on e.cod_estado = m.cod_estado
							group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao, a.descricao, sum(mdic.importacao), mr.Nome,null 
							from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join ano a on a.cod_ano = mdic.cod_ano
							inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
							group by mr.cod_mesoregiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function BalancaComercial(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, mdic.exportacao - mdic.importacao ,m.Nome,null  from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join ano a on a.cod_ano = mdic.cod_ano
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio,a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum(mdic.exportacao) - sum(mdic.importacao), e.uf,null  from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join estado e on e.cod_estado = m.cod_estado
							inner join ano a on a.cod_ano = mdic.cod_ano
							group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao,a.descricao, sum(mdic.exportacao) - sum(mdic.importacao), mr.Nome,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
							inner join ano a on a.cod_ano = mdic.cod_ano
							group by mr.cod_mesoregiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}
function PIBGoverno(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,a.descricao, sum(pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc) ,m.Nome, null 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
                            group by m.cod_municipio,a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,a.descricao, sum(pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc), e.Uf, null 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                            group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,a.descricao, sum(pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc), mr.Nome, null 
							from pibmunicipalibge pm inner join ano a on a.cod_ano = pm.cod_ano inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                            group by mr.cod_mesoregiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}
function ReceitasProprias(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao, sum(rm.valor) -(select valor from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio)  , m.nome, (select valor from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio) 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
                            inner join ano a on a.cod_ano = rm.cod_ano
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio,a.cod_ano");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,  a.descricao, sum(rm.valor)- (select sum(valor) from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio group by m.cod_estado), e.uf,(select sum(valor) from receitas_municipios srm inner join municipio sm on sm.cod_municipio = srm.cod_municipio where informacao = 'Total Receitas' and sm.cod_estado = m.cod_estado)
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
                            inner join estado e on e.cod_estado = m.cod_estado
                            inner join ano a on a.cod_ano = rm.cod_ano
							where rm.informacao = 'Total Receitas' and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by e.cod_estado, a.cod_ano");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao,  a.descricao, sum(rm.valor)- (select sum(valor) from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio group by m.cod_mesoregiao),mr.Nome, (select sum(valor) from receitas_municipios srm inner join municipio sm on sm.cod_municipio = srm.cod_municipio where informacao = 'Total Receitas' and sm.cod_mesoregiao = m.cod_mesoregiao) 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
                            inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
                            inner join ano a on a.cod_ano = rm.cod_ano
							where rm.informacao = 'Total Receitas' and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by mr.cod_mesoregiao, a.cod_ano");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
	}   
	mysqli_close($con);
	echo $result;
}

function ReceitaTransferenciaRepasse(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio, a.descricao,  
							IFNULL((select valor from receitas_municipios where informacao = '1.7.0.0.00.00.00 - Transferências Correntes' and cod_municipio = m.cod_municipio) ,0)+
							IFNULL((select valor from receitas_municipios where informacao = '1.7.2.2.01.01.00 - Cota-Parte do ICMS' and cod_municipio = m.cod_municipio) ,0)+
							IFNULL((select valor from receitas_municipios where informacao = '1.7.2.2.01.04.00 - Cota-Parte do IPI sobre Exportação' and cod_municipio = m.cod_municipio) ,0)+
							IFNULL((select valor from receitas_municipios where informacao = '1.9.0.0.00.00.00 - Outras Receitas Correntes' and cod_municipio = m.cod_municipio) ,0)+
							IFNULL((select valor from receitas_municipios where informacao = '2.0.0.0.00.00.00 - Receitas de Capital' and cod_municipio = m.cod_municipio) ,0)+
							IFNULL((select valor from receitas_municipios where informacao = '2.1.0.0.00.00.00 - Operações de Crédito' and cod_municipio = m.cod_municipio) ,0)+
							IFNULL((select valor from receitas_municipios where informacao = '2.3.0.0.00.00.00 - Amortização de Empréstimos' and cod_municipio = m.cod_municipio) ,0)+
							IFNULL((select valor from receitas_municipios where informacao = '2.4.0.0.00.00.00 - Transferências de Capital' and cod_municipio = m.cod_municipio) ,0)+
							IFNULL((select valor from receitas_municipios where informacao = '2.5.0.0.00.00.00 - Outras Receitas de Capital ' and cod_municipio = m.cod_municipio) ,0) 
							, m.nome, (select valor from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio) 
					from receitas_municipios rm 
	                inner join municipio m on m.cod_municipio = rm.cod_municipio
	                inner join ano a on a.cod_ano = rm.cod_ano
					where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
	                group by m.cod_municipio,a.cod_ano");
		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT distinct(cod_estado) from municipio order by cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$estados[$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '1.7.0.0.00.00.00 - Transferências Correntes' group by m.cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[0][$i] = $row[0];
	    	$i++;
		}		
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '1.7.2.2.01.01.00 - Cota-Parte do ICMS' group by m.cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[1][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '1.7.2.2.01.04.00 - Cota-Parte do IPI sobre Exportação' group by m.cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[2][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '1.9.0.0.00.00.00 - Outras Receitas Correntes' group by m.cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[3][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '2.0.0.0.00.00.00 - Receitas de Capital' group by m.cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[4][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '2.1.0.0.00.00.00 - Operações de Crédito' group by m.cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[5][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '2.3.0.0.00.00.00 - Amortização de Empréstimos' group by m.cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[6][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '2.4.0.0.00.00.00 - Transferências de Capital' group by m.cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[7][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '2.5.0.0.00.00.00 - Outras Receitas de Capital' group by m.cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[8][$i] = $row[0];
	    	$i++;
		}
		for($j=0;$j<$i;$j++){
			$valorT[$j]=0;
			for($k=0;$k<9;$k++){
				$valorT[$j]+=$valor[$k][$j];
			}

		}
		
		$res = $con->query("SELECT distinct(uf) from estado order by cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$nomes[$i] = $row[0];
	    	$i++;
		}

		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on m.cod_municipio = rm.cod_municipio where informacao = 'Total Receitas' group by m.cod_estado order by m.cod_estado");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$total[$i] = $row[0];
	    	$i++;
		}
		$i = 0;
		$result = "";
		while($i < $j){
			$result .= $estados[$i] . ",,".$valorT[$i].",".$nomes[$i].",".$total[$i].";";
			$i++;
		}


		mysqli_close($con);
		echo $result;
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT distinct(cod_mesoRegiao) from municipio order by cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$mesoRegiao[$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '1.7.0.0.00.00.00 - Transferências Correntes' group by m.cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[0][$i] = $row[0];
	    	$i++;
		}		
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '1.7.2.2.01.01.00 - Cota-Parte do ICMS' group by m.cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[1][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '1.7.2.2.01.04.00 - Cota-Parte do IPI sobre Exportação' group by m.cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[2][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '1.9.0.0.00.00.00 - Outras Receitas Correntes' group by m.cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[3][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '2.0.0.0.00.00.00 - Receitas de Capital' group by m.cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[4][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '2.1.0.0.00.00.00 - Operações de Crédito' group by m.cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[5][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '2.3.0.0.00.00.00 - Amortização de Empréstimos' group by m.cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[6][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '2.4.0.0.00.00.00 - Transferências de Capital' group by m.cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[7][$i] = $row[0];
	    	$i++;
		}
		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on rm.cod_municipio = m.cod_municipio where informacao = '2.5.0.0.00.00.00 - Outras Receitas de Capital' group by m.cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$valor[8][$i] = $row[0];
	    	$i++;
		}
		for($j=0;$j<$i;$j++){
			$valorT[$j]=0;
			for($k=0;$k<9;$k++){
				$valorT[$j]+=$valor[$k][$j];
			}

		}
		$res = $con->query("SELECT distinct(Nome) from mesoRegiao order by cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$nomes[$i] = $row[0];
	    	$i++;
		}

		$res = $con->query("SELECT sum(valor) from receitas_municipios rm inner join municipio m on m.cod_municipio = rm.cod_municipio where informacao = 'Total Receitas' group by m.cod_estado order by m.cod_mesoRegiao");
		$i = 0;
		while ($row = $res->fetch_row()) {
			$total[$i] = $row[0];
	    	$i++;
		}
		$i = 0;
		$result = "";
		while($i < $j){
			$result .= $mesoRegiao[$i] . ",,".$valorT[$i].",".$nomes[$i].",".$total[$i].";";
			$i++;
		}
		mysqli_close($con);
		echo $result;
	}
}


function DespesasCorrentes(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, '',  sum(dm.valor), m.nome, null
				                from  municipio m inner join despesas_municipios dm on m.cod_municipio = dm.cod_municipio
				                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and (dm.informacao = '3.3.00.00.00.00 - Outras Despesas Correntes '
			                    or dm.informacao = '3.1.00.00.00.00 - Pessoal e Encargos Sociais ')
			                    group by m.cod_municipio,a.cod_ano
			                    order by m.cod_municipio");
			$resd = $con->query("SELECT valor 
								from despesas_municipios dm
								inner join ano a on a.cod_ano = dm.cod_ano
								where informacao = 'Total Despesa'
                                group by m.cod_municipio,a.cod_ano
								order by cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT m.cod_estado, '',  sum(dm.valor), e.uf, null
				                from  municipio m inner join despesas_municipios dm on m.cod_municipio = dm.cod_municipio
                                inner join estado e on e.cod_estado = m.cod_estado
                                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and (dm.informacao = '3.3.00.00.00.00 - Outras Despesas Correntes '
			                    or dm.informacao = '3.1.00.00.00.00 - Pessoal e Encargos Sociais ')
			                    group by m.cod_estado,a.cod_ano
			                    order by m.cod_estado");
			$resd = $con->query("SELECT sum(dm.valor) 
								from despesas_municipios dm 
						        inner join municipio m on m.cod_municipio = dm.cod_municipio
						        inner join estado e on e.cod_estado = m.cod_estado
						        inner join ano a on a.cod_ano = dm.cod_ano
								where dm.informacao = 'Total Despesa'
						        group by m.cod_estado, a.cod_ano
								order by m.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT m.cod_mesoregiao, '',  sum(dm.valor), e.nome, null
				                from  municipio m inner join despesas_municipios dm on m.cod_municipio = dm.cod_municipio
                                inner join mesoregiao e on e.cod_mesoregiao = m.cod_mesoregiao
                                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and (dm.informacao = '3.3.00.00.00.00 - Outras Despesas Correntes '
			                    or dm.informacao = '3.1.00.00.00.00 - Pessoal e Encargos Sociais ')
			                    group by m.cod_mesoregiao, a.cod_ano
			                    order by m.cod_mesoregiao");

			$resd = $con->query("SELECT sum(dm.valor) 
								from despesas_municipios dm 
						        inner join municipio m on m.cod_municipio = dm.cod_municipio
						        inner join ano a on a.cod_ano = dm.cod_ano
						        inner join mesoregiao e on e.cod_mesoregiao = m.cod_mesoregiao
								where dm.informacao = 'Total Despesa'
						        group by m.cod_mesoregiao, a.cod_ano
								order by m.cod_mesoregiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
}

function DespesasCapital(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio, '',  sum(dm.valor), m.nome, null
				                from  municipio m inner join despesas_municipios dm on m.cod_municipio = dm.cod_municipio
				                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and (dm.informacao = '4.4.00.00.00.00 - Investimentos '
			                    or dm.informacao = '4.6.00.00.00.00 - Amortização da Dívida ')
			                    group by m.cod_municipio,a.cod_ano
			                    order by m.cod_municipio");
			
			$resd = $con->query("SELECT valor 
								from despesas_municipios dm
								inner join ano a on a.cod_ano = dm.cod_ano
								where informacao = 'Total Despesa'
                                group by cod_municipio
								order by cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT m.cod_estado, '',  sum(dm.valor), e.uf, null
				                from  municipio m inner join despesas_municipios dm on m.cod_municipio = dm.cod_municipio
                                inner join estado e on e.cod_estado = m.cod_estado
                                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and (dm.informacao = '4.4.00.00.00.00 - Investimentos '
			                    or dm.informacao = '4.6.00.00.00.00 - Amortização da Dívida ')
			                    group by m.cod_estado, a.cod_ano
			                    order by m.cod_estado");
			$resd = $con->query("SELECT sum(dm.valor) 
								from despesas_municipios dm 
						        inner join municipio m on m.cod_municipio = dm.cod_municipio
						        inner join estado e on e.cod_estado = m.cod_estado
						        inner join ano a on a.cod_ano = dm.cod_ano
								where dm.informacao = 'Total Despesa'
						        group by m.cod_estado, a.cod_ano
								order by m.cod_estado");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT m.cod_mesoregiao, '',  sum(dm.valor), e.nome, null
				                from  municipio m inner join despesas_municipios dm on m.cod_municipio = dm.cod_municipio
                                inner join mesoregiao e on e.cod_mesoregiao = m.cod_mesoregiao
                                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and (dm.informacao = '4.4.00.00.00.00 - Investimentos '
			                    or dm.informacao = '4.6.00.00.00.00 - Amortização da Dívida ')
			                    group by m.cod_mesoregiao,a.cod_ano
			                    order by m.cod_mesoregiao");
			
			$resd = $con->query("SELECT sum(dm.valor) 
								from despesas_municipios dm 
						        inner join municipio m on m.cod_municipio = dm.cod_municipio
						        inner join mesoregiao e on e.cod_mesoregiao = m.cod_mesoregiao
						        inner join ano a on a.cod_ano = dm.cod_ano
								where dm.informacao = 'Total Despesa'
						        group by m.cod_mesoregiao, a.cod_ano
								order by m.cod_mesoregiao");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
}
if ($_GET["variavel"] == "PIB"){
	PIB();
}
else if ($_GET["variavel"] == "PIB per Capita"){
	PibPerCapita();
}
else if ($_GET["variavel"] == "Impostos Recolhidos"){
	ImpostosRecolhidos();
}
else if ($_GET["variavel"] == "PIB Agropecuária"){
	PibAgropecuaria();
}
else if ($_GET["variavel"] == "PIB Indústria"){
	PibIndustrial();
}
else if ($_GET["variavel"] == "PIB Serviços"){
	PibServicos();
}
else if ($_GET["variavel"] == "Receitas Totais"){
	ReceitasTotais();
}
else if ($_GET["variavel"] == "Despesas Totais"){
	DespesasTotais();
}
else if ($_GET["variavel"] == "% da despesa sobre a receita"){
	DespesasSobreReceitas();
}
else if ($_GET["variavel"] == "Exportações"){
	Exportacoes();
}
else if ($_GET["variavel"] == "Importações"){
	Importacoes();
}
else if ($_GET["variavel"] == "Balança comercial"){
	BalancaComercial();
}
else if ($_GET["variavel"] == "PIB Governo"){
	PIBGoverno();
}
else if ($_GET["variavel"] == "Receitas Próprias"){
	ReceitasProprias();
}
else if ($_GET["variavel"] == "Receitas de Transferências e Repasses"){
	ReceitaTransferenciaRepasse();
}
else if($_GET["variavel"] == "Despesas Correntes"){
	DespesasCorrentes();
}
else if($_GET["variavel"] == "Despesas de Capital"){
	DespesasCapital();
}

?>