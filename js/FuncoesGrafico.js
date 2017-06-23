function CriarGrafico(nome, informacao, valores, tipo){
	$('#myChart').remove();
	$('body').prepend('<canvas id="myChart"><canvas>');
	var ctx = document.getElementById("myChart").getContext("2d");
	ctx.canvas.width = 200;
	ctx.canvas.height = 200;
    var myChart = new Chart(ctx, {
      type: tipo.value,
      data: {
          labels: nome,
          datasets: [{
              label: informacao,
              data: valores,
              backgroundColor: "rgba(255, 99, 132, 0.2)",
                 
              borderColor: "rgba(255,99,132,1)",
                  
              
              borderWidth: 1
            }]
        },
        options: {
        	maintainAspectRatio: false,
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
  });
}