function CriarGrafico(numero,nome, informacao, valores, tipo, select){
  if(select != undefined){

    $("#myChart"+numero).remove();
    $("<canvas class='charts' id='myChart"+numero+"' ></canvas>").insertAfter("#chartTittle"+numero);
  }
	var ctx = document.getElementById("myChart"+numero).getContext("2d");

  // console.log(nome,valores);

  var myChart = new Chart(ctx, {
      type: tipo,
      data: {
        labels: nome,
        datasets: [{
            label: informacao,
            data: valores,
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
            },
            scaleLabel: {
              display: true,
              labelString: window.UnidadeX
            }
          }],
          yAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
                beginAtZero:false
            },
            scaleLabel: {
              display: true,
              labelString: window.UnidadeY
            }
          }]
        }
      }
  });
  // $("#addGraficoRelatorio").remove();
  // $(select).parent().prepend("<button id='addGraficoRelatorio' onclick='SalvaGraficoImg()'>Adcionar gráfico ao relatório</button>");
}
//Colocar nomes como argumento se quiser usar labels
function CriarGraficoLinha(/*nomes,*/valores, informacao, dominio, total){
  $("body").append("<div class='dragable'>"+
    "<div class='chartsHearder'></div>"+
    "<img src='images/fechar.png' class='close' onClick='Close(this)'/>"+
    "<img src='images/minimizar.png' class='minimize' onClick='Minimize(this)'/>"+
    "<div class='chatsTittles' id='chartTittle"+window.numeroGrafico+"'>Histórico de "+informacao+"</div>"+
    "<div class='conteudo'>"+
    "<canvas class='charts' id='myChart"+window.numeroGrafico+"'></canvas>"+

    "<div class='relatorioGrafico' onclick=\"AdicionarRelatorio('myChart"+window.numeroGrafico+"')\">"+
      "Enviar Gráfico para relatório <img src='images/relatorio.png' /> "+
    "</div>"+
  "</div></div>");



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
      if(total[x+i] == 0){
        total[x+i] = 1;
      }
      valoreslocal.push(valores[x+i]/total[x+i]);
    } 
  }
  else{
    i = 0;
    var j = 0;
    while(i<valores.length){
      for(j = 0; j <window.AnosUnicos.length; j++){
        if(total[j+i] == 0){
          total[j+i] = 1;
        }
        if(valoreslocal[j] == null)
          valoreslocal[j] = valores[i+j]/total[j+i];
        else
          valoreslocal[j] += valores[i+j]/total[j+i];
      }
      i += j;
    }
  }

  var options = {
    legend: {
            display: false
         },
    responsive: false,
    scales: {
          xAxes: [{
            gridLines: {
                display:false
            },
            scaleLabel: {
              display: true,
              labelString: window.UnidadeX
            }
          }],
          yAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
                beginAtZero:false
            },
            scaleLabel: {
              display: true,
              labelString: window.UnidadeY
            }
          }]
        }
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

  if(informacao.indexOf('População')!=-1){
    var G2 = window.numeroGrafico +1;
    var G3 = window.numeroGrafico +2;
    $("body").append("<div class='dragable'>"+
      
      "<div class='chartsHearder'></div>"+
      "<img src='images/fechar.png' class='close' onClick='Close(this)'/>"+
      "<img src='images/minimizar.png' class='minimize' onClick='Minimize(this)'/>"+
      "<div class='chatsTittles' id='chartTittle"+window.numeroGrafico+"'>"+informacao+"</div>"+
      "<div class='conteudo'>"+

      "<div class='chatsTittles' id='chartTittle"+window.numeroGrafico+"'>"+'Rural x Urbano'+"</div>"+
      "<canvas class='charts' id='myChart"+window.numeroGrafico+"'></canvas>"+  

      "<div class='relatorioGrafico' onclick=\"AdicionarRelatorio('myChart"+window.numeroGrafico+"')\">"+
        "Enviar Gráfico para relatório <img src='images/relatorio.png' /> "+
      "</div>"+

      "<div class='chatsTittles' id='chartTittle"+G2+"'>"+'Idade'+"</div>"+
      "<canvas class='charts' id='myChart2"+G2+"'></canvas>"+

      "<div class='relatorioGrafico' onclick=\"AdicionarRelatorio('myChart2"+G2+"')\">"+
        "Enviar Gráfico para relatório <img src='images/relatorio.png' /> "+
      "</div>"+

      "<div class='chatsTittles' id='chartTittle"+G3+"'>"+'Sexo e Idade'+"</div>"+
      "<canvas class='charts' id='myChart3"+G3+"'></canvas>"+

      "<div class='relatorioGrafico' onclick=\"AdicionarRelatorio('myChart3"+G3+"')\">"+
        "Enviar Gráfico para relatório <img src='images/relatorio.png' /> "+
      "</div>"+
    "</div></div>");

    var ctx = document.getElementById("myChart"+window.numeroGrafico).getContext("2d");
    var ctx2 = document.getElementById("myChart2"+G2).getContext("2d");
    var ctx3 = document.getElementById("myChart3"+G3).getContext("2d");

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

    var val1 = [];
    var val2 = [];
    var val3 = [];
    var nome1 = [];
    var nome2 = [];
    var nome3 = [];

    for(var i = 0;i<valores.length;i++){
      if(i<2){
        val1.push(valores[i]);
        nome1.push(nomes[i]);
      }else if(i<6){
        val2.push(valores[i]);
        nome2.push(nomes[i]);
      }else{
        val3.push(valores[i]);
        nome3.push(nomes[i]);
      }
    }

    data1 = {
      datasets: [{
          data: val1,
          backgroundColor: colors
      }],
      labels:nome1
    };
    data2 = {
      datasets: [{
          data: val2,
          backgroundColor: colors
      }],
      labels:nome2
    };
    data3 = {
      datasets: [{
          data: val3,
          backgroundColor: colors
      }],
      labels:nome3
    };

    var myPieChart = new Chart(ctx,{
      type: 'pie',
      data: data1,
      options: options
    });

    var myPieChart2 = new Chart(ctx2,{
      type: 'pie',
      data: data2,
      options: options
    });

    var myPieChart3 = new Chart(ctx3,{
      type: 'pie',
      data: data3,
      options: options
    });


    $(".dragable").draggable();
    $(".dragable").resizable();
    window.numeroGrafico+=3;
  }else{
/*
//Colocar uma seleção de Ano para Patentes
    if(informacao.indexOf('Patentes')!=-1){
      $("body").append("<div class='dragable'>"+
        "<div class='chartsHearder'></div>"+
        "<img src='images/fechar.png' class='close' onClick='Close(this)'/>"+
        "<img src='images/minimizar.png' class='minimize' onClick='Minimize(this)'/>"+
        "<div class='chatsTittles' id='chartTittle"+window.numeroGrafico+"'>"+informacao+"</div>"+

//Inserção do Código html para criação do menu dropdown
        "<select>"+
        "</select>"+

        "<div class='conteudo'>"+
        "<canvas class='charts' id='myChart"+window.numeroGrafico+"'></canvas>"+

        "<div class='relatorioGrafico' onclick=\"AdicionarRelatorio('myChart"+window.numeroGrafico+"')\">"+
          "Enviar Gráfico para relatório <img src='images/relatorio.png' /> "+
        "</div>"+
      "</div></div>");
      for(var i = 0; i<5;i++){
        $("#chartTittle"+window.numeroGrafico+" select").append("<option value='Godzilla'>Godzilla</option>");
        console.log("GODZILLA");
      }

    }else{ */ 
      $("body").append("<div class='dragable'>"+
        "<div class='chartsHearder'></div>"+
        "<img src='images/fechar.png' class='close' onClick='Close(this)'/>"+
        "<img src='images/minimizar.png' class='minimize' onClick='Minimize(this)'/>"+
        "<div class='chatsTittles' id='chartTittle"+window.numeroGrafico+"'>"+informacao+"</div>"+
        "<div class='conteudo'>"+
        "<canvas class='charts' id='myChart"+window.numeroGrafico+"'></canvas>"+

        "<div class='relatorioGrafico' onclick=\"AdicionarRelatorio('myChart"+window.numeroGrafico+"')\">"+
          "Enviar Gráfico para relatório <img src='images/relatorio.png' /> "+
        "</div>"+
      "</div></div>");
    
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
        valores.push((Number(aux[1]) * 100).toFixed(0));

      }
      CriarGraficoPizza(nomes,valores, informacao);
      $('#loading').css('display','none');
    }
  }
  $('#loading').css('display','block');
  xmlhttp.open("GET", "php/"+arquivo+"?tipoDivisao="+window.tipoDivisao+"&cod="+cod+"&ano="+window.anoSelecionado, true);
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