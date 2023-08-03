<?php
  include'database/dbcon.php';
  if(isset($_POST['submit']))
  {
  date_default_timezone_set("Asia/Calcutta");
  $search = mysqli_real_escape_string($con, $_POST['search']);
  ?>
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
    .bg-grey {
      background-color: #f6f6f6;
    }
  </style>
      <?php include 'link/link.php'?>
      <?php include'database/dbcon.php';?>

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
            <a class="nav-link active" aria-current="page" href="uhome.php">Home</a>
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
    <?php 
                     include('database/dbcon.php');
                     $query= "select * from signuphotel group by city ORDER BY city ASC LIMIT 5";
                     $result= mysqli_query($con,$query);
                     while ($row= mysqli_fetch_array($result)) { ?>
                         <a href="uhome1.php?city=<?php echo $row['city']; ?>" class="dropdown-item" href="#"><?php echo $row['city']; ?></a>
                  <?php } ?>
      <a class="dropdown-item">
      <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="City" aria-label="Search">
          <button class="btn btn-outline-success" type="submit"><i class ="fa fa-search"></i></button>
        </form>
      </a>
    </div>
  </div>

        </ul>
        <form class="d-flex" action ="" method ="POST">
          <input class="form-control me-2" type="search" name="search" placeholder="<?php echo $search?>."  value="<?php echo $search?>." aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name="submit"><i class ="fa fa-search"></i></button>
        </form>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="ulogout.php"><button class="btn btn-outline-danger" type="submit"><i class ="fa fa-sign-out"></i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href ="ucustomerprofile.php"><img src="<?php echo $image ?>" alt="" style="width:50px;height:50; border-radius: 50%;"></a>
      </div>
    </div>
  </nav>
  </header>

  <p class = "divider-text"></p>
  <p class="bg-success text-white px-1"><?php
  date_default_timezone_set("Asia/Calcutta");
  $time= date("H");
  if($time>21 || $time<10){
    ?>All Hotel Remain Closed From 11:00 pm to 10:00 am Please Do not place any Order in Between.<?php
  }
  ?>
</p>
  <main>
    <div class="container-fluid bg-grey">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"  aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"  aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image\fd1.png" class="d-block w-100 h-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="image\fd2.png" class="d-block w-100 h-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="image\fd.png" class="d-block w-100 h-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  <p class = "divider-text"></p>

  <div class="row" style="padding:10px;">

  <?php
    
    $emailquery =" select * from signuphotel where hotel ='$search' ";
    $query = mysqli_query($con, $emailquery);
  while($result =mysqli_fetch_array($query)){
      ?>
      <div class="col-sm-3" style="padding:10px;">
      <div class="card" style="width: 23rem;height:19rem; padding:5px;">
      <?php
    $t=$result['hstatus'];
    if($t=="Closed"){?>
      <a href ="uhotel.php?resid=<?php echo $result['resid'];?>"><img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['hotel'];?>" style="filter: grayscale(100%);width: 358;height:200;padding:2px;display:flex;"></a>
    <?php } else { ?>
    <a href ="uhotel.php?resid=<?php echo $result['resid'];?>"><img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['hotel'];?>" style="width: 358;height:200;padding:2px;display:flex;"></a>
    <?php
    }?>
    <div class="card-body">
    <div class="row">
      <div class="col-sm-9">
      <h7 class="card-title"><?php echo $result['hotel'];?>.</h7>
      <p><?php echo $result['Categories'];?>.</p>
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





  <?php
  }
?>

<?php
  include'database/dbcon.php';
  if(isset($_GET['city'])){
  date_default_timezone_set("Asia/Calcutta");
  $search = $_GET['city'];

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
          <link rel="icon" href="foodies.jpg"" />
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
    .bg-grey {
      background-color: #f6f6f6;
    }
  </style>
      <?php include 'link/link.php'?>
      <?php include'database/dbcon.php';?>

      <body>
      <div id="container">
  <header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">&nbsp;
    <a class="navbar-brand" href="#">&nbsp;
      <img src="foodies.jpg"" alt="" width="50" height="50">&nbsp;  FOODIES</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>&nbsp;&nbsp;
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="uhome.php">Home</a>
          </li>&nbsp;&nbsp;
          <li class="nav-item">
          <a class="nav-link" href="ucata.php">Categories</a>
        </li>&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item">
          <a class="nav-link" href="uhistroy.php">History</a>
        </li>&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $search?></button>
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
        <form class="d-flex" action ="" method ="POST">
          <input class="form-control me-2" type="search" name="search"  placeholder="Search Hotel Name.."  aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name="submit"><i class ="fa fa-search"></i></button>
        </form>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="ulogout.php"><button class="btn btn-outline-danger" type="submit"><i class ="fa fa-sign-out"></i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href ="ucustomerprofile.php"><img src="<?php echo $image ?>" alt="" style="width:50px;height:50; border-radius: 50%;"></a>
      </div>
    </div>
  </nav>
  </header>

  <p class = "divider-text"></p>

  <main>
    <div class="container-fluid bg-grey">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"  aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"  aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image\fd1.png" class="d-block w-100 h-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="image\fd2.png" class="d-block w-100 h-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="image\fd.png" class="d-block w-100 h-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  <p class = "divider-text"></p>

  <div class="row" style="padding:10px;">

  <?php
    
    $emailquery =" select * from signuphotel where city ='$search' ";
    $query = mysqli_query($con, $emailquery);
  while($result =mysqli_fetch_array($query)){
      ?>
      <div class="col-sm-3" style="padding:10px;">
      <div class="card" style="width: 23rem;height:19rem;  padding:5px;">
      <?php
    $t=$result['hstatus'];
    if($t=="Closed"){?>
      <a href ="uhotel.php?resid=<?php echo $result['resid'];?>"><img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['hotel'];?>" style="filter: grayscale(100%);width: 358;height:200;padding:2px;display:flex;"></a>
    <?php } else { ?>
    <a href ="uhotel.php?resid=<?php echo $result['resid'];?>"><img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['hotel'];?>" style="width: 358;height:200;padding:2px;display:flex;"></a>
    <?php
    }?>
    <div class="card-body">
    <div class="row">
      <div class="col-sm-9">
      <h7 class="card-title"><?php echo $result['hotel'];?>.</h7>
      <p><?php echo $result['Categories'];?>.</p>
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





  <?php
  }
?>

<?php
  include'database/dbcon.php';
  if(isset($_POST['sub']))
  {
  date_default_timezone_set("Asia/Calcutta");
  $search = mysqli_real_escape_string($con, $_POST['city']);
  session_start();
  if(!isset($_SESSION['loginid'])){
      echo "You are logged out";
      header('location:ulogin.php');
    }
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
    .bg-grey {
      background-color: #f6f6f6;
    }
  </style>
      <?php include 'link/link.php'?>
      <?php include'database/dbcon.php';?>

      <body>
      <div id="container">
  <header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">&nbsp;
    <a class="navbar-brand" href="#">&nbsp;
      <img src="foodies.jpg"" alt="" width="50" height="50">&nbsp;  FOODIES</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>&nbsp;&nbsp;
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="uhome.php">Home</a>
          </li>&nbsp;&nbsp;
          <li class="nav-item">
          <a class="nav-link" href="ucata.php">Categories</a>
        </li>&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item">
          <a class="nav-link" href="uhistroy.php">History</a>
        </li>&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $search?></button>
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
      <input class="form-control me-2" type="search" name="city" placeholder="City" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="sub"><i class ="fa fa-search"></i></button>
      </form>
      </a>
    </div>
  </div>

        </ul>
        <form class="d-flex" action ="" method ="POST">
          <input class="form-control me-2" type="search" name="search" placeholder="Search Hotel Name.."  aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name="submit"><i class ="fa fa-search"></i></button>
        </form>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="ulogout.php"><button class="btn btn-outline-danger" type="submit"><i class ="fa fa-sign-out"></i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href ="ucustomerprofile.php"><img src="<?php echo $image ?>" alt="" style="width:50px;height:50; border-radius: 50%;"></a>
      </div>
    </div>
  </nav>
  </header>

  <p class = "divider-text"></p>

  <main>
    <div class="container-fluid bg-grey">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"  aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"  aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image\fd1.png" class="d-block w-100 h-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="image\fd2.png" class="d-block w-100 h-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="image\fd.png" class="d-block w-100 h-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  <p class = "divider-text"></p>

  <div class="row" style="padding:10px;">

  <?php
    
    $emailquery =" select * from signuphotel where city ='$search' ";
    $query = mysqli_query($con, $emailquery);
  while($result =mysqli_fetch_array($query)){
      ?>
      <div class="col-sm-3" style="padding:10px;">
      <div class="card" style="width: 23rem;height:19rem; padding:5px;">
      <?php
    $t=$result['hstatus'];
    if($t=="Closed"){?>
      <a href ="uhotel.php?resid=<?php echo $result['resid'];?>"><img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['hotel'];?>" style="filter: grayscale(100%);width: 358;height:200;padding:2px;display:flex;"></a>
    <?php } else { ?>
    <a href ="uhotel.php?resid=<?php echo $result['resid'];?>"><img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['hotel'];?>" style="width: 358;height:200;padding:2px;display:flex;"></a>
    <?php
    }?>
    <div class="card-body">
    <div class="row">
      <div class="col-sm-9">
      <h7 class="card-title"><?php echo $result['hotel'];?>.</h7>
      <p><?php echo $result['Categories'];?>.</p>
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





  <?php
  }
?>
