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
<?php
include'database/dbcon.php';
if(isset($_GET['resid'])){
  $resid = $_GET['resid'];
  $selectquery = "select * from signuphotel where resid='$resid' and status ='Active' ";
  $query = mysqli_query($con,$selectquery);
  while($result =mysqli_fetch_array($query)){
    
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
          h6{
      text-align: Center;
      color:black;
          }
    .divider-text{
      position: relative;
      text-align: center;
      margin-top: 15px;
      margin-bottom: 15px;
      padding : 5px;
      
    }
    .divider-text span{
      padding: 7px;
      font-size: 12px;
      position: relative;
      z-index: 2;
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
     
    }
    .container1 {
      padding: 5px;
      margin :10px;
    }
    .bg-grey {
      background-color: #f6f6f6;
    }
</style>
    <?php include 'link/link.php'?>
    <body>
<div class="container1">
<header>
<div class="row">
<div class="col-sm-1" style="padding:5px;"><br>
</div>
<div class="col-sm-1" style="padding:5px;"><br>
<a href="uhome.php" class="btn btn-outline-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a><br><br>
<?php
  $t=$result['hstatus'];
  if($t=="Closed"){
    ?>
      <p class="card-title" style="background-color:grey;padding:2px;color:black;"><?php echo $t;?>.</p> 
    <?php
  }
  ?>

</div>
<div class="col-sm-8" style="padding:5px;">
<a href="uprofile.php?resid=<?php echo $result['resid'];?>" style=" text-decoration:none;"><h3><?php echo $result['hotel'];?>.</h3></a>
<p><?php echo $result['description'];?>
    <br>Contact No : <?php echo $result['mobile'];?>.
</p>
</div>
<div class="col-sm-2" style="padding:5px;">
<?php
  $t=$result['hstatus'];
  if($t=="Closed"){?>
    <a href ="uhotel.php?resid=<?php echo $result['resid'];?>"><img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['hotel'];?>" style="filter: grayscale(100%);width:200;height:120;display:flex;" ></a>
  <?php } else { ?>
<a href="uprofile.php?resid=<?php echo $result['resid'];?>"><img src="<?php echo $result['image'];?>" alt="" width="200" height="120" style="padding:5px;"></a>
  <?php
  }?>
  </div>
</div>

</header>
<p class = "divider-text"></p>
<div class="container-fluid bg-grey">
<div class="row" style="padding:5px;">
<?php
include 'database/dbcon.php';
if(isset($_GET['resid'])){
    $resid = $_GET['resid'];
  $selectquery = "select * from menu where resid='$resid' and menustatus	='Available'";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
?>
    <div class="col-sm-2" style="padding:5px;">
    <div class="card" style="width: 14.9rem;height:17rem;padding:8px;">
    <img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['foodname'];?>" style="width:100%;height:150;display:flex;">
    <div class="row">
    <div class="col-sm-7">
    <h7><?php echo $result['foodname'];?>.</h7>
  </div>
  <div class="col-sm-5">
  <p class="price">Rs. <?php echo $result['price'];?></p>
  </div>
  </div>

  <form action ="ucheckout1.php?foodid=<?php echo $result['foodid'];?>&&resid=<?php echo $resid;?>" method ="POST">
  <div class="row">
  <div class="col-sm-1" style="padding:8px;">
        <button class="btn btn-outline-danger" type="submit" name="submit1"><i class="fa fa-minus" aria-hidden="true"></i></button>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-sm-6" style="padding:5px;">
        <input class="form-control me-2"  type="number" id="quantity" name="quantity" min="0" max="50" value="0" aria-label="Search" required>
        </div>
        <div class="col-sm-1" style="padding:8px;">
        <button class="btn btn-outline-danger" type="submit" name="submit2"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        </div>
      </form>

</div>
</div>
<?php
}}
?>
  </div> 

  <div class="row">
  <div class="col-sm-10" style="padding:10px;">
</div>
  <div class="col-sm-2" style="padding:10px;">
  <a href="ucheckout.php?resid=<?php echo $resid;?>"><button class="btn btn-outline-success" type="submit" style="float:right;padding:10px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</button></a>
</div>
</div>

  <?php
  }}
?>


</div>
</div>

    </body>
</html>
