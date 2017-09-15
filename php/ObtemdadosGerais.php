<?php
	include "ConexaoDB.php";
	if($_GET["tipo"] == "M"){
		$res = $con->query("SELECT  m.cod_municipio, m.nome, p.Populacao, p.PIB, p.PIB/p.Populacao, 
							(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total ocupados mais de 10 anos')/(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total população mais de 10 anos')as 'Possuem Ocupação(%)',
							(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Empregados')/(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total ocupados mais de 10 anos') as 'Empregado (%)',
							(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Rendimento Médio Mensal NULLHomens' limit 1) as 'Média rendimento homens',
							(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Rendimento Médio Mensal NULLMulheres' limit 1) as 'Média rendimento mulheres',
							(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Sem instrução e fundamental incompleto' limit 1)/ (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1) as 'Fundamental Incompleto(%)',
							((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Fundamental completo e médio incompleto' limit 1) +(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Médio completo e superior incompleto' limit 1) + (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Superior completo' limit 1)) / (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1) as 'Fundamental Completo',
							((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Médio completo e superior incompleto' limit 1) +(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Superior completo' limit 1)) / (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1) as 'Médio Completo',
							(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Superior completo' limit 1) / (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1) as 'Superior Completo'
							from pibmunicipalibge p 
                            inner join municipio m on m.cod_municipio = p.cod_municipio 
							where p.cod_ano = 12
");
	}
	else if($_GET["tipo"] == "E"){
		$res = $con->query("SELECT  e.cod_estado, e.uf, sum(p.Populacao) as 'População', sum(p.PIB) as 'Pib' , sum(p.PIB)/sum(p.Populacao) as 'Pib percapita', 
							sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total ocupados mais de 10 anos'))/sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total população mais de 10 anos')) as 'Possuem Ocupação(%)',
							sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Empregados'))/sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)',
							sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Rendimento Médio Mensal NULLHomens' limit 1)) as 'Média rendimento homens',
							sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Rendimento Médio Mensal NULLMulheres' limit 1)) as 'Média rendimento mulheres',
							sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Sem instrução e fundamental incompleto' limit 1))/ sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1)) as 'Fundamental Incompleto(%)',
							(sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Fundamental completo e médio incompleto' limit 1)) +sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Médio completo e superior incompleto' limit 1)) + sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Superior completo' limit 1)) / (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1)) as 'Fundamental Completo',
							(sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Médio completo e superior incompleto' limit 1)) +sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Superior completo' limit 1))) / sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1)) as 'Médio Completo',
							(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Superior completo' limit 1) / (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1) as 'Superior Completo'
							from pibmunicipalibge p 
                            inner join municipio m on m.cod_municipio = p.cod_municipio 
                            inner join estado e on m.cod_estado = e.cod_estado
							where p.cod_ano = 12
                            group by e.uf");
	}
	else if($_GET["tipo"] == "MR"){
		$res = $con->query("SELECT  mr.cod_mesoRegiao as 'codigo' , mr.nome as 'Nome', sum(p.Populacao) as 'População', sum(p.PIB) as 'Pib' , sum(p.PIB)/sum(p.Populacao) as 'Pib percapita', 
							sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total ocupados mais de 10 anos'))/sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total população mais de 10 anos')) as 'Possuem Ocupação(%)',
							sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Empregados'))/sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao like  'Total ocupados mais de 10 anos')) as 'Empregado (%)',
							sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Rendimento Médio Mensal NULLHomens' limit 1)) as 'Média rendimento homens',
							sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Rendimento Médio Mensal NULLMulheres' limit 1)) as 'Média rendimento mulheres',
							sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Sem instrução e fundamental incompleto' limit 1))/ sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1)) as 'Fundamental Incompleto(%)',
							(sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Fundamental completo e médio incompleto' limit 1)) +sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Médio completo e superior incompleto' limit 1)) + sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Superior completo' limit 1)) / (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1)) as 'Fundamental Completo',
							(sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Médio completo e superior incompleto' limit 1)) +sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Superior completo' limit 1))) / sum((select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1)) as 'Médio Completo',
							(select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Superior completo' limit 1) / (select dc.valor from dadoscenso2010 dc where dc.cod_municipio = m.cod_municipio and informacao =  'Total população mais de 10 anos' limit 1) as 'Superior Completo'
							from pibmunicipalibge p 
                            inner join municipio m on m.cod_municipio = p.cod_municipio 
                            inner join mesoregiao mr on m.cod_mesoRegiao = mr.cod_mesoRegiao
							where p.cod_ano = 12
                            group by mr.nome");
	}

	$result = "";
	while ($row = $res->fetch_row()) {
		if($row[1]!='undefined')
			$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].",".$row[5].",".$row[6].",".$row[7].",".$row[8].",".$row[9].",".$row[10].",".$row[11].",".$row[12].";";
	}   
	mysqli_close($con);
	echo $result;
?>