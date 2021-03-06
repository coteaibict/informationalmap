<?php
	function QntMedicos(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,  a.descricao,  dm.valor, m.nome, null
				                from  municipio m inner join variaveisdobim dm on m.cod_municipio = dm.cod_municipio
				                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and dm.informacao = 'Quantidade de médicos (*) '
			                    group by m.cod_municipio, a.cod_ano
			                    order by m.cod_municipio");
			
			$resd = $con->query("SELECT dm.valor 
								from variaveisdobim dm
								inner join ano a on a.cod_ano = dm.cod_ano
								where dm.informacao = 'Recursos humanos da área da saúde - Total(*) '
                                group by dm.cod_municipio, a.cod_ano
								order by dm.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT m.cod_estado,  a.descricao,  sum(dm.valor), e.uf, null
				                from  municipio m inner join variaveisdobim dm on m.cod_municipio = dm.cod_municipio
				                inner join estado e on e.cod_estado = m.cod_estado
				                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and dm.informacao = 'Quantidade de médicos (*) '
			                    group by m.cod_estado, a.cod_ano
			                    order by m.cod_municipio");
			
			$resd = $con->query("SELECT sum(dm.valor) 
								from variaveisdobim dm 
						        inner join municipio m on m.cod_municipio = dm.cod_municipio
						        inner join estado e on e.cod_estado = m.cod_estado
						        inner join ano a on a.cod_ano = dm.cod_ano
								where dm.informacao = 'Recursos humanos da área da saúde - Total(*) '
						        group by m.cod_estado, a.cod_ano
								order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT m.cod_mesoRegiao,  a.descricao,  sum(dm.valor), e.nome, null
				                from  municipio m inner join variaveisdobim dm on m.cod_municipio = dm.cod_municipio
				                inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
				                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and dm.informacao = 'Quantidade de médicos (*) '
			                    group by m.cod_mesoRegiao, a.cod_ano
			                    order by m.cod_municipio");
			
			$resd = $con->query("SELECT sum(dm.valor) 
								from variaveisdobim dm 
						        inner join municipio m on m.cod_municipio = dm.cod_municipio
						        inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
						        inner join ano a on a.cod_ano = dm.cod_ano
								where dm.informacao = 'Recursos humanos da área da saúde - Total(*) '
						        group by m.cod_mesoRegiao, a.cod_ano
								order by m.cod_municipio");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
			$rowd = $resd->fetch_row();
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$rowd[0].";";
		}   
		mysqli_close($con);
		echo $result;
	}
	function RecursosSaude(){
		include "ConexaoDB.php";
		if($_GET["tipo"] == "M"){
			$res = $con->query("SELECT m.cod_municipio,  a.descricao,  dm.valor, m.nome, null
				                from  municipio m inner join variaveisdobim dm on m.cod_municipio = dm.cod_municipio
				                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and dm.informacao = 'Recursos humanos da área da saúde - Total(*) '
			                    group by m.cod_municipio, a.cod_ano
			                    order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "E"){
			$res = $con->query("SELECT m.cod_estado,  a.descricao,  sum(dm.valor), e.uf, null
				                from  municipio m inner join variaveisdobim dm on m.cod_municipio = dm.cod_municipio
				                inner join estado e on e.cod_estado = m.cod_estado
				                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and dm.informacao = 'Recursos humanos da área da saúde - Total(*) '
			                    group by m.cod_estado, a.cod_ano
			                    order by m.cod_municipio");
		}
		else if($_GET["tipo"] == "MR"){
			$res = $con->query("SELECT m.cod_mesoRegiao,  a.descricao,  sum(dm.valor), e.nome, null
				                from  municipio m inner join variaveisdobim dm on m.cod_municipio = dm.cod_municipio
				                inner join mesoRegiao e on e.cod_mesoRegiao = m.cod_mesoRegiao
				                inner join ano a on a.cod_ano = dm.cod_ano
								where m.cod_municipio not in (2206720, 1504752,4212650, 4220000, 4314548, 5006275)
			                    and dm.informacao = 'Recursos humanos da área da saúde - Total(*) '
			                    group by m.cod_mesoRegiao, a.cod_ano
			                    order by m.cod_municipio");
		}

		$result = "";
		while ($row = $res->fetch_row()) {
	    	$result .= $row[0] . "," . $row[1] .",". $row[2].','.$row[3].",".$row[4].";";
		}     
		mysqli_close($con);
		echo $result;
	}
	if ($_GET["variavel"] == 'Quantidade de Médicos'){
		QntMedicos();
	}
	else if ($_GET["variavel"] == 'Recursos humanos da área da saúde'){
		RecursosSaude();
	}
?>