function CriarGrafico(numero,nome, informacao, valores, tipo, select){
  if(select != undefined){

    $("#myChart"+numero).remove();
    $("<canvas class='charts' id='myChart"+numero+"' ></canvas>").insertAfter("#chartTittle"+numero);
  }
	var ctx = document.getElementById("myChart"+numero).getContext("2d");
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
function CriarGraficoPizza(numero,nomes,valores, informacao){

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

  var ctx = document.getElementById("myChart"+numero).getContext("2d");
  var options = {
    responsive:true
  };
  var data = [];
  for(var i = 0; i< valores.length; i++){
    data.push({
      value:valores[i],
      color:'hsl(' + (i*10) + ',' + (i*10) + '%,' + (i*10) + '%)',
      highlight: 'hsl(' + (i*15) + ',' + (i*15) + '%,' + (i*15) + '%)',
      label: nomes[i]
    });
  }
  
  var PizzaChart = new Chart(ctx).Pie(data, options);

  $(".dragable").draggable();
  $(".dragable").resizable();
  window.numeroGrafico++;
}

function GraficoDespesas(cod){
  console.log(cod+" "+ window.tipoDivisao)
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      var dados = this.responseText.split(";");
      var nomes = [];
      var valores = [];
      for(var i = 0; i < dados.length -1; i++){
        var aux = dados[i].split(",");
        nomes.push(aux[0]);
        valores.push([aux[1]]);
      }
      
      CriarGraficoPizza(window.numeroGrafico,nomes,valores, 'Despesas');
    }
  }
  xmlhttp.open("GET", "php/GraficoDespesas.php?tipoDivisao="+window.tipoDivisao+"&cod="+cod, true);
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