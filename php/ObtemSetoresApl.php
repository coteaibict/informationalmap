<?php
	function ObtemSetoresApl(){
		include "ConexaoDB.php";
		
		$res = $con->query("SELECT cod_setor, descricao FROM setor");
		echo '<div id="opcoes">';
		echo '<div id="marcatodos"><input type="checkbox" onchange="checkAll(this)" name="checatudo"/> Marcar todos</div>';
		echo '<form class="Limpo">';
		while ($row = $res->fetch_row()) {
	    	echo '<input type="checkbox" name="marcaSertor" class="setoresMarcados" value="'.$row[0].'">'.$row[1].': <div class="qtdapls" id='.$row[0].'>0</div><br>';
		}
		echo '<b>Total: <div class="qtdapls" id="total"></div></b>';
		echo '</form>';

		echo '</div>';

		mysqli_close($con);
	}
?>