
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
    <script src="js/jQuery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/html2canvas.js"></script> 
    <script src="js/jquery.rotate.js"></script>
    <script src="js/canvas2image.js"></script>
    <script src="js/FuncoesGrafico.js"></script>
    <script src="js/FileSaver.js"></script>
    <script src="js/html-docx.js"></script>
    <script src="js/jquery.wordexport.js"></script>
    <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>
    <div id="loading">
      <h1>Carregando...</h1>
    </div>
    <div id="Saves" style="opacity: 0.5;">
      <img src='images/escova.png' alt='Limpar' id='Limpar'/>
      <img alt='Salvar analise' src='images/SalvaAnalise.png' id='SalvaAnalise'  style="padding-right: 10px;"/>
      <img src='images/relatorio.png'/>
    </div>

    <div id="header"><img src="images/linhas.png" id="headerBackground"/> <img src="images/visao-ibict.png" id="logo"/> </div>
    <div id="listaInformacoes">
      <div id="pesquisas">
        <div class="Expandivel" onclick="AtualizaInformacoesEspecificas('Economia', this)" ><div class="ExpandivelTitulo"> Economia</div> <img class="ExpandivelImg" src="images/setinha.png"/> </div>
        <div class="Expandivel" onclick="AtualizaInformacoesEspecificas('Trabalho e Renda', this)" ><div class="ExpandivelTitulo"> Trabalho e Renda</div> <img class="ExpandivelImg" src="images/setinha.png"/> </div>
        <div class="Expandivel" onclick="AtualizaInformacoesEspecificas('Educação', this)" ><div class="ExpandivelTitulo"> Educação</div> <img class="ExpandivelImg" src="images/setinha.png"/> </div>
      </div> 
      
      
    </div>

    <div id="setores">
      <img src="images/setinhaBranca.png" onclick="ExpandeDivisaoGeo()" id="ExpandeDivisaoGeografica"/>
      <span onclick="ExpandeDivisaoGeo()" >APL</span>
      <?php
        ObtemSetoresApl();
      ?>
    </div>
    
    <div id="divisao">
    </br>
      <form>
        <input type="radio" name="divisao" value="M" > Municipios
        <input type="radio" name="divisao" value="MR" > Meso Regiões
        <input type="radio" name="divisao" value="E" checked> Estados
        <!--input type="radio" name="divisao" value="R" > Regiões<br-->
      </form>
    </div>
    <div id="caminho"><span></span></div>
    <button id="AplicarNoMapa" onclick="LoadMapShapes()">Aplicar no mapa</button>
    
    
    <div id="cantoDireito">
      <div id="resumoInformacoes">
        <div id="resumoTitulo"> <b>Busca Especifica</b></div>
        </br>

        <div id="resumoDivisao"></div>

        </br>

        <form class="Limpo">
          <input type="text" id="inputListaDivisao" list="filtroDivisao" oninput="MostraDadosGerais(this.value)" /> 
          <datalist id="filtroDivisao"></datalist>
        </form>
        </br>
        <div id="divisaoPesquisada" ></div>

        <div id="addResumoRelatorio" onclick="AdicionarRelatorio('divisaoPesquisada')">
          Enviar busca para relatório<img  src="images/relatorio.png"/>
        </div>
      </div>
      
      <div id="listaGraficos">
        </br>
        <div id="ListaGraficoTitulo"><img src="images/SalvaAnalise.png" alt="Salvar análise" style="opacity: 0.5; padding-right: 10px;" /><b>Análises Salvas</b></div>
        </br>
        <div id="ListaItensAnalises"></div>
      </div>
      <div id="GerarRelatorios">
        <div id="GerarRelatorioTitulo"><img src="images/relatorio.png" alt="Relatorio" style="padding-right: 10px;" /><b>Relatório</b></div>
        
        <div id="ListaItensRelatorios"></div>
        <br>
        <button id="BaixarRelatorio">Gerar Relatorio</button>
      </div>
    </div>

    <div id="mediaDadosGerais">
      <img class="close" onClick="Close(this)" src="images/close.png"/>
      <img class="close" onClick="Minimize(this)" src="images/minimize.jpeg"/>
      <div class="Titulo"><center><h1>Média de Dados Gerais</h1></center></div>
    </div>


    <div id="TipoPesquisa"></div>
    <div id="map"></div>
    <div id="controls" class="nicebox">
      <!-- <div id="census-variable" >
      </div> -->
      <div id="legend">
        <div id="census-min">min</div>
        <div class="color-key"><span id="data-caret">◆</span></div>
        <div id="census-max">max</div>
      </div>
    </div>

    <div id="data-box">
      <label id="data-label" for="data-value"></label>
      <span id="data-value"></span>
    </div>

    <div id="timeLine">
      <div id="Marcador"></div>
      <div id="linhaDatas">
        <div id="linha"></div>
        <div id="datas"></div>
      </div>
    </div>

    <div id="relatorio">
    </div>
    <div id="minimizesDivs"></div>
    <script src="js/functions.js" charset="utf-8"></script> 
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi6bbccL3QbcLhlS0fTy1WhYZh6B6QH1k&callback=initMap">        
    </script>
    <script type="text/javascript" src="docxjs/libs/base64.js"></script>
    <script type="text/javascript" src="docxjs/libs/jszip/jszip.js"></script>
    
    <!-- Include main js lib -->
    <script type="text/javascript" src="docxjs/docx.js"></script>
    <script type="text/javascript" src="js/dnd.js"></script>

  </body>
</html>

