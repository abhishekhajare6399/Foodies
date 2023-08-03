<?php
session_start();
if(!isset($_SESSION['resid'])){
    echo "You are logged out";
    header('location:alogin.php');
  }
?>
<?php

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
        .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: flex;
  font-size: 12px;
  margin: auto;
  transition-duration: 0.4s;
  cursor: pointer;
  
}

.button1 {
  background-color: white;
  color: black; 
  border: 2px solid black;
}

.button1:hover {
  background-color: #FADA0A;
  color: black;
}
.button3{
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button3:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}
.button4 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button4:hover {
  background-color: #f44336;
  color: white;
}
.button5 {
  background-color: white; 
  color: black; 
  border: 2px solid green;
}

.button5:hover {
  background-color: green;
  color: white;
}
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
      <li><a href="ahome.php">Home</a></li><br>
        <li><a href="aorder.php">Order</a></li><br>
        <li class="active"><a href="amenu.php">Menu</a></li><br>
        <li><a href="ahoteltime.php">Hotel</a></li><br>
        <li><a href="ahistory.php">History</a></li><br>
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
          <div class="row">
        <div class="col-sm-10">
          <h5>Menu :</h5>
  </div>
  <div class="col-sm-2">
  <a href="amenu1.php?add=<?php echo $resid;?>"  style="text-decoration: none;"><button type="submit" name="submit" class="btn btn-info">Add Menu</button></a>
          </div> </div>

          <div class="row slideanim">
  <?php
include'database/dbcon.php';
date_default_timezone_set("Asia/Calcutta");
$date =date('Y-m-d');
$resid=$_SESSION['resid'];
$query = "SELECT * FROM menu where resid='$resid' ";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){
  $id= $row['foodid'];
  ?>
    <div class="col-sm-3">
        <div class="thumbnail">
        <p><strong><?php echo $row['foodname'];?>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['price'];?> Rs.</strong></p>
<div class="row">
    <div class="col-sm-3">
    <a data-id='<?php echo $id ?>' class="userinfo" style="text-decoration: none;"><button class="btn btn-primary">Veiw</button></a>
    </div>
    <div class="col-sm-3">
    <a href="amenu1.php?id=<?php echo $id ?>"  style="text-decoration: none;"><button class="btn btn-warning">Edit</button></a>
    </div>
    <div class="col-sm-4">
       <?php
        $selectquery1 = "SELECT * FROM  menu where foodid='$id'";
        $query= mysqli_query($con,$selectquery1);
        $userdata = mysqli_fetch_assoc($query);
        $status = $userdata['menustatus'];
 if($status!="Unavailable"){
       ?>
       <a href="amenu1.php?Un=<?php echo $id ?>"  style="text-decoration: none;"><button type="submit" name="submit" class="btn btn-success">Available</button></a>
       <?php } else{ ?>
        <a href="amenu1.php?Av=<?php echo $id ?>"  style="text-decoration: none;"><button type="submit" name="subm" class="btn btn-danger">Unavailable</button></a>
 <?php }?>
    </div>
    </div>
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
                        url: 'amenupop.php',
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
                            <h4 class="modal-title">Menu Information :</h4>
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

