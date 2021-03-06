window.map = null;
var censusMin = Number.MAX_VALUE, censusMax = -Number.MAX_VALUE;
window.dado = [];
window.tipoDivisao = "E";
window.variavelPesquisa = null;
window.setores = [];
window.setoresMarcados = [];
window.numeroGrafico = 1;
window.graficos = [];
window.informcao = [];
window.historico = [];
window.historico["variavel"] = [];
window.historico["setoresMarcados"] = [];
window.historico["divisao"] = [];
window.dadosGerais = [];
window.divisoesMarcadas = [];
window.buscaEspecifica = false;
window.indexInformacao = null;
window.caminho = null;
window.arquivoPhp = null;
window.jsonLayers = [];
window.anoSelecionado = null;
window.numRelatorio = 1;

window.AnosUnicos = [];

window.UnidadeX =' ';
window.UnidadeY ='';



var mapStyle = [{
  'stylers': [{'visibility': 'on'}]
}, {
  'featureType': 'landscape',
  'elementType': 'geometry',
  'stylers': [{'visibility': 'on'}, {'color': '#55707C'}, { "saturation": 70 }, { "lightness": 50 },]
}, {
  'featureType': 'water',
  'elementType': 'geometry',
  'stylers': [{'visibility': 'on'}, {'color': '#55707C'}, { "saturation": 30 }, { "lightness": 50 },]
}];


// function GerarRelatorio(){
//   var doc = new DOCXjs();
//   doc.text('DOCX.js is a free open source library for generating Microsoft Word Documents using pure client-side JavaScript.');
//   doc.text('It was developed by James Hall at Snapshot Media.');
//   var output = doc.output('datauri');
// }
function AdicionarRelatorio(div){
  
  if(div == "divisaoPesquisada")
    $("#"+div).css("height", "200px");
  html2canvas($("#"+div), {
    useCORS: true,
//                        allowTaint:true,
    onrendered: function(canvas) {

      var data = canvas.toDataURL('image/png');
        // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server

      var image = new Image();
      image.src = data;
      image.id = "itemRelatorio"+window.numRelatorio;
      if(div == "map"){
        image.style.height = "200px";
        image.style.width = "365px";
      }
      document.getElementById('relatorio').appendChild(image);
      window.numRelatorio++;
      if(div == "divisaoPesquisada"){
        $("#"+div).css("height", "40%");
      }
    }
  });
  $("#GerarRelatorioTitulo").css("opacity", "1");
  $("#ListaItensRelatorios").css("display","block");
  $("#BaixarRelatorio").css("display","block");
  $("#ListaItensRelatorios").append("<div class='itensGrafico' role='"+caminho+"' id='Relatorio"+window.numRelatorio+"'><div class='RemoverItem' onClick='RemoveItemRelatorio(\"Relatorio"+window.numRelatorio+"\",\"itemRelatorio"+window.numRelatorio+"\")'><img src='images/close.png' class=\"removeItem\" /></div> <div class='item' maxlength='10'  ><span title='"+caminho+"'>"+caminho.substring(0,20)+"...</span></div></div>");

  
}

function RemoveItemRelatorio(itemId, canvasId){
  $("#"+itemId).remove();
  $("#"+canvasId).remove();
}
function ExpandeDivisaoGeo(){
  
  if(!$("#opcoes").is(':visible')){
    RotateImage(90, $("#setores"));
  }
  else{
    RotateImage(0, $("#setores")); 
  }
  $("#opcoes").slideToggle();
}


function MostraDadosGerais(dadosGerais){



  var i = window.dadosGerais.map(function(x) {return x.Nome; }).indexOf(dadosGerais);
  if(i != -1){
    window.buscaEspecifica = true;

    $("#geraGraficoHistorico").remove();
    $("#geraGraficoDespesas").remove();
    $("#geraGraficoPopulacao").remove();
    $("#geraGraficoEstabelecimento").remove();
    $("#geraGraficoPatentes").remove();
    $('#divisaoPesquisada').css("display","block");
    $("#addResumoRelatorio").css("display", "block");
    $('#divisaoPesquisada').html(
      "<div>Código: "+window.dadosGerais[i].key+"</div>"+
        "<div>Nome: "+ window.dadosGerais[i].Nome+"</div>"+
        "<div>Número de Habitantes: "+ numberWithCommas(window.dadosGerais[i].NHabitantes)+"</div>"+
        "<div>PIB: R$ "+ numberWithCommas(window.dadosGerais[i].PIB*1000)+",00</div>"+
        "<div>PIB per capita: R$ "+ numberWithCommas(window.dadosGerais[i].PIBpercapita*1000)+"</div>"+
        "<div>Possuem Ocupação: "+ numberWithCommas(window.dadosGerais[i].PossuemOcupacao * 100)+" %</div>"+
        "<div>Empregados:"+ numberWithCommas(window.dadosGerais[i].Empregados*100)+" %</div>"+
        "<div>Média rendimento homens: R$ "+ numberWithCommas(window.dadosGerais[i].MediaRendimentoHomens)+"</div>"+
        "<div>Média rendimento mulheres: R$ "+ numberWithCommas(window.dadosGerais[i].MediaRendimentoMulheres)+"</div>"+
        "<div>Fundamental Incompleto: "+ numberWithCommas(window.dadosGerais[i].FundamentalIncompleto*100)+" %</div>"+
        "<div>Fundamental Completo: "+ numberWithCommas(window.dadosGerais[i].FundamentalCompleto*100)+" %</div>"+
        "<div>Médio Completo: "+ numberWithCommas(window.dadosGerais[i].MédioCompleto*100)+" %</div>"+
        "<div>Superior Completo: "+ numberWithCommas(window.dadosGerais[i].SuperiorCompleto*100)+" %</div>");
    map.data.forEach(function(feature) {
      if(feature.getProperty('click') == 'clicked')
        feature.setProperty('click', 'normal');
    });
    map.data
        .getFeatureById(window.dadosGerais[i].key)
        .setProperty('click', 'clicked'); 
        //window.divisoesMarcadas.push(window.dadosGerais[i]); 
        // AtualizarDivisoesMarcadas();

    $("#resumoInformacoes").append("<div id='geraGraficoHistorico'><img class='graphs' src='images/historico.jpg' title='Histórico'/></div>");
    $("#geraGraficoHistorico").on("click", function(){ CriarGraficoLinha(window.dado["valor"],window.dadosGerais[i].Nome,window.AnosUnicos,window.dado["total"]); });

    $("#resumoInformacoes").append("<div id='geraGraficoDespesas'><img class='graphs' src='images/despesas.png' title='Despesas'/></div>");
    $("#geraGraficoDespesas").on("click", function(){ GraficoPizza(window.dadosGerais[i].key, "GraficoDespesas.php", "Despesas de "+window.dadosGerais[i].Nome+" (R$)"); });

    $("#resumoInformacoes").append("<div id='geraGraficoPopulacao'><img class='graphs' src='images/populacao.png' title='População'/></div>");
    $("#geraGraficoPopulacao").on("click", function(){ GraficoPizza(window.dadosGerais[i].key, "GraficoPopulacao.php","População de "+window.dadosGerais[i].Nome+""); });

    $("#resumoInformacoes").append("<div id='geraGraficoEstabelecimento'><img class='graphs' src='images/Estabelecimentos.png' title='Estabelecimentos'/></div>");
    $("#geraGraficoEstabelecimento").on("click", function(){ GraficoPizza(window.dadosGerais[i].key, "GraficoEstabelecimento.php","Estabelecimentos em "+window.dadosGerais[i].Nome+""); });

    $("#resumoInformacoes").append("<div id='geraGraficoPatentes'><img class='graphs' src='images/patentes.jpg' title='Patentes'/></div>");
    $("#geraGraficoPatentes").on("click", function(){ GraficoPizza(window.dadosGerais[i].key, "GraficoPatentes.php","Patentes no "+window.dadosGerais[i].Nome+""); });

  }
  
  else if(dadosGerais != ""){
    window.buscaEspecifica = false;
    map.data.forEach(function(feature) {
      if(feature.getProperty('click') == 'clicked')
        feature.setProperty('click', 'normal');
    });
    $("#geraGraficoHistorico").remove();
    $("#geraGraficoDespesas").remove();
    $("#geraGraficoPopulacao").remove();
    $("#geraGraficoEstabelecimento").remove();
    $("#geraGraficoPatentes").remove();


    $("#resumoInformacoes").append("<div id='geraGraficoHistorico'><img class='graphs' src='images/historico.jpg' title='Histórico'/></div>");
    $("#geraGraficoHistorico").on("click", function(){ CriarGraficoLinha(window.dado["valor"],"Brasil",window.AnosUnicos,window.dado["total"]); });

    $("#resumoInformacoes").append("<div id='geraGraficoDespesas'><img class='graphs' src='images/despesas.png' title='Despesas'/></div>");
    $("#geraGraficoDespesas").on("click", function(){ GraficoPizza("", "GraficoDespesas.php", "Despesas do Brasil (R$)"); });

    $("#resumoInformacoes").append("<div id='geraGraficoPopulacao'><img class='graphs' src='images/populacao.png' title='População'/></div>");
    $("#geraGraficoPopulacao").on("click", function(){ GraficoPizza("", "GraficoPopulacao.php","População do Brasil"); });

    $("#resumoInformacoes").append("<div id='geraGraficoEstabelecimento'><img class='graphs' src='images/Estabelecimentos.png' title='Estabelecimentos'/></div>");
    $("#geraGraficoEstabelecimento").on("click", function(){ GraficoPizza("", "GraficoEstabelecimento.php","Estabelecimentos no Brasil"); });

    $("#resumoInformacoes").append("<div id='geraGraficoPatentes'><img class='graphs' src='images/patentes.jpg' title='Patentes'/></div>");
    $("#geraGraficoPatentes").on("click", function(){ GraficoPizza("", "GraficoPatentes.php","Patentes no Brasil"); });

    $('#divisaoPesquisada').css("display","none");
    $("#addResumoRelatorio").css("display", "none");
  }
  
}
function ObtemdadosGerais(){
  $("#filtroDivisao option").remove();
  $('#divisaoPesquisada').html("");
  $('#mediaDadosGerais ul').remove();
  window.divisoesMarcadas =[];
  var dataList = document.getElementById('filtroDivisao');
  var input = document.getElementById('inputListaDivisao');

  var request = new XMLHttpRequest();
  request.onreadystatechange = function(response) {
    if (request.readyState === 4 && request.status === 200) {
      window.dadosGerais = [];
      var dados = this.responseText.split(";");    
      for(var i = 0; i < dados.length-1; i++){
        var aux = dados[i].split(",");
        if(aux[2]==0){
          aux[4] = 0;
        }

        window.dadosGerais.push({
          key: aux[0],
          Nome: aux[1],
          NHabitantes: aux[2],
          PIB: aux[3],
          PIBpercapita : aux[4],
          PossuemOcupacao : aux[5],
          Empregados: aux[6],
          MediaRendimentoHomens: aux[7],
          MediaRendimentoMulheres : aux[8],
          FundamentalIncompleto: aux[9],
          FundamentalCompleto: aux[10],
          MédioCompleto: aux[11],
          SuperiorCompleto: aux[12]
        });

        var option = document.createElement('option');
        option.value = aux[1];
        dataList.appendChild(option);
        // option.onClick = MostraDadosGerais(dados[i]);
      }
      
      if(window.tipoDivisao == "E"){
        input.placeholder = "Selecione um estado";
        $("#resumoDivisao").html("<img src='images/BotaoPrecionado.png'/> Estado");
      }
      else if(window.tipoDivisao == "M"){
        $("#resumoDivisao").html("<img src='images/BotaoPrecionado.png'/> Municipio");
        input.placeholder = "Selecione um municipio";
      }
      else{
        $("#resumoDivisao").html("<img src='images/BotaoPrecionado.png'/>Meso Região");
        input.placeholder = "Selecione uma meso região";
      }
    }
    else {
      input.placeholder = "Carregando dados";
    }
  };

  
  input.placeholder = "Carregando opções...";

  
  if(window.anoSelecionado != null)
    request.open('GET', 'php/ObtemdadosGerais.php?tipo='+window.tipoDivisao+'&ano='+window.anoSelecionado, true);
  else
    request.open('GET', 'php/ObtemdadosGerais.php?tipo='+window.tipoDivisao+'&ano=2010', true);
  request.send();
}


function checkAll(ele) {
   var checkboxes = document.getElementsByTagName('input');
   if (ele.checked) {
       for (var i = 0; i < checkboxes.length; i++) {
           if (checkboxes[i].type == 'checkbox') {
              checkboxes[i].checked = true;
           }
       }
   } else {
       for (var i = 0; i < checkboxes.length; i++) {
           if (checkboxes[i].type == 'checkbox') {
              checkboxes[i].checked = false;
           }
       }
   }
}

function SetoresMarcado(){
  window.setoresMarcados = [];
  var inputElements = document.getElementsByClassName('setoresMarcados');
  for(var i=0; inputElements[i]; ++i){
    if(inputElements[i].checked){
         window.setoresMarcados.push(inputElements[i].value);
    }
  }
}

function RecarregaPesquisa(grafico, id, variavel, indexSetoresMarcado, divisao, logCaminho){
  window.variavelPesquisa = variavel;
  window.setoresMarcados = window.historico["setoresMarcados"][indexSetoresMarcado - 1];
  window.tipoDivisao = divisao;
  window.caminho = logCaminho;

  var elements = document.getElementsByName('divisao');
  var checkboxes = document.getElementsByTagName('input');
  for (var i=0;i< elements.length;i++) {
    if(elements[i].value == divisao) {
      elements[i].checked = true;
    }
  }

  for ( i = 0; i < checkboxes.length; i++) { 
    if (checkboxes[i].type == 'checkbox'){  
      checkboxes[i].checked = false;
    }
  }

  for ( i = 0; i < checkboxes.length; i++) {
    if(checkboxes[i].type == 'checkbox'){
      for (var j = 0; j < window.setoresMarcados.length; j++) {
        if (checkboxes[i].value == window.setoresMarcados[j]) {
          checkboxes[i].checked = true;
        }
      }
    }
  }

  LoadMapShapes(grafico);  
}

function RemoveItemHistorico(grafico,itemId, historicoIndex){
  historico.slice(historicoIndex -1);
  $("#"+itemId).remove();
  // graficos[grafico].close();
  // graficos.slice(grafico);
}

function SalvaPesquisa(numGrafico,informacaoLista, caminho){
  $("#ListaGraficoTitulo").css("opacity", "1");
  $("#ListaItensAnalises").css("display","block");
  $("#ListaItensAnalises").append("<div class='itensGrafico' role='"+caminho+"' id='ListaGrafico"+numGrafico+"'><div class='RemoverItem' onClick='RemoveItemHistorico("+numGrafico+",\"ListaGrafico"+numGrafico+"\","+window.historico["setoresMarcados"].length+")'><img src='images/close.png' class=\"removeItem\" /></div> <div class='item' maxlength='10' onClick='RecarregaPesquisa("+numGrafico+" , \"ListaGrafico"+numGrafico+"\" , \""+window.variavelPesquisa+"\" , "+window.historico["setoresMarcados"].length+" , \""+window.tipoDivisao+"\" , \""+caminho +"\" )' ><span title='"+caminho+"'>"+caminho.substring(0,20)+"...</span></div></div>");
}

function AtualizaVarialvelPesquisa(variavel){
  var informacaoLista;
  if(window.tipoDivisao == "E")
    informacaoLista = window.informacao + " por estado";
  else if(window.tipoDivisao == "M")
    informacaoLista = window.informacao + " por municipio";
  else
    informacaoLista = window.informacao + " por meso região";

  if(variavel != null){
    window.historico["variavel"].push(variavel);
    window.historico["setoresMarcados"].push(window.setoresMarcados);
    window.historico["divisao"].push(window.tipoDivisao);

    window.variavelPesquisa = variavel;
  }
}

function RotateImage(degree,div) {
  $(div).children('img').animate({  transform: degree }, {
    step: function(now,fx) {
        $(this).css({
            '-webkit-transform':'rotate('+now+'deg)', 
            '-moz-transform':'rotate('+now+'deg)',
            'transform':'rotate('+now+'deg)'
        });
    }
  });
  $(".ExpandivelImg").not($(div).children('img')).animate({  transform: 0 }, {
    step: function(now,fx) {
        $(this).css({
            '-webkit-transform':'rotate('+now+'deg)', 
            '-moz-transform':'rotate('+now+'deg)',
            'transform':'rotate('+now+'deg)'
        });
    }
  });
}
function LimpaDadosGerais(){
  map.data.forEach(function(feature) {
      if(feature.getProperty('click') == 'clicked')
        feature.setProperty('click', 'normal');
    });
    $("#geraGraficoHistorico").remove();
    $("#geraGraficoDespesas").remove();
    $("#geraGraficoPopulacao").remove();
    $("#geraGraficoEstabelecimento").remove();
    $("#geraGraficoPatentes").remove();


    $("#resumoInformacoes").append("<div id='geraGraficoHistorico'><img class='graphs' src='images/historico.jpg' title='Histórico'/></div>");
    $("#geraGraficoHistorico").on("click", function(){ CriarGraficoLinha(window.dado["valor"],"Brasil",window.AnosUnicos,window.dado["total"]); });

    $("#resumoInformacoes").append("<div id='geraGraficoDespesas'><img class='graphs' src='images/despesas.png' title='Despesas'/></div>");
    $("#geraGraficoDespesas").on("click", function(){ GraficoPizza("", "GraficoDespesas.php", "Despesas do Brasil (R$)"); });

    $("#resumoInformacoes").append("<div id='geraGraficoPopulacao'><img class='graphs' src='images/populacao.png' title='População'/></div>");
    $("#geraGraficoPopulacao").on("click", function(){ GraficoPizza("", "GraficoPopulacao.php","População do Brasil"); });

    $("#resumoInformacoes").append("<div id='geraGraficoEstabelecimento'><img class='graphs' src='images/Estabelecimentos.png' title='Estabelecimentos'/></div>");
    $("#geraGraficoEstabelecimento").on("click", function(){ GraficoPizza("", "GraficoEstabelecimento.php","Estabelecimentos no Brasil"); });

    $("#resumoInformacoes").append("<div id='geraGraficoPatentes'><img class='graphs' src='images/patentes.jpg' title='Patentes'/></div>");
    $("#geraGraficoPatentes").on("click", function(){ GraficoPizza("", "GraficoPatentes.php","Patentes no Brasil"); });

    $('#divisaoPesquisada').css("display","none");
    $("#addResumoRelatorio").css("display", "none");

}
function AtualizaInformacoesEspecificas(variavel, div){
  window.informacao = [];
  window.caminho = "";
  window.caminho += variavel + ">";
  if($(".informacaoEspecifica").length && variavel == primeiroFiltro){
    $(".informacaoEspecifica").remove();
    RotateImage(0,div);
  }
  else{
    RotateImage(90,div);
    $(".informacaoEspecifica").remove();
  
    if(variavel == 'Economia'){

        window.arquivoPhp = "Economia.php";
        window.informacao.push("PIB");
        window.informacao.push("PIB per Capita");
        window.informacao.push("Impostos Recolhidos");
        window.informacao.push("PIB Agropecuária");
        window.informacao.push("PIB Indústria");
        window.informacao.push("PIB Serviços");
        window.informacao.push("Receitas Totais");
        window.informacao.push("Despesas Totais");
        window.informacao.push("% da despesa sobre a receita");
        window.informacao.push("Exportações");
        window.informacao.push("Importações");
        window.informacao.push("Balança comercial");
        window.informacao.push("PIB Governo");
        window.informacao.push("Receitas Próprias");
        window.informacao.push("Receitas de Transferências e Repasses");
        window.informacao.push("Despesas Correntes");
        window.informacao.push("Despesas de Capital");
      
      $("<div class='informacaoEspecifica'>"+
        "<br> "+
        "<div class='formInformacaoEspecifica'>"+
        "<div class='innerform'>"+
        "<form class='Limpo'>"+
        "<input type='radio' name='informacaoEspecifica' value='PIB,0'>PIB </br>"+
        "<input type='radio' name='informacaoEspecifica' value='PIB per Capita,1'>PIB per Capita</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Impostos Recolhidos,2'>Impostos Recolhidos</br>"+
        "<input type='radio' name='informacaoEspecifica' value='PIB Agropecuária,3'>PIB Agropecuária</br>"+
        "<input type='radio' name='informacaoEspecifica' value='PIB Indústria,4'>PIB Indústria</br>"+
        "<input type='radio' name='informacaoEspecifica' value='PIB Serviços,5'>PIB Serviços</br>"+
        "<input type='radio' name='informacaoEspecifica' value='PIB Governo,12'>PIB Governo</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Receitas Totais,6'>Receitas Totais</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Receitas Próprias,13'>Receitas Próprias</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Receitas de Transferências e Repasses,14'>Receitas de Transferências e Repasses</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Despesas Totais,7'>Despesas Totais</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Despesas Correntes,15'>Despesas Correntes</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Despesas de Capital,16'>Despesas de Capital</br>"+
        "<input type='radio' name='informacaoEspecifica' value='% da despesa sobre a receita,8'>% da despesa sobre a receita</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Exportações,9'>Exportações</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Importações,10'>Importações</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Balança comercial,11'>Balança comercial</br>"+
        "</form></div></div> </br> </br> </div>").insertAfter(div);
    }
    else if(variavel == "Trabalho e Renda"){
      window.arquivoPhp = "TrabalhoRenda.php";
      
      window.informacao.push("Possuem Ocupação");
      window.informacao.push("Possuem Ocupação %");
      window.informacao.push("Empregados");
      window.informacao.push("Com Carteira Assinada");
      window.informacao.push("Sem Carteira Assinada");
      window.informacao.push("Funcionários Públicos");
      window.informacao.push("Outro tipo de renda");
      window.informacao.push("Homens com rendimento");
      window.informacao.push("Mulheres com rendimento ");
      window.informacao.push("Média rendimento homens");
      window.informacao.push("Média rendimento mulheres");
      window.informacao.push("Até 1 salário");
      window.informacao.push("De 1 a 2 salários");
      window.informacao.push("De 2 a 3 salários");
      window.informacao.push("De 3 a 5 salários");
      window.informacao.push("De 5 a 10 salários");
      window.informacao.push("De 10 a 20 salários");
      window.informacao.push("Mais de 20 salários");

       $("<div class='informacaoEspecifica'>"+
        "<br> "+
        "<div class='formInformacaoEspecifica'>"+
        "<div class='innerform'>"+
        "<form class='Limpo'>"+
        "<input type='radio' name='informacaoEspecifica' value='Possuem Ocupação,0'>Possuem Ocupação </br>"+
        "<input type='radio' name='informacaoEspecifica' value='Possuem Ocupação%,1'>Possuem Ocupação %</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Empregados,2'>Empregados </br>"+
        "<input type='radio' name='informacaoEspecifica' value='Com Carteira Assinada,3'>Com Carteira Assinada</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Sem Carteira Assinada,4'>Sem Carteira Assinada</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Funcionários Públicos,5'>Funcionários Públicos</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Outro tipo de renda,6'>Outro tipo de renda </br>"+
        "<input type='radio' name='informacaoEspecifica' value='Homens com rendimento,7'>Homens com rendimento</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Mulheres com rendimento,8'>Mulheres com rendimento </br>"+
        "<input type='radio' name='informacaoEspecifica' value='Média rendimento homens,9'>Média rendimento homens</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Média rendimento mulheres,10'>Média rendimento mulheres</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Até 1 salário,11'>Até 1 salário</br>"+
        "<input type='radio' name='informacaoEspecifica' value='De 1 a 2 salários,12'>De 1 a 2 salários</br>"+
        "<input type='radio' name='informacaoEspecifica' value='De 2 a 3 salários,13'>De 2 a 3 salários</br>"+
        "<input type='radio' name='informacaoEspecifica' value='De 3 a 5 salários,14'>De 3 a 5 salários</br>"+
        "<input type='radio' name='informacaoEspecifica' value='De 5 a 10 salários,15'>De 5 a 10 salários</br>"+
        "<input type='radio' name='informacaoEspecifica' value='De 10 a 20 salários,16'>De 10 a 20 salários</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Mais de 20 salários,17'>Mais de 20 salários</br>"+
        "</form></div></div> </div>").insertAfter(div);
    } 
    else if(variavel == "Educação"){
      window.arquivoPhp = "Educacao.php";
      window.informacao.push("Fundamental Incompleto");
      window.informacao.push("Fundamental Completo");
      window.informacao.push("Médio Completo");
      window.informacao.push("Superior Completo");
/*RETIRAR*/      window.informacao.push("Estabelecimento de Educação Básica");
      window.informacao.push("Matrículas Educação Básica ");
      window.informacao.push("Matrículas Ensino Médio");
      window.informacao.push("Matrículas Educação Profissional");
      window.informacao.push("Concluintes Agricultura e veterinária");
      window.informacao.push("Concluintes Ciências sociais, negócios e direito");
      window.informacao.push("Concluintes Ciências, matemática e computação");
      window.informacao.push("Concluintes Engenharia, produção e construção");
      window.informacao.push("Concluintes Humanidades e artes");
      window.informacao.push("Concluintes Saúde e bem estar social");
      window.informacao.push("Concluintes Serviços");
      window.informacao.push("Concluintes Educação");
      window.informacao.push("Número de Doutores");
/*RETIRAR*/      window.informacao.push("Estabelecimento de Educação Profissional");
      window.informacao.push("Docentes - Educação Básica  / População");
      window.informacao.push("Docentes - Ensino Médio  / População");
      window.informacao.push("Docentes - Educação Profissional  / População");

      $("<div class='informacaoEspecifica'>"+
        "<br> "+
        "<div class='formInformacaoEspecifica'>"+
        "<div class='innerform'>"+
        "<form class='Limpo'>"+
        "<input type='radio' name='informacaoEspecifica' value='Fundamental Incompleto,0'>Fundamental Incompleto</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Fundamental Completo,1'>Fundamental Completo </br>"+
        "<input type='radio' name='informacaoEspecifica' value='Médio Completo,2'>Médio Completo</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Superior Completo,3'>Superior Completo</br>"+
        // "<input type='radio' name='informacaoEspecifica' value='Estabelecimento de Educação Básica,4'>Estabelecimento de Educação Básica</br>"+
        // "<input type='radio' name='informacaoEspecifica' value='Estabelecimento de Educação Profissional,17'>Estabelecimento de Educação Profissional</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Matrículas Educação Básica,5'>Matrículas Educação Básica </br>"+
        "<input type='radio' name='informacaoEspecifica' value='Matrículas Ensino Médio,6'>Matrículas Ensino Médio</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Matrículas Educação Profissional,7'>Matrículas Educação Profissional</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Concluintes Agricultura e veterinária,8'>Concluintes Agricultura e veterinária</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Concluintes Ciências sociais negócios e direito,9'>Concluintes Ciências sociais, negócios e direito</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Concluintes Ciências matemática e computação,10'>Concluintes Ciências, matemática e computação</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Concluintes Engenharia produção e construção,11'>Concluintes Engenharia, produção e construção</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Concluintes Humanidades e artes,12'>Concluintes Humanidades e artes</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Concluintes Saúde e bem estar social,13'>Concluintes Saúde e bem estar social</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Concluintes Serviços,14'>Concluintes Serviços</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Concluintes Educação,15'>Concluintes Educação</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Número de Doutores,16'>Número de Doutores</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Docentes - Educação Básica  / População,18'>Docentes - Educação Básica  / População</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Docentes - Ensino Médio  / População,19'>Docentes - Ensino Médio  / População</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Docentes - Educação Profissional  / População,20'>Docentes - Educação Profissional  / População</br>"+
        "</form></div></div> </div>").insertAfter(div);

    }
    else if(variavel == "Qualidade de Vida e Desenvolvimento Social"){
      window.arquivoPhp = "QualidadeVidaDSocial.php";
      window.informacao.push("População Total");
      window.informacao.push("IDH Municipal"); //NÃO USAR
      window.informacao.push("IDH Municipal – Educação");
      window.informacao.push("IDH Municipal – Longevidade");
      window.informacao.push("IDH Municipal – Renda");
/*2010*/  window.informacao.push("Índice de GINI");
/*2010*/  window.informacao.push("Extremamente Pobres");
/*2010*/  window.informacao.push("Pobres");
/*2010*/  window.informacao.push("Vulneráveis à pobreza");

      $("<div class='informacaoEspecifica'>"+
        "<br> "+
        "<div class='formInformacaoEspecifica'>"+
        "<div class='innerform'>"+
        "<form class='Limpo'>"+
        "<input type='radio' name='informacaoEspecifica' value='População Total,0'>População Total</br>"+
        "<input type='radio' name='informacaoEspecifica' value='IDH Municipal,1'>IDH Municipal</br>"+
        "<input type='radio' name='informacaoEspecifica' value='IDH Municipal – Educação,2'>IDH Municipal – Educação</br>"+
        "<input type='radio' name='informacaoEspecifica' value='IDH Municipal – Longevidade,3'>IDH Municipal – Longevidade</br>"+
        "<input type='radio' name='informacaoEspecifica' value='IDH Municipal – Renda,4'>IDH Municipal – Renda</br>"+
/*2010*/"<input type='radio' name='informacaoEspecifica' value='Índice de GINI,5'>Índice de GINI</br>"+
/*2010*/"<input type='radio' name='informacaoEspecifica' value='Extremamente Pobres,6'>Extremamente Pobres</br>"+
/*2010*/"<input type='radio' name='informacaoEspecifica' value='Pobres,7'>Pobres</br>"+
/*2010*/"<input type='radio' name='informacaoEspecifica' value='Vulneráveis à pobreza,8'>Vulneráveis à pobreza</br>"+
        "</form></div></div> </div>").insertAfter(div);
    }

    else if(variavel == "RAIS"){
      window.arquivoPhp = "RAIS.php";
      window.informacao.push("Empregados: Extrativa mineral");
      window.informacao.push("Empregados: Indústria de Transformação");
      window.informacao.push("Empregados: Serviços Industriais");
      window.informacao.push("Empregados: Construção Civil");
      window.informacao.push("Empregados: Comércio");
      window.informacao.push("Empregados: Serviços");
      window.informacao.push("Empregados: Administração Pública");
      window.informacao.push("Empregados: Agropecuárias, extração, caça e pesca");
      window.informacao.push("Remuneração média: Extrativa mineral");
      window.informacao.push("Remuneração média: Indústria de Transformação");
      window.informacao.push("Remuneração média: Serviços Industriais");
      window.informacao.push("Remuneração média: Construção Civil");
      window.informacao.push("Remuneração média: Comércio");
      window.informacao.push("Remuneração média: Serviços");
      window.informacao.push("Remuneração média: Administração Pública");
      window.informacao.push("Remuneração média: Agropecuárias, extração, caça e pesca");

      $("<div class='informacaoEspecifica'>"+
        "<br> "+
        "<div class='formInformacaoEspecifica'>"+
        "<div class='innerform'>"+
        "<form class='Limpo'>"+
        "<input type='radio' name='informacaoEspecifica' value='Empregados: Extrativa mineral,0'>Empregados: Extrativa mineral</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Empregados: Indústria de Transformação,1'>Empregados: Indústria de Transformação</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Empregados: Serviços Industriais,2'>Empregados: Serviços Industriais</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Empregados: Construção Civil,3'>Empregados: Construção Civil</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Empregados: Comércio,4'>Empregados: Comércio</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Empregados: Serviços,5'>Empregados: Serviços</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Empregados: Administração Pública,6'>Empregados: Administração Pública</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Empregados: Agropecuárias,7'>Empregados: Agropecuárias, extração, caça e pesca</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Remuneração média: Extrativa mineral,8'>Remuneração média: Extrativa mineral</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Remuneração média: Indústria de Transformação,9'>Remuneração média: Indústria de Transformação</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Remuneração média: Serviços Industriais,10'>Remuneração média: Serviços Industriais</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Remuneração média: Construção Civil,11'>Remuneração média: Construção Civil</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Remuneração média: Comércio,12'>Remuneração média: Comércio</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Remuneração média: Serviços,13'>Remuneração média: Serviços</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Remuneração média: Administração Pública,14'>Remuneração média: Administração Pública</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Remuneração média: Agropecuárias,15'>Remuneração média: Agropecuárias, extração, caça e pesca</br>"+
        "</form></div></div> </div>").insertAfter(div);

    }
    else if(variavel == "Saúde"){
      window.arquivoPhp = "Saude.php";
      window.informacao.push("Quantidade de Médicos");
      window.informacao.push("Recursos humanos da área da saúde");

      $("<div class='informacaoEspecifica'>"+
        "<br> "+
        "<div class='formInformacaoEspecifica'>"+
        "<div class='innerform'>"+
        "<form class='Limpo'>"+
        "<input type='radio' name='informacaoEspecifica' value='Quantidade de Médicos,0'>Quantidade de Médicos</br>"+
        "<input type='radio' name='informacaoEspecifica' value='Recursos humanos da área da saúde,1'>Recursos humanos da área da saúde</br>"+
        "</form></div></div> </div>").insertAfter(div);
    }
    $('.informacaoEspecifica input[type=radio]').change(function(){
      aux  = $(this).val().split(",");
      window.indexInformacao = Number(aux[1]);
      window.caminho = window.caminho.substring(0, window.caminho.indexOf(">")+1); 
      window.caminho += window.informacao[Number(aux[1])];
      AtualizaVarialvelPesquisa(aux[0]);
    });
  }
  primeiroFiltro = variavel;
}

function Minimize(obj){
  var div = $(obj).parent();
  if(!div.hasClass("minimized")) {
    div.draggable( 'disable' );
    // div.css('top', '95%' );
    $(obj).parent().children().hide(); 
    $(obj).parent().animate({"height": "25px","width":"83.75px"}).addClass("minimized");
    $(obj).show();
    $(obj).attr("src", "images/maximizar.png");
    $(".close").show();
    $("#minimizesDivs").append($(obj).parent());
    $(obj).parent().css({"position":"relative", "top":"0", "left":"0"});
  }
  else{
    div.draggable( 'enable' );
    // div.css('top', '50%' );
    $(obj).parent().children().show();
    $(obj).attr("src", "images/minimizar.png"); 
    $(obj).parent().css({"position":"", "top":"", "left":""});
    $(obj).parent().animate({"height": "400px","width":"500px"}).removeClass("minimized");
    $(obj).parent().filter("img").css("padding-top","10px");
    $("body").append($(obj).parent());
  }
}
function CloseSobre(){
  $("#backSobre").css("display", "none");
}
function ShowSobre(){
  $("#backSobre").css("display", "block");
}
function Close(obj){
  $(obj).parent().css("display", "none");
}

function getOS() {
  var userAgent = window.navigator.userAgent,
      platform = window.navigator.platform,
      macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
      windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
      iosPlatforms = ['iPhone', 'iPad', 'iPod'],
      os = null;

  if (macosPlatforms.indexOf(platform) !== -1) {
    os = 'Mac OS';
  } else if (iosPlatforms.indexOf(platform) !== -1) {
    os = 'iOS';
  } else if (windowsPlatforms.indexOf(platform) !== -1) {
    os = 'Windows';
  } else if (/Android/.test(userAgent)) {
    os = 'Android';
  } else if (!os && /Linux/.test(platform)) {
    os = 'Linux';
  }
  return os;
}

function DownloadDiv() {
  if(getOS() == 'Windows'){
    $("#relatorio").wordExport();
  }else{
     var a = document.body.appendChild(
         document.createElement("a")
     );
     a.download = "Visão - relatório analítico "+new Date()+".docx";
     a.href = "data:text/doc,"+'<!DOCTYPE html></br>' + document.getElementById("relatorio").innerHTML;
     a.click();
     a.remove();
  }
  // ConvertImagesToBase64();

  // var contentDocument = tinymce.get('relatorio').getDoc();
  // var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
  // var orientation = "portrait"
  // var converted = htmlDocx.asBlob(content, {orientation: orientation});
  // saveAs(converted, 'test.docx');
  // var link = document.createElement('a');
  // link.href = URL.createObjectURL(converted);
  // link.download = 'document.docx';
  // link.remove();
  
}

function initMap() {


  var styles = [{
      "featureType": "road",
          "elementType": "geometry.fill",
          "zIndex": "5",
          "stylers": [{
          "color": "#0000ff"
      }]
  }];
  
  // load the map
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -15, lng: -65},
    zoom: 3.5 * ($(window).height()/678),
    disableDefaultUI: true,
    zoomControl: true,
    zoomControlOptions: {
      position: google.maps.ControlPosition.RIGHT_CENTER
    }

    // styles: mapStyle
  });
  $("#BaixarRelatorio").click(function(event) {
    DownloadDiv();
  });
/*
  for(var i = 1; i < 14 ;i++){
    if(i < 9  )
      $("#datas").append('<div class="anoData" id= "ano'+ i +'" style= "width:'+ 100/13 +'"%;" ><b>200'+ (i+1) +'</b></div>');
    else
      $("#datas").append('<div class="anoData" id= "ano'+ i +'" style= "width:'+ 100/13 +'"%;" ><b>20'+ (i+1) +'</b></div>');
  }*/
  // window.jsonLayers.push(new google.maps.Data().loadGeoJson('geojson/UF/uf.json', { idPropertyName:'GEOCODIGO'}));
  // window.jsonLayers.push(new google.maps.Data().loadGeoJson('geojson/Municipios/geojs-100-mun.json', { idPropertyName:'id'}));
  // window.jsonLayers.push(new google.maps.Data().loadGeoJson('geojson/MesoRegiao/MesoRegiao.json', { idPropertyName:'GEOCODIGO'}));

  $('#inputListaDivisao').keypress(function(event) {
      if (event.keyCode == 13) {
        event.preventDefault();
      }
  });

  $("#mediaDadosGerais").draggable();
  map.data.addListener('mouseover', mouseInToRegion);
  map.data.addListener('mouseout', mouseOutOfRegion);
  //map.data.addListener('mouseup', clickedRegion);

  $("#inputListaDivisao").val("");

  var checkboxes = document.getElementsByTagName('input');
  for (var i = 0; i < checkboxes.length; i++) {
     if (checkboxes[i].type == 'checkbox') {
         checkboxes[i].checked = false;
     }
  }

  
  
  window.tipoDivisao = $('#divisao input[type=radio]:checked').val();
  $('#divisao input[type=radio]').change(function(){
    window.tipoDivisao = $(this).val();
    
    LoadMapShapes();
    AtualizaVarialvelPesquisa(window.variavelPesquisa);
  });

  LoadMapShapes();
  map.data.setStyle(styleFeature);
}

function clearCensusData() {
  censusMin = Number.MAX_VALUE;
  censusMax = -Number.MAX_VALUE;
  map.data.forEach(function(row) {                
    row.setProperty('census_variable', undefined);
    row.setProperty('nome', undefined);
  });
  document.getElementById('data-box').style.display = 'none';
  document.getElementById('data-caret').style.display = 'none';
}

function loadCensusData(variable, tipo,numGrafico) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      console.log(this.responseText);

      var dados = this.responseText.split(";");
      //console.log(this.responseText);//salvar apenas do ano selecionado
      dado["cod"] = [];
      dado["ano"] = [];
      dado["valor"] = [];
      dado["nome"] = [];
      dado["total"] = [];

      for(var i = 0; i < dados.length -1; i++){
        var aux = dados[i].split(",");


        window.dado["cod"].push(aux[0]);
        window.dado["ano"].push(aux[1]);
  
        if(aux[2] == "")
          window.dado["valor"].push(0);
        else
          window.dado["valor"].push(Number(aux[2]));

        window.dado["nome"].push(aux[3]);

        if(aux[4] == "")
          window.dado["total"].push(0);
        else
          window.dado["total"].push(Number(aux[4]));

      }

      //FUNCAO PARA ATUALIZAR OS ANOS==================================================================================
    window.AnosUnicos = [];

    $.each(window.dado["ano"], function(i, el){
        if($.inArray(el,window.AnosUnicos) === -1)window.AnosUnicos.push(el);
    });

    $("#datas").empty();

    for(var i = 0; i <window.AnosUnicos.length ;i++){
      $("#datas").append('<div class="anoData" id= "ano'+window.AnosUnicos[i] +'" style= "width:70px;" ><b>'+ window.AnosUnicos[i] +'</b></div>');    
    }
    if($.inArray(window.anoSelecionado,AnosUnicos)==-1){
      $("#Marcador").css("display", "block");
      //$("#Marcador").css("left", $(this).position().left + 20);
      window.anoSelecionado =window.AnosUnicos[window.AnosUnicos.length -1];

    }
    
    $("#Marcador").css("left",($.inArray(window.anoSelecionado,AnosUnicos) * 70 + 20)+"px");
    
    //========================================================================================================

    $(".anoData").click( function(){
      $("#Marcador").css("display", "block");
      $("#Marcador").css("left", $(this).position().left + 20);
      window.anoSelecionado = this.id.replace( /^\D+/g, '');
      LoadMapShapes();
    });

      for( i = 0; i < window.dado["cod"].length; i++){
        if(window.dado["ano"][i] == window.anoSelecionado){
          if( window.dado["total"][i] != "" )
            var valor = window.dado["valor"][i] / window.dado["total"][i];
          else
            var valor = window.dado["valor"][i];
          if( valor < censusMin)
            censusMin = valor;
          if(valor > censusMax)
            censusMax = valor;
          map.data
            .getFeatureById(window.dado["cod"][i])
            .setProperty('census_variable', valor);
          map.data
            .getFeatureById(window.dado["cod"][i])
            .setProperty('nome', window.dado["nome"][i]);
        }
      }

      var nomes;
      var valores;
      var anos;
      var dadosGrafico = [];
      dadosGrafico["label"] = [];
      dadosGrafico["valor"] = [];
      if(window.setoresMarcados.length > 0){
        i = 0;
        var cod;
        for (i in window.dado["cod"]){
          for(var j in window.setores){
            if(!dadosGrafico["label"].includes(window.dado["nome"][i]) && window.setores[j].key == window.dado["cod"][i] && window.setoresMarcados.includes(window.setores[j].cod_setor) && window.dado["ano"][i] == window.anoSelecionado){
              dadosGrafico["label"].push(window.dado["nome"][i]);     

              if(window.dado["total"][i] != ""){                
                if(i == 0 ){
                  censusMax = window.dado["valor"][i] / window.dado["total"][i];
                  censusMin = window.dado["valor"][i] / window.dado["total"][i];
                }
                else{ 
                  if((window.dado["valor"][i] / window.dado["total"][i]) > censusMax)
                    censusMax = window.dado["valor"][i] / window.dado["total"][i];
                  if((window.dado["valor"][i] / window.dado["total"][i]) < censusMin)
                    censusMin = window.dado["valor"][i] / window.dado["total"][i];
                }
                dadosGrafico["valor"].push(window.dado["valor"][i] / window.dado["total"][i]);
              }
              else{
                if(i == 0 ){                  
                  censusMax = window.dado["valor"][i];
                  censusMin = window.dado["valor"][i];
                }
                else{                                   
                  if((window.dado["valor"][i]) > censusMax)
                    censusMax = window.dado["valor"][i];
                  if((window.dado["valor"][i]) < censusMin)
                    censusMin = window.dado["valor"][i] ;
                }
                dadosGrafico["valor"].push(window.dado["valor"][i]);

              }
            }
          }
        }
        // window.open("Grafico.php?nome="+JSON.stringify(dadosGrafico["label"])+"&valor="+JSON.stringify(dadosGrafico["valor"])+"&informacao="+JSON.stringify(window.dado["informacao"][0]),'', 'width=680, height=500'); 
    }
    else{
      for (i in window.dado["cod"]){
        if(window.dado["ano"][i] == window.anoSelecionado){
          dadosGrafico["label"].push(window.dado["nome"][i]);
          if(window.dado["total"][i] != "")
            dadosGrafico["valor"].push(window.dado["valor"][i] / window.dado["total"][i]);
          else
            dadosGrafico["valor"].push(window.dado["valor"][i]);
        }
      }
      // window.open("Grafico.php?nome="+JSON.stringify(window.dado["nome"])+"&valor="+JSON.stringify(window.dado["valor"])+"&informacao="+JSON.stringify(window.dado["informacao"][0]),'', 'width=680, height=500'); 
    }
      if(window.tipoDivisao == "E"){
        nomes = dadosGrafico["label"];
        valores = dadosGrafico["valor"];
        if(numGrafico == null){
          var ano;
          ano = Number(window.anoSelecionado);

        if(valores.length != 0){
          $("body").append("<div class='dragable'>"+
            "<div class='chartsHearder'></div>"+
            "<img src='images/fechar.png' class='close' onClick='Close(this)'/>"+
            "<img src='images/minimizar.png' class='minimize' onClick='Minimize(this)'/>"+
            "<div class='chatsTittles' id='chartTittle"+window.numeroGrafico+"'>"+window.caminho+" | ano "+ano+"</div>"+
            "<canvas class='charts' id='myChart"+window.numeroGrafico+"'></canvas>"+          
            "<div class='relatorioGrafico' onclick=\"AdicionarRelatorio('myChart"+window.numeroGrafico+"')\">"+
              "Enviar Gráfico para relatório <img src='images/relatorio.png' /> "+
            "</div>"+
          "</div>");

          GetLegend();

          CriarGrafico(window.numeroGrafico,nomes,window.informacao[window.indexInformacao],valores,'bar');

          $(".dragable").draggable();
          $(".dragable").resizable();
          window.numeroGrafico++;
        }
      }
    }
      else{
        if(window.tipoDivisao == "E")
          $("#myChart"+numGrafico).parent().css("display", "block");
        // if(!window.graficos[numGrafico].closed)
        //   window.graficos[numGrafico].focus()
        // else{
        //   window.graficos[numGrafico] = window.open("", "Grafico" + numGrafico, "status=0,title=0,height=600,width=800,scrollbars=1");
        //   formGrafico.submit();
        // }
      }  

      ObtemdadosGerais();
      // document.getElementById('census-variable').textContent = window.dado["informacao"][0];
      $('#loading').css('display','none');
 }
  };

  xmlhttp.open("GET", "php/"+window.arquivoPhp+"?variavel="+variable+"&tipo="+tipo+"&ano="+window.anoSelecionado, true);
  xmlhttp.send();

}

function numberWithCommas(y) {
  x = Number(y);

  if(x-parseInt(x)>0)
    var parts = (x.toFixed(2)).toString().split(".");
  else{
    var parts = x.toString().split(".");
  }
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
  
}

//=============================================================================COLOCAR LEGENDAS PARA CASOS ESPECIFICOS

function GetLegend(){
  
  if((window.informacao[window.indexInformacao] == '% da despesa sobre a receita') 
          || (window.informacao[window.indexInformacao] ==  'Possuem Ocupação %'))
    window.UnidadeY = '%';
  else if((window.informacao[window.indexInformacao] == 'Exportações')
          ||(window.informacao[window.indexInformacao] == 'Importações')
          ||(window.informacao[window.indexInformacao] == 'Balança comercial')
  )
    window.UnidadeY = 'US$ FOB';
  else if((window.informacao[window.indexInformacao] == 'Receitas Totais')
          ||(window.informacao[window.indexInformacao] == 'Receitas Próprias')
          ||(window.informacao[window.indexInformacao] == 'Receitas de Transferências e Repasses')
          ||(window.informacao[window.indexInformacao] == 'Despesas Totais')
          ||(window.informacao[window.indexInformacao] == 'Despesas Correntes')
          ||(window.informacao[window.indexInformacao] == 'Despesas de Capital')

          ||(window.informacao[window.indexInformacao] == 'Média rendimento homens')
          ||(window.informacao[window.indexInformacao] == 'Média rendimento mulheres')

          ||(window.informacao[window.indexInformacao] == 'Remuneração média: Extrativa mineral')
          ||(window.informacao[window.indexInformacao] == 'Remuneração média: Indústria de Transformação')
          ||(window.informacao[window.indexInformacao] == 'Remuneração média: Serviços Industriais')
          ||(window.informacao[window.indexInformacao] == 'Remuneração média: Construção Civil')
          ||(window.informacao[window.indexInformacao] == 'Remuneração média: Comércio')
          ||(window.informacao[window.indexInformacao] == 'Remuneração média: Serviços')
          ||(window.informacao[window.indexInformacao] == 'Remuneração média: Administração Pública')
          ||(window.informacao[window.indexInformacao] == 'Remuneração média: Agropecuárias')

          ||(window.informacao[window.indexInformacao] == 'PIB')
          ||(window.informacao[window.indexInformacao] == 'Impostos Recolhidos')
          ||(window.informacao[window.indexInformacao] == 'PIB Agropecuária')
          ||(window.informacao[window.indexInformacao] == 'PIB Indústria')
          ||(window.informacao[window.indexInformacao] == 'PIB Serviços')
          ||(window.informacao[window.indexInformacao] == 'PIB Governo')
          ||(window.informacao[window.indexInformacao] == 'PIB per Capita')

  )
    window.UnidadeY = 'R$'
  else
    window.UnidadeY = ' ';
  //window.UnidadeX = 'VS KING GHIDORA';
}

//=====================================================================================================================

function SetoresPordivisao(){
    window.setores = [];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) { 
        var dados = this.responseText.split(";");

        for(var i = 0; i < dados.length; i++){
          var aux = dados[i].split(",");
          window.setores.push({
            key: aux[0],
            cod_setor: aux[1],
            valor: aux[2]
          });
        }
      }
    };

  xmlhttp.open("GET", "php/functions.php?variavel=SetoresPorDivsao&tipo="+window.tipoDivisao, true);
  xmlhttp.send();
}




function styleFeature(feature) {
  var low = [5, 69, 54];
  var high = [151, 83, 34];


  var delta = (feature.getProperty('census_variable') - censusMin) /
      (censusMax - censusMin);
  
  var color = [];
  if(window.variavelPesquisa != null){
    for (var i = 0; i < 3; i++) {
      color[i] = (high[i] - low[i]) * delta + low[i];
    }
  }
  else{
    color[0] = 70;
    color[1] = 70;
    color[2] = 70;
  }

  var achou = 0;
  if(window.setoresMarcados.length > 0){
    for (var j in window.setores){
      if(window.setores[j].key == feature.getId() && window.setoresMarcados.includes(window.setores[j].cod_setor)){
          achou = 1;
          break;
      }
    }
  
    if(achou == 0){
      color[0] = 0;
      color[1] = 0;
      color[2] = 0;
    }
  }

  var outlineWeight = 0.5, zIndex = 1;
  var strokeColorVal = '#fff';

  if(window.tipoDivisao == "M")
    outlineWeight = 0;
  if(feature.getProperty('click') === 'clicked'){
    outlineWeight = zIndex = 2;
    strokeColorVal = "#f00";
  }
  

  if (feature.getProperty('state') === 'hover') {
    strokeColorVal = "#fff"
    outlineWeight = zIndex = 2;
  }

  return {
    strokeWeight: outlineWeight,
    strokeColor: strokeColorVal,
    zIndex: zIndex,
    fillColor: 'hsl(' + color[0] + ',' + color[1] + '%,' + color[2] + '%)',
    fillOpacity: 0.75,
    visible: true
  };
}
function AtualizarDivisoesMarcadas(){
  if(window.divisoesMarcadas.length > 0){
    var somaAgro = 0, somaIndus = 0, somaPopulacao = 0;
    for(var i in window.divisoesMarcadas){
      somaAgro += Number(divisoesMarcadas[i].agro);
      somaIndus += Number(divisoesMarcadas[i].industria);
      somaPopulacao += Number(divisoesMarcadas[i].populacao);
    }
    $("#mediaDadosGerais ul").remove();
    $("#mediaDadosGerais").append("<ul>"+
      "<li>média de valores adicionado bruto da Agropecuária: "+(somaAgro / window.divisoesMarcadas.length).toFixed(2)+ "</li>"+
      "<li>média de valores adicionado bruto da Indústria: "+(somaIndus / window.divisoesMarcadas.length).toFixed(2)+ "</li>"+
      "<li>média de População (Nº de habitantes): "+(somaPopulacao / window.divisoesMarcadas.length).toFixed(2)+ "</li>"+
      "</ul>");
    // $("#resumoInformacoes").css('display','block')
    $("#mediaDadosGerais").css('display', 'block');
  }
  else
    $("#mediaDadosGerais").css('display', 'none');
}

function clickedRegion(e){
  if(e.feature.getProperty('click') === 'clicked'){
    e.feature.setProperty('click', 'normal');
    for(var i in window.dadosGerais){
      if(window.divisoesMarcadas[i].key == e.feature.getId()){
        window.divisoesMarcadas.splice(i,1);
        break;
      }
    }
  }
  else{
    e.feature.setProperty('click', 'clicked');
    for(var i in window.dadosGerais){
      if(window.dadosGerais[i].key == e.feature.getId()){
        window.divisoesMarcadas.push(window.dadosGerais[i]);
        break;
      }
    }
  }
  AtualizarDivisoesMarcadas();
}

function mouseInToRegion(e) {
  // set the hover state so the setStyle function can change the border
  e.feature.setProperty('state', 'hover');
  var total = 0;
  for (var i in window.setores){
    if (window.setores[i].key == e.feature.getId()){
      $("#"+ window.setores[i].cod_setor).html(window.setores[i].valor);
      total += Number(window.setores[i].valor);
    }
  }
  $("#total").html(total);
  if(!window.buscaEspecifica){
    $('#divisaoPesquisada').css("display","block");
    $("#addResumoRelatorio").css("display", "block");
    var i = window.dadosGerais.map(function(x) {return x.key; }).indexOf(e.feature.getId());
    $('#divisaoPesquisada').html(
      "<div>Código: "+window.dadosGerais[i].key+"</div>"+
        "<div>Nome: "+ window.dadosGerais[i].Nome+"</div>"+
        "<div>Número de Habitantes: "+ numberWithCommas(window.dadosGerais[i].NHabitantes)+"</div>"+
        "<div>PIB: R$ "+ numberWithCommas(window.dadosGerais[i].PIB*1000)+",00</div>"+
        "<div>PIB per capita: R$ "+ numberWithCommas(window.dadosGerais[i].PIBpercapita*1000)+"</div>"+
        "<div>Possuem Ocupação: "+ numberWithCommas(window.dadosGerais[i].PossuemOcupacao * 100)+" %</div>"+
        "<div>Empregados:"+ numberWithCommas(window.dadosGerais[i].Empregados*100)+" %</div>"+
        "<div>Média rendimento homens: R$ "+ numberWithCommas(window.dadosGerais[i].MediaRendimentoHomens)+"</div>"+
        "<div>Média rendimento mulheres: R$ "+ numberWithCommas(window.dadosGerais[i].MediaRendimentoMulheres)+"</div>"+
        "<div>Fundamental Incompleto: "+ numberWithCommas(window.dadosGerais[i].FundamentalIncompleto*100)+" %</div>"+
        "<div>Fundamental Completo: "+ numberWithCommas(window.dadosGerais[i].FundamentalCompleto*100)+" %</div>"+
        "<div>Médio Completo: "+ numberWithCommas(window.dadosGerais[i].MédioCompleto*100)+" %</div>"+
        "<div>Superior Completo: "+ numberWithCommas(window.dadosGerais[i].SuperiorCompleto*100)+" %</div>");
  }
    
  if(window.variavelPesquisa != null){
    // $("#resumoInformacoes").prepend("<div id='informacaoAtual'><ul>"+
    //   "<li>nome: "+e.feature.getProperty('nome')+"</li>"+
    //   "<li>"+window.dado["informacao"][0]+": "+e.feature.getProperty('census_variable').toLocaleString()+"</li>"+
    //   "</ul></div>");

    var percent = (e.feature.getProperty('census_variable') - censusMin) /
        (censusMax - censusMin) * 100;



    // update the label
    document.getElementById('data-label').textContent =
        e.feature.getProperty('nome');
    document.getElementById('data-value').textContent =
        formatN(e.feature.getProperty('census_variable'));


    document.getElementById('data-box').style.display = 'block';
    document.getElementById('data-caret').style.display = 'block';
    document.getElementById('data-caret').style.paddingLeft = percent + '%';
//TENTATIVA DE COLOCAR VALOR NO MOUSE========================================================
    try{
      $(document).mousemove(function(event){  $varx = event.pageX;  $vary = event.pageY;});
      document.getElementById('data-box').style.top = $vary + 'px';
      document.getElementById('data-box').style.left = $varx + 'px';
    }
    catch(e)
    {
    }
    
  }
}

function formatN(y){
  x = Number(y);

  

  if(window.UnidadeY == 'R$' || window.UnidadeY == 'US$ FOB'){
    var parts = (x.toFixed(2)).toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    t = parts.join(",");
    if(window.UnidadeY == 'R$')return ('R$ '+t);
    else                       return ('US$ '+t);
  }else if(window.UnidadeY == '%'|| window.UnidadeY == ' '){
    if(x-parseInt(x)>0)
      var parts = (x.toFixed(2)).toString().split(".");
    else{
      var parts = x.toString().split(".");
    }
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    t = parts.join(",");
    if(window.UnidadeY == '%')return (t+' %');
    else                      return t.toString();
  }
}

function LimparTudo(){
  censusMin = Number.MAX_VALUE, censusMax = -Number.MAX_VALUE;
  window.dado = [];
  window.variavelPesquisa = null;
  window.setores = [];
  window.setoresMarcados = [];
  window.numeroGrafico = 1;
  window.graficos = [];
  window.informcao = [];
  window.dadosGerais = [];
  window.divisoesMarcadas = []
  window.indexInformacao = null;
  window.caminho = "";
  $("#caminho span").html("");
  $(".Limpo").each(function() { this.reset();});
  $(':checkbox').prop('enabled', false);
  $(".dragable").remove();
  $("#Saves").html("<img src='images/escova.png' alt='Limpar' id='Limpar'/>"+
      "<img alt='Salvar analise' src='images/SalvaAnalise.png' id='SalvaAnalise'  style='padding-right: 10px;'/>"+
      "<img src='images/relatorio.png'/>");
  $("#Saves").css("opacity", "0.5");
  $(".informacaoEspecifica").remove();
  $("#addResumoRelatorio").css("display", "none");
  $(".ExpandivelImg") .animate({  transform: 0 }, {
    step: function(now,fx) {
        $(this).css({
            '-webkit-transform':'rotate('+now+'deg)', 
            '-moz-transform':'rotate('+now+'deg)',
            'transform':'rotate('+now+'deg)'
        });
    }
  });
  LoadMapShapes();
}


function mouseOutOfRegion(e) {
  $("#informacaoAtual").remove();
  for(var i = 1; i <= 26; i++){
    $("#"+ i).html("0");
  }
  $("#total").html("0");
  if(!window.buscaEspecifica){
    $('#divisaoPesquisada').css("display","none");
    $("#addResumoRelatorio").css("display", "none");
  }
  // reset the hover state, returning the border to normal
  e.feature.setProperty('state', 'normal');

  document.getElementById('data-box').style.display = 'none';
  document.getElementById('data-caret').style.display = 'none';
}

function ClearMapData(){
  map.data.forEach(function (feature) {
      map.data.remove(feature);
  });
}

function LoadMapShapes(grafico){
  SetoresMarcado();
  ClearMapData();
  clearCensusData();
  LimpaDadosGerais();
  $("#FormBuscaEspecifica")[0].reset();
  if($("#opcoes").is(':visible')){
    RotateImage(0, $("#setores"));
    $("#opcoes").slideToggle();
  }
  if(window.variavelPesquisa != null){
    $("#SalvaAnalise").remove();
    if(window.caminho.includes("|"))
      window.caminho = window.caminho.substring(0, window.caminho.indexOf('|') -1);
    if(window.setoresMarcados.length > 0){
      if(window.caminho.includes("+"))
        window.caminho = window.caminho.substring(0, window.caminho.indexOf('+')-1);
      window.caminho += " + APL"; 
    }
    $("#Saves").css("opacity", "1");
    $("#addResumoRelatorio").css("display", "none");
    if(window.tipoDivisao == 'M'){
      $('#loading').css('display','block');
      window.caminho += " | por Municipio"
      $("#Saves").html("<img src='images/escova.png' alt='Limpar' id='Limpar' onclick='LimparTudo()'/><img alt='Salvar analise' src='images/SalvaAnalise.png' id='SalvaAnalise' onclick='SalvaPesquisa("+window.numeroGrafico+", \""+window.informacao[window.indexInformacao]+" por municipio\", \""+window.caminho+"\")' /><img src='images/relatorio.png' onclick=\" AdicionarRelatorio('map') \" id='relatorioMapa' />");
      SetoresPordivisao();
      map.data.loadGeoJson('geojson/Municipios/geojs-100-mun.json', { idPropertyName:'id'}, function(){
        loadCensusData(window.variavelPesquisa, window.tipoDivisao,grafico);
      });

    }
    else if(window.tipoDivisao == 'E'){
      $('#loading').css('display','block');
      window.caminho += " | por Estado"
      SetoresPordivisao();
      $("#Saves").html("<img src='images/escova.png' alt='Limpar' id='Limpar' onclick='LimparTudo()'/><img alt='Salvar analise' src='images/SalvaAnalise.png' id='SalvaAnalise' onclick='SalvaPesquisa("+window.numeroGrafico+", \""+window.informacao[window.indexInformacao]+" por estado\", \""+window.caminho+"\")' /><img src='images/relatorio.png' onclick=\" AdicionarRelatorio('map') \" id='relatorioMapa' />");
      map.data.loadGeoJson('geojson/UF/uf.json', { idPropertyName:'GEOCODIGO'}, function(){
        loadCensusData(window.variavelPesquisa, window.tipoDivisao,grafico);
      });    
    }
    else if(window.tipoDivisao == 'MR'){
      $('#loading').css('display','block');$('#divisaoPesquisada').css("display","block");
    $("#addResumoRelatorio").css("display", "block");
      window.caminho += " | por Meso Região"
      SetoresPordivisao();
      $("#Saves").html("<img src='images/escova.png' alt='Limpar' id='Limpar' onclick='LimparTudo()'/><img alt='Salvar analise' src='images/SalvaAnalise.png' id='SalvaAnalise' onclick='SalvaPesquisa("+window.numeroGrafico+", \""+window.informacao[window.indexInformacao]+" por meso região\", \""+window.caminho+"\")')' /><img src='images/relatorio.png' onclick=\" AdicionarRelatorio('map') \" id='relatorioMapa' />");
      map.data.loadGeoJson('geojson/MesoRegiao/MesoRegiao.json', { idPropertyName:'GEOCODIGO'}, function(){
        loadCensusData(window.variavelPesquisa, window.tipoDivisao,grafico);
      });    
    }
    if(window.caminho.length > 50){
      $("#caminho span").html(window.caminho.substring(0,50)+"...");
      $("#caminho span").attr("title", window.caminho);
    }
    else
      $("#caminho span").html(window.caminho);

  }
  else{
    ObtemdadosGerais();
    if(window.tipoDivisao == 'M'){
      $('#loading').css('display','block');
      SetoresPordivisao();
      map.data.loadGeoJson('geojson/Municipios/geojs-100-mun.json', { idPropertyName:'id'},function(){
        $('#loading').css('display','none');
      });

    }
    else if(window.tipoDivisao == 'E'){
      $('#loading').css('display','block');
      
      SetoresPordivisao();
      map.data.loadGeoJson('geojson/UF/uf.json', { idPropertyName:'GEOCODIGO'},function(){
        $('#loading').css('display','none');
      });
    }
    else if(window.tipoDivisao == 'MR'){

      $('#loading').css('display','block');
      SetoresPordivisao();
      map.data.loadGeoJson('geojson/MesoRegiao/MesoRegiao.json', { idPropertyName:'GEOCODIGO'},function(){
        $('#loading').css('display','none');
      });
    }

  }
}

