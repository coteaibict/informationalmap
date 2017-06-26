<?php
	function ObtemSetoresApl(){
		include "ConexaoDB.php";
		
		$res = $con->query("SELECT cod_setor, descricao FROM setor");
		echo '<div id="marcatodos"><input type="checkbox" onchange="checkAll(this)" name="checatudo"/> Marcar todos</div>';
		echo '<div id="opcoes">';
		echo '<form>';
		while ($row = $res->fetch_row()) {
	    	echo '<input type="checkbox" class="setoresMarcados" value="'.$row[0].'">'.$row[1].':<div id='.$row[0].'>0</div><br>';
		}
		echo 'Total: <div id="total"></div>';
		echo '</br></br>';
		echo '<div id="botaoCheckBox"><input type="button" value="Atualizar" onclick="SetoresMarcado();"></div>';
		echo '</form>';

		echo '</div>';

		mysqli_close($con);
	}
?>