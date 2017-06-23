
<!DOCTYPE html>
<?php
  include "php/ObtemSetoresApl.php";
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Observatorio APL</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/functions.js" charset="utf-8"></script> 
    <script src="js/jQuery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script> 
  </head>
  <body>
    <div id="loading">
      <h1>Carregando...</h1>
    </div>
    <div id="listaInformacoes">
      <ul>
        <li onclick="AtualizaInformacoesEspecificas('Educacao')" ><center><img class="iconeLista" src="images/índice.jpeg"/></br>Educação</center></li>
      </ul>
    </div>
    <div id="InformaçõesEspecificas"></div>
    
    <div id="setores">
    <?php
      ObtemSetoresApl();
    ?>
    </div>

      <div id="divisao">
        <form>
          <input type="radio" name="divisao" value="M" > Municipios<br>
          <input type="radio" name="divisao" value="E" checked> Estados<br>
          <input type="radio" name="divisao" value="MR" > Meso Regiões<br>
          <input type="radio" name="divisao" value="R" > Regiões<br>
        </form>
      </div>
    <div id="TipoPesquisa"></div>
    <div id="map"></div>
    <div id="controls" class="nicebox">
      <div id="census-variable" >
      </div>
      <div id="legend">
        <div id="census-min">min</div>
        <div class="color-key"><span id="data-caret">◆</span></div>
        <div id="census-max">max</div>
      </div>
      
    </div>
    <div id="data-box" class="nicebox">
      <label id="data-label" for="data-value"></label>
      <span id="data-value"></span>
    </div>

    
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi6bbccL3QbcLhlS0fTy1WhYZh6B6QH1k&callback=initMap">        
    </script>
    <script type="text/javascript" src="js/geoxml3.js"></script>

  </body>
</html>

