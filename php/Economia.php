<?php

function PIB(){
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT m.cod_municipio,'PIB', pm.PIB ,m.Nome, null 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,'PIB', sum(pm.PIB), e.Uf, null 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,'PIB', sum(pm.PIB), mr.Nome, null 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by mr.cod_mesoregiao");
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
		$res = $con->query("SELECT m.cod_municipio,'PIB', pm.PIB ,m.Nome, pm.Populacao
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]);
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,'PIB', sum(pm.PIB)/count(*), e.Uf, pm.Populacao 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,'PIB', sum(pm.PIB)/count(*), mr.Nome, pm.Populacao 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by mr.cod_mesoregiao");
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
		$res = $con->query("SELECT m.cod_municipio,'PIB', pm.Impostos_liquidos_de_subsidios_sobre_produtos ,m.Nome, null
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]);
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,'PIB', sum(pm.Impostos_liquidos_de_subsidios_sobre_produtos), e.Uf, null
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,'PIB', sum(pm.Impostos_liquidos_de_subsidios_sobre_produtos), mr.Nome, null 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by mr.cod_mesoregiao");
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
		$res = $con->query("SELECT m.cod_municipio,'PIB', pm.Valor_adicionado_bruto_da_Agropecuaria ,m.Nome, null
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]);
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,'PIB', sum(pm.Valor_adicionado_bruto_da_Agropecuaria), e.Uf, null
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,'PIB', sum(pm.Valor_adicionado_bruto_da_Agropecuaria), mr.Nome, null 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by mr.cod_mesoregiao");
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
		$res = $con->query("SELECT m.cod_municipio,'PIB', pm.Valor_adicionado_bruto_da_Industria ,m.Nome, null
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]);
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,'PIB', sum(pm.Valor_adicionado_bruto_da_Industria), e.Uf, null
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,'PIB', sum(pm.Valor_adicionado_bruto_da_Industria), mr.Nome, null 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by mr.cod_mesoregiao");
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
		$res = $con->query("SELECT m.cod_municipio,'PIB', pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc ,m.Nome, null
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]);
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,'PIB', sum(pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc), e.Uf, null
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,'PIB', sum(pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc), mr.Nome, null 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275) and pm.cod_ano =".$_GET["ano"]."
                            group by mr.cod_mesoregiao");
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
		$res = $con->query("SELECT m.cod_municipio, 'pib', sum(rm.valor), m.nome, null 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
							where rm.informacao = 'Total Receitas' and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,  'pib', sum(rm.valor), e.uf,null 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
                            inner join estado e on e.cod_estado = m.cod_estado
							where rm.informacao = 'Total Receitas' and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao,  'pib', sum(rm.valor),mr.Nome, null 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
                            inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
							where rm.informacao = 'Total Receitas' and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by mr.cod_mesoRegiao");
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
		$res = $con->query("SELECT m.cod_municipio, 'pib', sum(dm.valor),m.nome, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, 'pib', sum(dm.valor), e.uf, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join estado e on e.cod_estado = m.cod_estado
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao,  'pib', sum(dm.valor),mr.Nome, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by mr.cod_mesoRegiao");
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
		$res = $con->query("SELECT m.cod_municipio,  'pib', sum(dm.valor)/sum(rm.valor),m.nome, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join receitas_municipios rm on m.cod_municipio = rm.cod_municipio
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, 'pib', sum(dm.valor)/sum(rm.valor),e.uf, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join estado e on e.cod_estado = m.cod_estado
                            inner join receitas_municipios rm on m.cod_municipio = rm.cod_municipio
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao,  'pib', sum(dm.valor)/sum(rm.valor),mr.Nome, null 
							from despesas_municipios dm 
                            inner join municipio m on m.cod_municipio = dm.cod_municipio
                            inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
                            inner join receitas_municipios rm on m.cod_municipio = rm.cod_municipio
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by mr.cod_mesoRegiao");
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
		$res = $con->query("SELECT m.cod_municipio, 'pip', mdic.exportacao,m.Nome,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,'pip', mdic.exportacao,e.uf,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join estado e on e.cod_estado = m.cod_estado
							group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao, 'pip', mdic.exportacaomr, mr.Nome,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
							group by mr.cod_mesoRegiao");
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
		$res = $con->query("SELECT m.cod_municipio, 'pip', mdic.importacao, m.Nome,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado, 'pip', sum(mdic.importacao), e.uf,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join estado e on e.cod_estado = m.cod_estado
							group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao, 'pip', sum(mdic.importacao), mr.Nome, from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
							group by mr.cod_mesoRegiao");
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
		$res = $con->query("SELECT m.cod_municipio, 'pip', mdic.exportacao - mdic.importacaom ,m.Nome,null  from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,'pip', sum(mdic.exportacao) - sum(mdic.importacao), e.uf,null  from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join estado e on e.cod_estado = m.cod_estado
							group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao,'pip', sum(mdic.exportacao) - sum(mdic.importacao), mr.Nome,null from dadosmdic mdic
							inner join municipio m on m.cod_municipio = mdic.cod_municipio
							inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
							group by mr.cod_mesoRegiao");
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
		$res = $con->query("SELECT m.cod_municipio,'PIB', sum(pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc) ,m.Nome, null 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio 					
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
                            group by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,'PIB', sum(pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc), e.Uf, null 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join estado e on m.cod_estado = e.cod_estado
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                            group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoregiao,'PIB', sum(pm.Valor_add_bru_Admin_sau_edu_pubs_seg_soc), mr.Nome, null 
							from pibmunicipalibge pm inner join municipio m on pm.cod_municipio = m.cod_municipio
                            inner join mesoregiao mr on m.cod_mesoregiao = mr.cod_mesoregiao
							where m.cod_municipio not in (2206720, 1504752, 4212650, 4220000, 4314548, 5006275)
                            group by mr.cod_mesoregiao");
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
		$res = $con->query("SELECT m.cod_municipio, 'pib', sum(rm.valor) -(select valor from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio)  , m.nome, (select valor from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio) 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
							where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by m.cod_municipio");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT e.cod_estado,  'pib', sum(rm.valor)- (select sum(valor) from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio group by m.cod_estado), e.uf,(select sum(valor) from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio group by m.cod_estado) 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
                            inner join estado e on e.cod_estado = m.cod_estado
							where rm.informacao = 'Total Receitas' and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by e.cod_estado");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT mr.cod_mesoRegiao,  'pib', sum(rm.valor)- (select sum(valor) from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio group by m.cod_mesoregiao),mr.Nome, (select sum(valor) from receitas_municipios where informacao = 'Total Receitas' and cod_municipio = m.cod_municipio group by m.cod_mesoregiao) 
							from receitas_municipios rm 
                            inner join municipio m on m.cod_municipio = rm.cod_municipio
                            inner join mesoregiao mr on mr.cod_mesoRegiao = m.cod_mesoRegiao
							where rm.informacao = 'Total Receitas' and m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
							group by mr.cod_mesoRegiao");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
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
?>