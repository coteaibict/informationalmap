<?php
  echo '
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
      <title>'.$_GET["informacao"].'</title>  
      <script src="js/jQuery.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script> 
    </head>
    <body>
      <canvas id="myChart" width="400" height="400"></canvas>
      <script>

        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart(ctx, {
          type: "bar",
          data: {
              labels: '.$_GET["nome"].',
              datasets: [{
                  label: '.$_GET["informacao"].',
                  data: '.$_GET["valor"].',
                  backgroundColor: "rgba(255, 99, 132, 0.2)",
                     
                  borderColor: "rgba(255,99,132,1)",
                      
                  
                  borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
      });
    </script>
    </body>
  </html>';
?>
