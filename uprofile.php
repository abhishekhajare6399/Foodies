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
      padding: 10px 10px;
      margin :10px;
    }
    .content {
        max-width: 70%;
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
        <a class="nav-link" href="uhistroy.php">History</a>
      </li>&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $city?></button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Pune</a>
    <a class="dropdown-item" href="#">Mumbai</a>
    <a class="dropdown-item" href="#">Baglore</a>
    <a class="dropdown-item" href="#">Dehil</a>
    <a class="dropdown-item" href="#">Chennai</a>
    <a class="dropdown-item">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="City" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class ="fa fa-search"></i></button>
      </form>
    </a>
  </div>
</div>

      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search Hotel Name.." aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class ="fa fa-search"></i></button>
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
include'database/dbcon.php';
if(isset($_GET['resid'])){
  $resid = $_GET['resid'];
  $selectquery = "select * from signuphotel where resid='$resid' and status ='Active' ";
  $query = mysqli_query($con,$selectquery);
  $result =mysqli_fetch_array($query);{
  ?>
  <div class="content bg-grey">
  <div class="row">
  <div class="col-sm-2" style="padding:10px;">
  <a href="uhotel.php?resid=<?php echo $result['resid'];?>"><button class="btn btn-outline-primary" type="submit"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
</div>
    <div class="col-sm-10" style="padding:15px;">
    <h4><?php echo $result['hotel'];?>.</h4>
    </div>
    
 </div>
 <div class="row">

    <div class="col-sm-8" style="padding:25px;">
    <h5>Email : <p2><?php echo $result['email'];?>.</p2></h5>
    <h5>Mobile : <p2><?php echo $result['mobile'];?>.</p2></h5>
    <h5>Address : <p2><?php echo $result['address'];?> <?php echo $result['pincode'];?>.</p2></h5>
    <h5>City : <p2><?php echo $result['city'];?>.</p2></h5>
    <h5>State : <p2><?php echo $result['state'];?>.</p2></h5>
    <h5>Description :</h5><p2><?php echo $result['description'];?>.</p2>
    </div>
    <div class="col-sm-3" style="padding:5px;">
    <img src="<?php echo $result['image'];?>" alt="<?php echo $result['hotel'];?>" width="250" height="250">  
</div>
<?php
}}
?>
 </div>
 </div>
</main>
</div>

    </body>
</html>