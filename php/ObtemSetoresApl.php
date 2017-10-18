<?php
	function ObtemSetoresApl(){
		include "ConexaoDB.php";
		
		$res = $con->query("SELECT cod_setor, descricao FROM setor");

		echo '<div id="opcoes">';		
		echo '<form class="Limpo">';
		echo '<input type="radio" name="Apl" checked ="checked" value="False">Todos     ';
		echo '<input type="radio" name="Apl" value="True">Todos com APL</br></br>';

		
			echo '<div id="opcoes2" class="desc">';
			echo '<div id="marcatodos"><input type="checkbox" onchange="checkAll(this)" name="checatudo" /> Marcar todos</div>';
			echo '<form class="Limpo">';
			while ($row = $res->fetch_row()) {
		    	echo '<input type="checkbox" name="marcaSertor" class="setoresMarcados" value="'.$row[0].'">'.$row[1].': <div class="qtdapls" id='.$row[0].'>0</div><br>';
			}
			echo '<b>Total: <div class="qtdapls" id="total"></div></b>';
			echo '</form>';

			echo '</div>';

		echo '</form>';
		echo '</div>';


		mysqli_close($con);
	}

/*
$(document).ready(function() {
    $("input[name$='Apl']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        if(test=='True')
        	$("#opcoes2").show();
    });
});
*/
?>


