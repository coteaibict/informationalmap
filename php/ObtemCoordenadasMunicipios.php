<?php
	include "ConexaoDB.php";
	 $res = $con->query("SELECT m.Nome, cm.cod_muncipio, cm.longitude, cm.latitude FROM coordenadas_municipios cm INNER JOIN municipio m ON cm.cod_muncipio = m.cod_municipio");
	// $res = $con->query("SELECT cod_municipio, geometria  FROM geometriamunicipios");

	
	$municipios = "";
	while ($row = $res->fetch_row()) {
    	$municipios .= $row[0] . "," . $row[1]."," . $row[2]."," . $row[3].";";
	}   

	mysqli_close($con);
	echo ($municipios);
	

?>