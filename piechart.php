<?php
require('include.php');
@session_start();
?>

<html>

<title>資料分析</title>
  <head>
<meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
          $a="SELECT gender,count(gender) FROM users  GROUP BY gender";
          $read=mysqli_query($link,$a);
          while($res=mysqli_fetch_array($read)){
             
              echo"['$res[0]',".$res[1]."],";
      }
        ?>      
        ]);

        var options = {
          title: '會員男女比',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
  
          include('include.php');
          $out = "";
          $a="SELECT account,count(article_id) FROM articles  GROUP BY account";
          $read=mysqli_query($link,$a);
          while($res=mysqli_fetch_array($read)){
             
              echo"['$res[0]',".$res[1]."],";
      }
        ?>      
        ]);

        var options = {
          title: '發文最多次',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
      }

       function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
 
          include('include.php');
          $out = "";
           $a="SELECT account,count(comment_id) FROM comments  GROUP BY account";
          $read=mysqli_query($link,$a);
          while($res=mysqli_fetch_array($read)){
             
              echo"['$res[0]',".$res[1]."],";
      }
        ?>      
        ]);

        var options = {
          title: '留言次數最多',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body style="background:#EEEEEE;">
    <center>
	<h2>資料分析</h2>
<?php
	if(isset($_SESSION['authority'])){
		if($_SESSION['authority']=="管理者"){
?>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    <div id="piechart2" style="width: 900px; height: 500px;"></div>
    <div id="piechart3" style="width: 900px; height: 500px;"></div>
<?php
		}
	}else{
		header("refresh:0; url='index.php'");
	}
?>
    </center>
  </body>
</html>

