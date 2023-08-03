<?php
session_start();
if(!isset($_SESSION['resid'])){
    echo "You are logged out";
    header('location:alogin.php');
  }
?>
<?php
include'database/dbcon.php';
$resid =$_SESSION['resid'];
$emailquery =" select * from signuphotel where resid ='$resid' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['hotel'];
$mobile = $userdata['mobile'];
$state = $userdata['state'];
$address = $userdata['address'];
$email = $userdata['email'];
$pin = $userdata['pincode'];
$image1 = $userdata['image'];

}
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
        <li class="active"><a href="ahoteltime.php">Hotel</a></li><br>
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
          <div class="well" style="height: 560px;">
          <h5>Profile :</h5>
          <div class="row">
    <div class="col-sm-10" style="padding:15px;">
    </div>
    <div class="col-sm-2" style="padding:5px;">
    <a href="ahotelt.php"><button class="btn btn-primary" type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
</div>
 </div>
 <div class="row">
    <div class="col-sm-8" style="padding:25px;">
    <h5>Login ID : <p2><?php echo $resid?></p2></h5>
    <h5>Hotel Name : <p2><?php echo $name?></p2></h5>
    <h5>Email : <p2><?php echo $email?></p2></h5>
    <h5>Landline : <p2><?php echo $mobile?></p2></h5>
    <h5>Address : <p2><?php echo $address?>  <?php echo $pin?></p2></h5>
    <h5>City : <p2><?php echo $city?></p2></h5>
    <h5>State : <p2><?php echo $state?></p2></h5>
    </div>
    <div class="col-sm-3" style="padding:5px;">
    <img src="<?php echo $image1?>" alt="<?php echo $image1 ?>" width="250" height="300">  
</div>
 </div>

      

          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

</body>
</html>
