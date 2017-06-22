<?php
	function ObtemSetoresApl(){
		include "ConexaoDB.php";
		
		$res = $con->query("SELECT cod_setor, descricao FROM setor");
		
		echo '<form>';
		while ($row = $res->fetch_row()) {
	    	echo '<input type="checkbox" name="setores" value="'.$row[0].'">'.$row[1].':<div id='.$row[0].'>0</div><br>';
		}   
		echo '</form>';

		mysqli_close($con);
	}
?>