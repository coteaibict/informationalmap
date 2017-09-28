function CriarGrafico(numero,nome, informacao, valores, tipo, select){
  if(select != undefined){

    $("#myChart"+numero).remove();
    $("<canvas class='charts' id='myChart"+numero+"' ></canvas>").insertAfter("#chartTittle"+numero);
  }
	var ctx = document.getElementById("myChart"+numero).getContext("2d");

  var valoreslocal = [];
  var nomelocal = [];
  var anos = (window.AnosUnicos);

  for(var i=0;i<anos.length;i++){
    if(anos[i]==window.anoSelecionado)
      var i0 = i;
  }



  for (var i =i0;i<valores.length;i+=anos.length){
    valoreslocal.push(valores[i]);
    nomelocal.push(nome[i]);
  }


  var myChart = new Chart(ctx, {
      type: tipo,
      data: {
        labels: nomelocal,
        datasets: [{
            label: informacao,
            data: valoreslocal,
            backgroundColor: "rgb(85, 112, 124,1)"  
          }]
      },
      options: {
      	maintainAspectRatio: false,
        responsive: false,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
                display:false
            }
          }],
          yAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
                beginAtZero:false
            }
          }]
        }
      }
  });
  // $("#addGraficoRelatorio").remove();
  // $(select).parent().prepend("<button id='addGraficoRelatorio' onclick='SalvaGraficoImg()'>Adcionar gráfico ao relatório</button>");
}
//Colocar nomes como argumento se quiser usar labels
function CriarGraficoLinha(/*nomes,*/valores, informacao, dominio){
  $("body").append("<div class='dragable'>"+
    "<div class='chartsHearder'></div>"+
    "<img src='images/fechar.png' class='close' onClick='Close(this)'/>"+
    "<img src='images/minimizar.png' class='minimize' onClick='Minimize(this)'/>"+
    "<div class='chatsTittles' id='chartTittle"+window.numeroGrafico+"'>Histórico de "+informacao+"</div>"+

    "<canvas class='charts' id='myChart"+window.numeroGrafico+"'></canvas>"+

    "<div class='relatorioGrafico' onclick=\"AdicionarRelatorio('myChart"+window.numeroGrafico+"')\">"+
      "Enviar Gráfico para relatório <img src='images/relatorio.png' /> "+
    "</div>"+
  "</div>");

  var ctx = document.getElementById("myChart"+window.numeroGrafico).getContext("2d");

  
  for(var i =0; i<window.dado["nome"].length;i++){
    if(window.dado["nome"][i]==informacao){
      var x = i;
      break;
    }
  }
  var valoreslocal =[];
  if(i < window.dado["nome"].length){
    for(var i =0; i<window.AnosUnicos.length;i++){
      valoreslocal.push(valores[x+i]);
    } 
  }
  else{
    i = 0;
    var j = 0;
    while(i<valores.length){
      for(j = 0; j <window.AnosUnicos.length; j++){
        if(valoreslocal[j] == null)
          valoreslocal[j] = valores[i+j];
        else
          valoreslocal[j] += valores[i+j];
      }
      i += j;
    }
  }

  var options = {
    legend: {
            display: false
         },
    responsive: false
  };
  var data = {
    datasets: [{
        data: valoreslocal
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    //labels:nomes
  };

  var myLineChart = new Chart(ctx,{
    type: 'line',
    data: {
      labels: dominio,
      datasets: [{
        data: valoreslocal
      }]       
    },
    options: options
  });

  $(".dragable").draggable();
  $(".dragable").resizable();
  window.numeroGrafico++;
}

function CriarGraficoPizza(nomes,valores, informacao){



  $("body").append("<div class='dragable'>"+
    "<div class='chartsHearder'></div>"+
    "<img src='images/fechar.png' class='close' onClick='Close(this)'/>"+
    "<img src='images/minimizar.png' class='minimize' onClick='Minimize(this)'/>"+
    "<div class='chatsTittles' id='chartTittle"+window.numeroGrafico+"'>"+informacao+"</div>"+

    "<canvas class='charts' id='myChart"+window.numeroGrafico+"'></canvas>"+

    "<div class='relatorioGrafico' onclick=\"AdicionarRelatorio('myChart"+window.numeroGrafico+"')\">"+
      "Enviar Gráfico para relatório <img src='images/relatorio.png' /> "+
    "</div>"+
  "</div>");


  var ctx = document.getElementById("myChart"+window.numeroGrafico).getContext("2d");

  colors = [];
  for(var i in valores){

    colors.push('rgb('+Math.floor(Math.random() * 255)+','+Math.floor(Math.random() * 255)+','+Math.floor(Math.random() * 255)+')');
  }
  var options = {
    legend: {
            display: false
         },
    responsive: false
  };
  data = {
    datasets: [{
        data: valores,
        backgroundColor: colors
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels:nomes
  };

  var myPieChart = new Chart(ctx,{
    type: 'pie',
    data: data,
    options: options
  });

  $(".dragable").draggable();
  $(".dragable").resizable();
  window.numeroGrafico++;
}



function GraficoPizza(cod, arquivo, informacao){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      
      var dados = this.responseText.split(";");
      var nomes = [];
      var valores = [];
      for(var i = 0; i < dados.length -1; i++){
        var aux = dados[i].split("&");
        nomes.push(aux[0]); 
        valores.push(Number(aux[1]));

      }
      CriarGraficoPizza(nomes,valores, informacao);
      $('#loading').css('display','none');
    }
  }
  $('#loading').css('display','block');
  xmlhttp.open("GET", "php/"+arquivo+"?tipoDivisao="+window.tipoDivisao+"&cod="+cod+"&ano="+window.anoSelecionado, true);
  xmlhttp.send();
}
//APAGAR============================================================================
function GraficoLinha(cod, arquivo, informacao){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      
      var dados = this.responseText.split(";");
      var nomes = [];
      var valores = [];
      var dominio = [];
      for(var i = 0; i < dados.length -1; i++){
        var aux = dados[i].split("&");
        nomes.push(aux[0]); 
        valores.push(Number(aux[1]));
        dominio.push(Number(aux[2]))
      }
      CriarGraficoLinha(nomes,valores, informacao, dominio);
      $('#loading').css('display','none');
    }
  }
  $('#loading').css('display','block');
  xmlhttp.open("GET", "php/"+arquivo+"?tipoDivisao="+window.tipoDivisao+"&cod="+cod+"&variavel="+window.variavelPesquisa, true);
  xmlhttp.send();
}


function SalvaGraficoImg(){

  var can = document.getElementById('myChart');
  var ctx = can.getContext('2d');

  ctx.fillRect(50,50,50,50);

  var img = new Image();
  img.src = can.toDataURL();
  $(".googoose-wrapper").append(img);

  var o = {
    filename: 'Test.doc'
  };

  $(document).googoose(o);
  // canvas = document.getElementById("myChart");
  // var xmlhttp = new XMLHttpRequest();
  // xmlhttp.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200){
  //     console.log(this.responseText);
  //     alert("Gráfico adcionado ao relatório")
  //   }
  // }

  // xmlhttp.open("POST", "php/AddImgRelatorio.php", true);
  // xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  // xmlhttp.send("img="+canvas.toDataURL("img/png"));


}