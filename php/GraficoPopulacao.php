<?php
	function Brasil(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(valor)/2 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População total (2010) '
							");
		$row = $res->fetch_row();
		$tot = $row[0];

		//$result .= 'População Total&'.$tot.';';


		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População rural (2010) '
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População Rural&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População urbana (2010) '
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População Urbana&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População de até 1 ano (2010) ' 
                            or informacao = ' População de 1 a 3 anos (2010) '
                            or informacao = ' População de 4 anos (2010) '
                            or informacao = ' População de 5 anos (2010) ')
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 1 a 5 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População de 6 a 10 anos (2010) '
							or informacao = ' População de 11 a 14 anos (2010) ')
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 6 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População de 15 a 17 anos (2010) '
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 15 a 17 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População de 18 a 24 anos (2010) '
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 18 a 24 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População masculina de 0 a 4 anos (2010) '
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 0 a 4 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População masculina de 5 a 9 anos (2010) '
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 5 a 9 anos)&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População masculina de 10 a 14 anos (2010) '
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 10 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População masculina de 15 a 19 anos (2010) '
                            or informacao = ' População masculina de 20 a 24 anos (2010) '
                            or informacao = ' População masculina de 25 a 29 anos (2010) '
                            or informacao = ' População masculina de 30 a 34 anos (2010) '
                            or informacao = ' População masculina de 35 a 39 anos (2010) '
                            or informacao = ' População masculina de 40 a 44 anos (2010) '
                            or informacao = ' População masculina de 45 a 49 anos (2010) '
                            or informacao = ' População masculina de 50 a 54 anos (2010) '
                            or informacao = ' População masculina de 54 a 59 anos (2010) ')
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 15 a 59 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População masculina de 60 a 64 anos (2010) '
                            or informacao = ' População masculina de 65 a 69 anos (2010) '
                            or informacao = ' População masculina de 70 a 74 anos (2010) '
                            or informacao = ' População masculina de 75 a 79 anos (2010) '
                            or informacao = ' População masculina com 80 anos e mais (2010) ')
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina com 60 anos ou mais&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População feminina de 0 a 4 anos (2010) '
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 0 a 4 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População feminina de 5 a 9 anos (2010) '
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 5 a 9 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População feminina de 10 a 14 anos (2010) '
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 10 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População feminina de 15 a 19 anos (2010) '
                            or informacao = ' População feminina de 20 a 24 anos (2010) '
                            or informacao = ' População feminina de 25 a 29 anos (2010) '
                            or informacao = ' População feminina de 30 a 34 anos (2010) '
                            or informacao = ' População feminina de 35 a 39 anos (2010) '
                            or informacao = ' População feminina de 40 a 44 anos (2010) '
                            or informacao = ' População feminina de 45 a 49 anos (2010) '
                            or informacao = ' População feminina de 50 a 54 anos (2010) '
                            or informacao = ' População feminina de 55 a 59 anos (2010) ')
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 15 a 59 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População feminina de 60 a 64 anos (2010) '
                            or informacao = ' População feminina de 65 a 69 anos (2010) '
                            or informacao = ' População feminina de 70 a 74 anos (2010) '
                            or informacao = ' População feminina de 75 a 79 anos (2010) '
                            or informacao = ' População feminina com 80 anos e mais (2010) ')
							");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (acima de 60 anos)&'.$div.';';


		mysqli_close($con);
		echo $result;
	}


	function Municipio(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(valor)/2 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População total (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		//$result .= 'População Total&'.$tot.';';


		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População rural (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População Rural&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População urbana (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População Urbana&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População de até 1 ano (2010) ' 
                            or informacao = ' População de 1 a 3 anos (2010) '
                            or informacao = ' População de 4 anos (2010) '
                            or informacao = ' População de 5 anos (2010) ')
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 1 a 5 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População de 6 a 10 anos (2010) '
							or informacao = ' População de 11 a 14 anos (2010) ')
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 6 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População de 15 a 17 anos (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 15 a 17 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População de 18 a 24 anos (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 18 a 24 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População masculina de 0 a 4 anos (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 0 a 4 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População masculina de 5 a 9 anos (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 5 a 9 anos)&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População masculina de 10 a 14 anos (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 10 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População masculina de 15 a 19 anos (2010) '
                            or informacao = ' População masculina de 20 a 24 anos (2010) '
                            or informacao = ' População masculina de 25 a 29 anos (2010) '
                            or informacao = ' População masculina de 30 a 34 anos (2010) '
                            or informacao = ' População masculina de 35 a 39 anos (2010) '
                            or informacao = ' População masculina de 40 a 44 anos (2010) '
                            or informacao = ' População masculina de 45 a 49 anos (2010) '
                            or informacao = ' População masculina de 50 a 54 anos (2010) '
                            or informacao = ' População masculina de 54 a 59 anos (2010) ')
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 15 a 59 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População masculina de 60 a 64 anos (2010) '
                            or informacao = ' População masculina de 65 a 69 anos (2010) '
                            or informacao = ' População masculina de 70 a 74 anos (2010) '
                            or informacao = ' População masculina de 75 a 79 anos (2010) '
                            or informacao = ' População masculina com 80 anos e mais (2010) ')
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina com 60 anos ou mais&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População feminina de 0 a 4 anos (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 0 a 4 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População feminina de 5 a 9 anos (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 5 a 9 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where informacao = ' População feminina de 10 a 14 anos (2010) '
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 10 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População feminina de 15 a 19 anos (2010) '
                            or informacao = ' População feminina de 20 a 24 anos (2010) '
                            or informacao = ' População feminina de 25 a 29 anos (2010) '
                            or informacao = ' População feminina de 30 a 34 anos (2010) '
                            or informacao = ' População feminina de 35 a 39 anos (2010) '
                            or informacao = ' População feminina de 40 a 44 anos (2010) '
                            or informacao = ' População feminina de 45 a 49 anos (2010) '
                            or informacao = ' População feminina de 50 a 54 anos (2010) '
                            or informacao = ' População feminina de 55 a 59 anos (2010) ')
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 15 a 59 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud 
							where (informacao = ' População feminina de 60 a 64 anos (2010) '
                            or informacao = ' População feminina de 65 a 69 anos (2010) '
                            or informacao = ' População feminina de 70 a 74 anos (2010) '
                            or informacao = ' População feminina de 75 a 79 anos (2010) '
                            or informacao = ' População feminina com 80 anos e mais (2010) ')
							and cod_municipio =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (acima de 60 anos)&'.$div.';';


		mysqli_close($con);
		echo $result;
	}

	function MesoRegiao(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(valor)/2 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População total (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		//$result .= 'População Total&'.$tot.';';


		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População rural (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População Rural&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População urbana (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População Urbana&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where (informacao = ' População de até 1 ano (2010) ' 
                            or informacao = ' População de 1 a 3 anos (2010) '
                            or informacao = ' População de 4 anos (2010) '
                            or informacao = ' População de 5 anos (2010) ')
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 1 a 5 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where (informacao = ' População de 6 a 10 anos (2010) '
							or informacao = ' População de 11 a 14 anos (2010) ')
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 6 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População de 15 a 17 anos (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 15 a 17 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População de 18 a 24 anos (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 18 a 24 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População masculina de 0 a 4 anos (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 0 a 4 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População masculina de 5 a 9 anos (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 5 a 9 anos)&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População masculina de 10 a 14 anos (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 10 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where (informacao = ' População masculina de 15 a 19 anos (2010) '
                            or informacao = ' População masculina de 20 a 24 anos (2010) '
                            or informacao = ' População masculina de 25 a 29 anos (2010) '
                            or informacao = ' População masculina de 30 a 34 anos (2010) '
                            or informacao = ' População masculina de 35 a 39 anos (2010) '
                            or informacao = ' População masculina de 40 a 44 anos (2010) '
                            or informacao = ' População masculina de 45 a 49 anos (2010) '
                            or informacao = ' População masculina de 50 a 54 anos (2010) '
                            or informacao = ' População masculina de 54 a 59 anos (2010) ')
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 15 a 59 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where (informacao = ' População masculina de 60 a 64 anos (2010) '
                            or informacao = ' População masculina de 65 a 69 anos (2010) '
                            or informacao = ' População masculina de 70 a 74 anos (2010) '
                            or informacao = ' População masculina de 75 a 79 anos (2010) '
                            or informacao = ' População masculina com 80 anos e mais (2010) ')
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina com 60 anos ou mais&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População feminina de 0 a 4 anos (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 0 a 4 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População feminina de 5 a 9 anos (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 5 a 9 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where informacao = ' População feminina de 10 a 14 anos (2010) '
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 10 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where (informacao = ' População feminina de 15 a 19 anos (2010) '
                            or informacao = ' População feminina de 20 a 24 anos (2010) '
                            or informacao = ' População feminina de 25 a 29 anos (2010) '
                            or informacao = ' População feminina de 30 a 34 anos (2010) '
                            or informacao = ' População feminina de 35 a 39 anos (2010) '
                            or informacao = ' População feminina de 40 a 44 anos (2010) '
                            or informacao = ' População feminina de 45 a 49 anos (2010) '
                            or informacao = ' População feminina de 50 a 54 anos (2010) '
                            or informacao = ' População feminina de 55 a 59 anos (2010) ')
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 15 a 59 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join mesoregiao e on m.cod_mesoregiao = e.cod_mesoregiao
							where (informacao = ' População feminina de 60 a 64 anos (2010) '
                            or informacao = ' População feminina de 65 a 69 anos (2010) '
                            or informacao = ' População feminina de 70 a 74 anos (2010) '
                            or informacao = ' População feminina de 75 a 79 anos (2010) '
                            or informacao = ' População feminina com 80 anos e mais (2010) ')
							and m.cod_mesoregiao =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (acima de 60 anos)&'.$div.';';


		mysqli_close($con);
		echo $result;
		
	}

	function Estado(){
		include "ConexaoDB.php";
		$result = '';
		$res = $con->query("SELECT sum(valor)/2 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População total (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$tot = $row[0];

		//$result .= 'População Total&'.$tot.';';


		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População rural (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População Rural&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População urbana (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População Urbana&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where (informacao = ' População de até 1 ano (2010) ' 
                            or informacao = ' População de 1 a 3 anos (2010) '
                            or informacao = ' População de 4 anos (2010) '
                            or informacao = ' População de 5 anos (2010) ')
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 1 a 5 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where (informacao = ' População de 6 a 10 anos (2010) '
							or informacao = ' População de 11 a 14 anos (2010) ')
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 6 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População de 15 a 17 anos (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 15 a 17 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População de 18 a 24 anos (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População (de 18 a 24 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População masculina de 0 a 4 anos (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 0 a 4 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População masculina de 5 a 9 anos (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 5 a 9 anos)&'.$div.';';

		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População masculina de 10 a 14 anos (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 10 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where (informacao = ' População masculina de 15 a 19 anos (2010) '
                            or informacao = ' População masculina de 20 a 24 anos (2010) '
                            or informacao = ' População masculina de 25 a 29 anos (2010) '
                            or informacao = ' População masculina de 30 a 34 anos (2010) '
                            or informacao = ' População masculina de 35 a 39 anos (2010) '
                            or informacao = ' População masculina de 40 a 44 anos (2010) '
                            or informacao = ' População masculina de 45 a 49 anos (2010) '
                            or informacao = ' População masculina de 50 a 54 anos (2010) '
                            or informacao = ' População masculina de 54 a 59 anos (2010) ')
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina (de 15 a 59 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where (informacao = ' População masculina de 60 a 64 anos (2010) '
                            or informacao = ' População masculina de 65 a 69 anos (2010) '
                            or informacao = ' População masculina de 70 a 74 anos (2010) '
                            or informacao = ' População masculina de 75 a 79 anos (2010) '
                            or informacao = ' População masculina com 80 anos e mais (2010) ')
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População masculina com 60 anos ou mais&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População feminina de 0 a 4 anos (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 0 a 4 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População feminina de 5 a 9 anos (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 5 a 9 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where informacao = ' População feminina de 10 a 14 anos (2010) '
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 10 a 14 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where (informacao = ' População feminina de 15 a 19 anos (2010) '
                            or informacao = ' População feminina de 20 a 24 anos (2010) '
                            or informacao = ' População feminina de 25 a 29 anos (2010) '
                            or informacao = ' População feminina de 30 a 34 anos (2010) '
                            or informacao = ' População feminina de 35 a 39 anos (2010) '
                            or informacao = ' População feminina de 40 a 44 anos (2010) '
                            or informacao = ' População feminina de 45 a 49 anos (2010) '
                            or informacao = ' População feminina de 50 a 54 anos (2010) '
                            or informacao = ' População feminina de 55 a 59 anos (2010) ')
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (de 15 a 59 anos)&'.$div.';';
		
		$res = $con->query("SELECT sum(valor) 
							FROM dadosatlasbrasilpnud d
							inner join municipio m on m.cod_municipio = d.cod_municipio
							inner join estado e on m.cod_estado = e.cod_estado
							where (informacao = ' População feminina de 60 a 64 anos (2010) '
                            or informacao = ' População feminina de 65 a 69 anos (2010) '
                            or informacao = ' População feminina de 70 a 74 anos (2010) '
                            or informacao = ' População feminina de 75 a 79 anos (2010) '
                            or informacao = ' População feminina com 80 anos e mais (2010) ')
							and m.cod_estado =".$_GET["cod"].";");
		$row = $res->fetch_row();
		$x = $row[0];

		$div = $x/$tot;
		$result .= 'População feminina (acima de 60 anos)&'.$div.';';


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