<?php
$resid=$_SESSION['resid'];
$city =$_SESSION['city'];
$image =$_SESSION['image'];
?>
<div class="well">
          <?php include'database/dbcon.php'?>
          
          <?php 
          date_default_timezone_set("Asia/Calcutta");
          $date =date('Y-m-d');
                        $sql = "SELECT * FROM order1 where resid='$resid' and status='Delivered' or status='Completed' group by orderid ";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                        $sql1 = "SELECT * FROM order1 where resid='$resid' and status='Pending' group by orderid ";
                        $res1 = mysqli_query($con, $sql1);
                        $count1 = mysqli_num_rows($res1);
                        $sql2 = "SELECT * FROM order1 where resid='$resid' and status='Cancel' group by orderid";
                        $res2 = mysqli_query($con, $sql2);
                        $count2 = mysqli_num_rows($res2);
                        $sql3 = "SELECT * FROM order1 where resid='$resid' and status='Accepted' group by orderid ";
                        $res3 = mysqli_query($con, $sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>
          <div id="piechart" style="width:100px;"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Pending', <?php echo $count1?>],
  ['Cancel', <?php echo $count2?>],
  ['Accepted', <?php echo $count3?>],
  ['Delivered', <?php echo $count?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Average Of Order', 'width':450, 'height':296};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

          </div>
        </div>