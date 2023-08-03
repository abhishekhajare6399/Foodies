
<?php
$resid=$_SESSION['resid'];
$city =$_SESSION['city'];
$image =$_SESSION['image'];
?>
<?php include'database/dbcon.php' ?>
<div class="row">
        <div class="col-sm-2">
          <div class="well">
            <h4>Order :</h4>
            <?php 
                        $sql = "SELECT * FROM order1 where resid='$resid' group by orderid ";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                    ?>
            <p><?php echo $count?></p> 
          </div>
        </div>
        <div class="col-sm-2">
          <div class="well">
            <h4>Today Order :</h4>
            <?php 
            date_default_timezone_set("Asia/Calcutta");
            $date =date('Y-m-d');
                        $sql = "SELECT * FROM order1 where resid='$resid' and date='$date' and status<>'Cancel' group by orderid  ";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                    ?>
            <p><?php echo $count?></p> 
          </div>
        </div>
        <div class="col-sm-2">
          <div class="well">
            <h4>Menu :</h4>
            <?php 
                        $sql = "SELECT * FROM menu where resid='$resid' ";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                    ?>
            <p><?php echo $count?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Customer  :</h4>
            <?php 
                        $sql = "SELECT * FROM order1 where resid='$resid' group by loginid";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                    ?>
            <p><?php echo $count?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Today Revenu :</h4>
            <?php 
            date_default_timezone_set("Asia/Calcutta");
            $date =date('Y-m-d');
            $sum = "SELECT SUM(total) as total,discount FROM order1 where resid='$resid' and date='$date' and status<>'Cancel' and status<>'Pending'";
            $sum1 = mysqli_query($con,$sum);
            $resul =mysqli_fetch_array($sum1);
            $tot=$resul['total'];
            $dis= $resul['discount'];
            $total=$resul['total']-$dis;
      
                    ?>
            <p><?php echo $total?> Rs.</p> 
          </div>
        </div>
      </div>