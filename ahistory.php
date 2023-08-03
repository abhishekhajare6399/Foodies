<?php
session_start();
if(!isset($_SESSION['resid'])){
    echo "You are logged out";
    header('location:alogin.php');
  }
?>
<?php
$resid=$_SESSION['resid'];
$city =$_SESSION['city'];
$image =$_SESSION['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Foodies Partner</title>
  <link rel="icon" href="foodiesp.jpg" />
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: whitesmoke;
      height: 735px;
    }
    h4 {text-align: center;
        font-size: 20px;}
        h5 {
        font-size: 20px;}

    p{text-align: center;
        font-size: 15px;}
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
  <?php include'database/dbcon.php' ?>
</head>
<body style=" padding:5px;">


<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs"><br><br>
    <form action ="search.php" method ="POST">
      <div class="input-group">
        <input type="text" name ="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn btn-default" button type ="submit" name ="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
</form><br>
      <ul class="nav nav-pills nav-stacked">
      <li ><a href="ahome.php">Home</a></li><br>
        <li  ><a href="aorder.php">Order</a></li><br>
        <li><a href="amenu.php">Menu</a></li><br>
        <li><a href="ahoteltime.php">Hotel</a></li><br>
        <li  class="active"><a href="ahistory.php">History</a></li><br>
        <li><a href="asellreport.php">Sell Report</a></li><br>
        <li><a href="alogout.php">Logout</a></li><br><br>
      </ul><br>
      
    </div>
    <br>
    
    <div class="col-sm-10">
    <?php include'anav.php'?>

      <div class="row">
        <div class="col-sm-12">
          <div class="well">
          <h5>History :</h5>

          <div class="row slideanim">
  <?php
include'database/dbcon.php';
date_default_timezone_set("Asia/Calcutta");

$date =date('Y-m-d');
$updatequery = "UPDATE order1 set status='Cancel' where resid='$resid' and date<'$date' and status='Pending'  ";
$query1 = mysqli_query($con, $updatequery);
$updatequery1 = "UPDATE histroy set status='Cancel' where resid='$resid' and date<'$date' and status='Pending'   ";
$query2 = mysqli_query($con, $updatequery1);
$query = "select signup.name,order1.orderid, order1.date,order1.status from order1 inner join signup on order1.loginid=signup.loginid where ((order1.status<>'Pending' and order1.date<'$date') or (order1.status='Delivered' or order1.status='Cancel' and order1.date='$date')) and resid='$resid' group by orderid order by date DESC";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){
  $t=$row['orderid'];
$sum = "SELECT SUM(total) as total FROM order1 where orderid='$t'";
$sum1 = mysqli_query($con,$sum);
$resul =mysqli_fetch_array($sum1);
$tot=$resul['total'];
$total=$resul['total']-$dis;
$st=$row['status'];
   if($st=="Pending"){
    $color='yellow';
    $text='black';
   }
   if($st=="Accepted"){
    $color='orange';
    $text='black';
   }
   if($st=="Cancel"){
    $color='red';
    $text='white';
   }
   if($st=="Delivered"){
    $color='lightgreen';
    $text='black';
   }
   if($st=="Completed"){
    $color='lightgreen';
    $text='black';
   }
  ?>
    <div class="col-sm-3">
        <div class="thumbnail">
        <p><strong>From : <?php echo $row['name'];?>.</strong></p>
        <p>Order Date : <?php echo $row['date'];?>.</p>  <p style="background-color:<?php echo $color;?>;padding:px;color:<?php echo $text;?>;">Order <?php echo $st;?>.</p>
        <a data-id='<?php echo $row['orderid']; ?>' class="userinfo" style="text-decoration: none;"><p>Order Price : <?php echo $tot;?> Rs.</p></a>
      </div>
    </div>
    <?php
    }
    ?>
  
    </div>
          
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script type='text/javascript'>
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'aorderpop.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
         </div>
        <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Order Information :</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
        </div>
</body>
</html>
