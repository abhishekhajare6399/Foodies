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
    <title>Foodies Partner</title>
  <link rel="icon" href="foodiesp.jpg" />
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
    max-width: 98%;
    margin: auto;
    background: white;
    padding: 10px;
  }
.bg-grey {
  background-color: #f6f6f6;
}
    </style>
    <?php include 'link/link.php'?>
    <?php include 'database/dbcon.php'?>
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
        <a class="nav-link   active" aria-current="page" href="#">Categories</a>
      </li>&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="uhistroy.php">History</a>
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
    <form class="d-flex" action ="uhome1.php" method ="POST">
        <input class="form-control me-2" type="search" name="city" placeholder="City" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="sub"><i class ="fa fa-search"></i></button>
      </form>
    </a>
  </div>
</div>

      </ul>
      <form class="d-flex" action ="ucata1.php" method ="POST">
        <input class="form-control me-2" type="search" name="food" placeholder="Search Food Name.." aria-label="Search">
        <button class="btn btn-outline-success" name="submit" type="submit"><i class ="fa fa-search"></i></button>
      </form>&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="ulogout.php"><button class="btn btn-outline-danger" type="submit"><i class ="fa fa-sign-out"></i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;
      <a href ="ucustomerprofile.php"><img src="<?php echo $image ?>" alt="" style="width:50px;height:50; border-radius: 50%;"></a>
    </div>
  </div>
</nav>
</header>
<p class = "divider-text"></p>

<main>
  <div class="content bg-grey">

<div class="row">
<?php
  
  $selectquery = "select * from categories ";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
    ?>
    <div class="col-sm-2" style="padding:10px;">
    <div class="card" style="width: 14rem;height:12rem;padding:2px;">
    <a href="ucata1.php?cateid=<?php echo $result['cateid'];?>"><img src="<?php echo $result['image'];?>" style="width:220;height:135;padding:2px;" class="card-img-top" alt="..."></a>
  <div class="card-body">
  <div class="row">
    <div class="col-sm-12">
    <p class="card-title"><?php echo $result['categories'];?>.</p>
  </div>
  </div>
  </div>
  </div></a>
  </div>
  <?php
  }
  ?>
  </div>

  <div class="row">

<?php
  
  $selectquery = "select * from signuphotel where city='$city' and status ='Active' ";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
    ?>
    <div class="col-sm-3" style="padding:10px;">
    <div class="card" style="width: 22rem;height:19rem;padding:2px;">
    <?php
  $t=$result['hstatus'];
  if($t=="Closed"){?>
    <a href ="uhotel.php?resid=<?php echo $result['resid'];?>"><img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['hotel'];?>" style="filter: grayscale(100%);width: 343;height:200;padding:2px;display:flex;"></a>
  <?php } else { ?>
  <a href ="uhotel.php?resid=<?php echo $result['resid'];?>"><img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['hotel'];?>" style="width: 343;height:200;padding:2px;display:flex;"></a>
  <?php
  }?>
  <div class="card-body">
  <div class="row">
    <div class="col-sm-9">
    <h7 class="card-title"><?php echo $result['hotel'];?>.</h7><br>
    <p><?php echo $result['Categories'];?></p>
  </div>
  <?php
  $t=$result['hstatus'];
  if($t=="Closed"){
    ?>
      <div class="col-sm-3">
      <p class="card-title" style="background-color:grey;padding:2px;color:black;"><?php echo $t;?>.</p>
      </div>
   
    <?php
  }
  ?>
  </div>
  </div>
  </div>
  </div>
  <?php
}
    ?>

 
     
      
  </div>

 </div>
</main>
</div>

    </body>
</html>