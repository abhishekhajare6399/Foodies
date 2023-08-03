<?php
session_start();
if(!isset($_SESSION['loginid'])){
    echo "You are logged out";
    header('location:ulogin.php');
  }
?>
<?php
$loginid=$_SESSION['loginid'];
$city =$_SESSION['city'];
$image =$_SESSION['image'];


?>
<html>
    <head>
        <title>FOODIES</title>
        <link rel="icon" href="foodies.jpg" />
    </head>
    <style>
        * {
      margin: 0; padding: 0;
  }
  html, body, #container {
      height: 100%;
  }
  header {
      height: 15%;

  }
  .p1{
    text-align: right;
    font-size :20px;
    color:black;
        }
        .p2{
    text-align: left;
    font-size :20px;
    color:black;
        }
  p{
    text-align: Center;
    font-size :15px;
    color:black;
        }
  h3{
    text-align: Center;
    font-size :0px;
    color:black;
  }
      
  .divider-text1{
    position: relative;
    text-align: center;
    margin-top: 5px;
    margin-bottom: 5px;
    padding : 5px;
    
  }
  .divider-text1::after{
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 2px solid rgb(11, 10, 10);
    top: 55%;
    left: 0;
    z-index: 1;
  }
  .divider-text{
    position: relative;
    text-align: center;
    margin-top: 5px;
    margin-bottom: 15px;
    padding : 5px;
    
  }
  .divider-text::after{
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 5px solid rgb(11, 10, 10);
    top: 55%;
    left: 0;
    z-index: 1;
  }
  .container-fluid {
    padding: 10px 10px;
    margin :10px;
  }
  .content {
      max-width: 90%;
      margin: auto;
      background: white;
      padding: 10px;
    }
  .bg-grey {
    background-color: #f6f6f6;
  }
</style>
    <?php include 'link/link.php'?>
    <body>
    <div id="container">
<header>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">&nbsp;
  <a class="navbar-brand" href="#">&nbsp;
    <img src="foodies.jpg" alt="" width="50" height="50">&nbsp;  FOODIES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>&nbsp;&nbsp;
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="uhome.php">Home</a>
        </li>&nbsp;&nbsp;
        <li class="nav-item">
        <a class="nav-link" href="ucata.php">Categories</a>
      </li>&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link  active" aria-current="page" href="#">History</a>
      </li>&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $city?></button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <?php 
                     include('database/dbcon.php');
                     $query= "select * from signuphotel group by city ORDER BY city ASC LIMIT 5";
                     $result= mysqli_query($con,$query);
                     while ($row= mysqli_fetch_array($result)) { ?>
                         <a href="uhome1.php?city=<?php echo $row['city']; ?>" class="dropdown-item" href="#"><?php echo $row['city']; ?></a>
                  <?php } ?>
    <a class="dropdown-item">
    <form class="d-flex">
        <input class="form-control me-2" type="search" name="search" placeholder="Enter Hotel Name.." aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="submit"><i class ="fa fa-search"></i></button>
      </form>
    </a>
  </div>
 </div>

      </ul>
      <form class="d-flex" action ="uhistroy2.php" method ="POST">
        <input class="form-control me-2" type="search" name="search" placeholder="Search Hotel Name.." aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="search"><i class ="fa fa-search"></i></button>
      </form>&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="ulogout.php"><button class="btn btn-outline-danger" type="submit"><i class ="fa fa-sign-out"></i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;
      <a href ="ucustomerprofile.php"><img src="<?php echo $image ?>" alt="" style="width:50px;height:50; border-radius: 50%;"></a>
    </div>
  </div>
</nav>
</header>
<p class = "divider-text"></p>

<main>
  <?php
{
  include'database/dbcon.php';
  date_default_timezone_set("Asia/Calcutta");
  $time= date("h:i:sa");
  $loginid = $_SESSION['loginid'];
  $selectquery = "SELECT * FROM histroy inner join menu on (histroy.foodid=menu.foodid and histroy.resid=menu.resid) where histroy.loginid='$loginid' group by orderid order by histroy.date DESC";
  $query1 = mysqli_query($con,$selectquery);
  while($result1 =mysqli_fetch_array($query1)){
  $resid=$result1['resid']; 
  $orderid=$result1['orderid']; 
  $status=$result1['status']; 
  $tim=$result1['time'];
  $dat=$result1['date'];  
  $selectquery = "select * from signuphotel where resid='$resid' ";
  $query = mysqli_query($con,$selectquery);
  $result =mysqli_fetch_array($query);
  $hotel=$result['hotel'];
  $image=$result['image'];
  $mobile=$result['mobile']; 
  $city=$result['city'];
 
?>
  <div class="content bg-grey">
  <div class="row">
  <?php
   $st=$result1['status'];
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

   $selectquery1 = "SELECT * FROM  signuphotel where resid='$resid'  ";
$query= mysqli_query($con,$selectquery1);
$userdata = mysqli_fetch_assoc($query);
$hstatus = $userdata['hstatus'];
   ?>
    <div class="row">
   <div class="col-sm-3" style="padding:px;">
   <p style="background-color:<?php echo $color;?>;padding:px;color:<?php echo $text;?>;">Order <?php echo $st;?>.</p>
   <?php
if($hstatus=="Closed"){
  ?>
   <p class="card-title" style="background-color:grey;padding:2px;color:black;"><?php echo $hstatus;?>.</p>
   <?php }
   ?>
  </div>
  </div>

   <div class="col-sm-9" style="padding:px;">
   
   <a href="uprofile.php?resid=<?php echo $resid;?>" style="text-decoration:none;"><h3> <?php echo $hotel?>.</h3>
   <p>Contact No. : <?php echo $mobile?>.<br>
   Date : <?php echo $dat?>.&nbsp;&nbsp;&nbsp;   Time : <?php echo $tim?>.&nbsp;&nbsp;&nbsp;&nbsp;  City : <?php echo $city?>.</p></a>

<p class = "divider-text1"></p>
<div class="row">
    <div class="col-sm-3" style="padding:px;">
   <p>Menu.</p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Price.</p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Quantity.</p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Total.</p>
  </div>
</div>

<?php
 $selectquery2 = "SELECT * FROM histroy inner join menu on (histroy.foodid=menu.foodid and histroy.resid=menu.resid) where histroy.resid='$resid' and orderid='$orderid'";
 $query2 = mysqli_query($con,$selectquery2);
 while($result2 =mysqli_fetch_array($query2)){
?>
<div class="row">
    <div class="col-sm-3" style="padding:px;">
   <p><?php echo $result2['foodname'];?></p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Rs. <?php echo $result2['price'];?></p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p><?php echo $result2['quantity'];?></p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Rs. <?php echo $result2['total'];?></p>
  </div>
</div>
<?php
}
$sum = "SELECT SUM(total) as total,discount FROM histroy where orderid='$orderid' and loginid='$loginid' and resid='$resid'";
$sum1 = mysqli_query($con,$sum);
$resul =mysqli_fetch_array($sum1);
$total=$resul['total'];
$dis=$resul['discount'];
$t=$total-$dis;
$d=$dis*100/$total;
?>
  <p class = "divider-text1"></p>
  <div class="row">
    <div class="col-sm-10" style="padding:px;"><br><br>
    <h5 style="padding:10px;">Total with <?php echo $d?>% Discount :</h5>
  </div>
  <div class="col-sm-2" style="padding:5px;">
  <h7 style="padding:10px;">Rs.<?php echo $total?>.</h7> <br>
  <h7 style="padding:10px;">Rs.<?php echo $dis?> Discount.</h7>  
  <h5 style="padding:10px;">Rs.<?php echo $t?>.</h5>  
</div>
  </div>

  </div>
  <div class="col-sm-3" style="padding:5px;">
  <?php
  if($hstatus=="Closed"){?>
  <a href="uprofile.php?resid=<?php echo $resid?>"><img src="<?php echo $image?>" class="card-img-top" alt="<?php echo $image?>" style="filter: grayscale(100%); padding:10px;" width="230" height="200"></a>
  <?php } else { ?>
  <a href="uprofile.php?resid=<?php echo $resid?>"><img src="<?php echo $image?>" class="card-img-top" alt="<?php echo $image?>" style="padding:10px;"width="230" height="200"></a>
  <?php
  }?>

  <div class="row">
  <?php
if($hstatus=="Open"){
if($status=="Delivered" || $status=="Cancel" || $status=="Accepted" || $status=="Completed")
{
?>
    <div class="col-sm-5" style="padding:10px;">
    <a href="uhistroy1.php?repeat=<?php echo $orderid;?>&&resid=<?php echo $resid;?>"><button class="btn btn-outline-Success"  style="float: left;padding:5px;"><i class="fa fa-repeat" aria-hidden="true"></i> Repeat Order</button></a>  
  </div>
  <?php
}}
  if($status=="Delivered" || $status=="Completed"){
?>
  <div class="col-sm-4" style="padding:10px;">
  <a href="ubill.php?print=<?php echo $orderid?>&&resid=<?php echo $resid?>"><button class="btn btn-outline-warning"  style="float: center;padding:5px;"><i class="fa fa-print" aria-hidden="true"></i> Print Bill</button></a>  
  </div>
  <?php
}
?>
  </div>
  <?php
if($status=="Pending" || $status=="Accepted" )
{
  ?>
  <div class="row">
  <div class="col-sm-6" style="padding:10px;">
  <a href="uhistroy1.php?cancel=<?php echo $orderid?>&&resid=<?php echo $resid?>"><button class="btn btn-outline-danger"  style="float: center;padding:5px;"><i class="fa fa-times" aria-hidden="true"></i> Cancel Order</button></a>  
  </div>
  </div>
  <?php
}
  ?>

  </div>
 </div>
 <p class = "divider-text"></p>
 </div><br>

 <?php
}}
?>
</main>
</div>

    </body>
</html>

