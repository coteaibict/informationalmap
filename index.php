
<!DOCTYPE html>
<?php
  include "php/ObtemSetoresApl.php";
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Visão</title>
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
    <!--Script Para Funcionamento do Menu da APL-->
    <script>
      $(document).ready(function() {
        $("#opcoes2").hide();

        $("input[name$='Apl']").click(function() {
          var test = $(this).val();
          $("div.desc").hide();
          //TIRAR SELECAO DE APL
          $('input[type=checkbox]').each(function(){ this.checked = false;});

          if(test=='True'){
            $("#opcoes2").show();
          }
        });
      });
      </script>


    <!-- <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>

    <div id="backSobre">
      <div id="sobre" >
      
        <img src='images/fechar.png' class='close' onClick='CloseSobre()'/>
        </br>
        </br>
        <center><div id="tituloSobre"><img src="images/TituloSobre.png"/></div></center>
        </br>
        <center style="color:#DD6650">Versão 1.0</center>
        </br>
        <div id="textoSobre">
      <p>
        O Sistema Aberto de Observatórios para Visualização de Informações (VISÃO) é uma ferramenta de disponibilização e visualização de informações provenientes de diversas bases de dados, baseadas em localização geográfica, para dar suporte à tomada de decisão.
 </p>
 <p>
Desenvolvida pelo Instituto Brasileiro de Informação em Ciência e Tecnologia (IBICT), os objetivos a serem atendidos pelo VISÃO são: disponibilizar indicadores dinâmicos a partir da análise de grandes conjuntos de dados; permitir a criação de relações entre indicadores oriundos de diferentes instituições; possibilitar a análise visual e histórica de indicadores relativos ao desenvolvimento social, econômico e ambiental; contribuir para a formulação de políticas públicas relacionadas a C&T; e ser uma ferramenta para apoio à tomada de decisão.

 </p>

<p>
EQUIPE:
</p>
<p>
Coordenação Técnica: <b>Tiago Emmanuel Nunes Braga</b>
</p>
<p>
Pesquisadores: <b>Lucas Fernandes, Mariela Muruga, Milena Simões, Rafael Lopes, Roosevelt Tomé</b>
</p>
<p>
Projeto Gráfico e Diagramação: <b>Mariela Muruga</b>
</p>
<p>
Desenvolvedores: <b>Lucas Fernandes, Rafael Lopes</b>
</p>
 
<p>
Mais informações em <a href="http://www.ibict.br">www.ibict.br</a>, ou pelo e-mail visao@ibict.br.
</p>
        </div>
      </div>
    </div>
    <div id="loading">
      <h1>Carregando...</h1>
    </div>
    <div id="Saves" style="opacity: 0.5;">
      <img src='images/escova.png' alt='Limpar' id='Limpar'/>
      <img alt='Salvar analise' src='images/SalvaAnalise.png' id='SalvaAnalise'  style="padding-right: 10px;"/>
      <img src='images/relatorio.png'/>
    </div>

    <div id="header"><img src="images/linhas.png" id="headerBackground"/> <img src="images/visao-ibict.png" id="logo"/> <div id="linkSobre" onClick='ShowSobre()'>Sobre</div></div>
    <div id="listaInformacoes">
      <div id="pesquisas">
        <div class="Expandivel" onclick="AtualizaInformacoesEspecificas('Economia', this)" ><div class="ExpandivelTitulo"> Economia</div> <img class="ExpandivelImg" src="images/setinha.png"/> </div>
        <div class="Expandivel" onclick="AtualizaInformacoesEspecificas('Trabalho e Renda', this)" ><div class="ExpandivelTitulo"> Trabalho e Renda</div> <img class="ExpandivelImg" src="images/setinha.png"/> </div>
        <div class="Expandivel" onclick="AtualizaInformacoesEspecificas('Educação', this)" ><div class="ExpandivelTitulo"> Educação</div> <img class="ExpandivelImg" src="images/setinha.png"/> </div>
        <div class="Expandivel" onclick="AtualizaInformacoesEspecificas('Qualidade de Vida e Desenvolvimento Social', this)" ><div class="ExpandivelTitulo"> Qualidade de Vida e Desenvolvimento Social</div> <img class="ExpandivelImg" src="images/setinha.png"/> </div>
        <div class="Expandivel" onclick="AtualizaInformacoesEspecificas('RAIS', this)" ><div class="ExpandivelTitulo"> RAIS</div> <img class="ExpandivelImg" src="images/setinha.png"/> </div>
        <div class="Expandivel" onclick="AtualizaInformacoesEspecificas('Saúde', this)" ><div class="ExpandivelTitulo"> Saúde</div> <img class="ExpandivelImg" src="images/setinha.png"/> </div>

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

        <form class="Limpo" id="FormBuscaEspecifica">
          <input type="text" id="inputListaDivisao"  list="filtroDivisao" oninput="MostraDadosGerais(this.value)" /> 
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

