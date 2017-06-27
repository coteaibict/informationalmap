<?php
  echo '
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
      <title>'.$_POST["informacao"].'</title>  
      <script src="js/jQuery.js"></script> 
      <script src="js/FuncoesGrafico.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script> 
    </head>
    <body>
      <canvas id="myChart" width="200" height="200"></canvas>
      <select onchange=\'CriarGrafico(JSON.parse('.$_POST["nome"].'),'.$_POST["informacao"].',JSON.parse('.$_POST["valor"].'), this )\'>
        <option value="" selected>Selecione um tipo de gráfico</option>
        <option value="bar">Barra</option>
        <option value="radar">Radar</option>
        <option value="line">Linha</option>
      </select> 
    </body>
  </html>';
?>
