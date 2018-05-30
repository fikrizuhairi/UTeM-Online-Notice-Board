<?php
$conn=mysqli_connect("localhost","root","","bengkel");
$query = "SELECT gender,count(*) as number FROM user GROUP BY gender";
$result = mysqli_query($conn,$query);
?>


<html>
  <head>
  </button>
          <a class="navbar-brand" href="index.php">Welcome Admin </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Number'],
          <?php
          while($row = mysqli_fetch_array($result))
          {

            echo "['".$row["gender"]."',".$row["number"]."],";
          }




        ?>
        ]);

        var options = {
          title: 'Total Male and Female' ,
          pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>