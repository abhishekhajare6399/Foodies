<?php
session_start();
if(!isset($_SESSION['loginid'])){
    echo "You are logged out";
    header('location:ulogin.php');
  }
?>
<?php
include'database/dbcon.php';
$loginid=$_SESSION['loginid'];
$city =$_SESSION['city'];
$image =$_SESSION['image'];
$emailquery =" select * from signup where loginid ='$loginid' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['name'];
$mobile = $userdata['mobile'];
$state = $userdata['state'];
$address = $userdata['address'];
$email = $userdata['email'];
$waddress = $userdata['waddress'];
$pin = $userdata['pincode'];
$image1 = $userdata['image'];
$token = $userdata['token'];


}
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
    font-size :5px;
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
      <a href ="ucustomerprofile.php"><img src="<?php echo $image1?>" alt="" style="width:50px;height:50; border-radius: 50%;"></a>
    </div>
  </div>
 </nav>
</header>
<p class = "divider-text"></p>
<main>
  <div class="content bg-grey">
  <p class="bg-success text-white px-1"><?php
  if(isset($_SESSION['msg1'])){
  echo $_SESSION['msg1'];
  }
  ?>
</p>
  <div class="row">
  <div class="col-sm-1" style="padding:15px;">
  <a href="ucustomerprofile.php"><button class="btn btn-outline-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
</div>
</div>
<form ction ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row">
<div class="col-sm-8" style="padding:15px;">
    <h4>Profile :</h4>
    </div>
    <div class="col-sm-2" style="padding:5px;">
    <button class="btn btn-outline-success" name="submit" type="submit">Save</button>
</div>
 </div>
 <div class="row">
    <div class="col-sm-8" style="padding:25px;">
<div class="row">
    <div class="form-group col-sm-12">
      <label for="inputEmail4">Name :</label>
      <input type="name" class="form-control" id="inputname4" name="name1" value="<?php echo $name?>" placeholder="<?php echo $name?>" >
    </div>
  </div>
<div class="row">
    <div class="form-group col-sm-6">
      <label for="inputEmail4">Email :</label>
      <input type="email" class="form-control" id="inputEmail4" name="email1" placeholder="<?php echo $email?>" value="<?php echo $email?>" >
    </div>
    <div class="form-group col-sm-6">
      <label for="inputPassword4">Mobile Number :</label>
      <input type="mobile" class="form-control" id="inputmobile4" name="mobile1" placeholder="<?php echo $mobile?>" value="<?php echo $mobile?>"  >
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address :</label>
    <input type="text" class="form-control" id="inputAddress" name="address1" placeholder="<?php echo $address?>" value="<?php echo $address?>" >
  </div>
  <div class="form-group">
    <label for="inputAddress2">Work Place Address :</label>
    <input type="text" class="form-control" id="inputAddress2" name="waddress1" placeholder="<?php echo $waddress?>" value="<?php echo $waddress?>">
  </div>
  <div class="row">
    <div class="col-sm-6">
      <label for="inputCity">City :</label>
      <input type="text" class="form-control" id="inputCity" name="city1" placeholder="<?php echo $city?>" value="<?php echo $city?>" >
    </div>
    <div class="col-sm-4">
      <label for="inputState">State :</label>
      <label for="Country">Select State :</label>
               <select name="state1" id="country" class="form-control" >
                  <option value="<?php echo $state?>"><?php echo $state?></option>
                  <?php 
                     include('database/dbcon1.php');
                     $query= "select * from state_list order by name ASC";
                     $result= mysqli_query($con,$query);
                     while ($row= mysqli_fetch_array($result)) { ?>
                  <option value="<?php echo $row['name']; ?>"><?php echo $row['name'] ?></option>
                  <?php } ?>
               </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip :</label>
      <input type="text" class="form-control" id="inputZip" name="zip1" placeholder="<?php echo $pin?>" value="<?php echo $pin?>" >
    </div>
  </div>
  <div class="p-2 w-full">
<p1><strong>Click Here to upload your image:</strong></p1>
<input type="file" id="myFile" name="image" required>
</div>
    </div>
    <div class="col-sm-3" style="padding:5px;">
    <img src="<?php echo $image1?>" alt="" width="300" height="350"> 
</div>
 </div>
 </form> 
 </div>
</main>
</div>
    </body>
</html>

<?php
include'database/dbcon.php';
     if(isset($_POST['submit']))
     {
      $loginid=$_SESSION['loginid'];
      $username = mysqli_real_escape_string($con, $_POST['name1']);
      $email1 = mysqli_real_escape_string($con, $_POST['email1']);
      $mobile1 = mysqli_real_escape_string($con, $_POST['mobile1']);
      $address1 = mysqli_real_escape_string($con, $_POST['address1']);
      $waddress1 = mysqli_real_escape_string($con, $_POST['waddress1']);
      $city1 = mysqli_real_escape_string($con, $_POST['city1']);
      $state1 = mysqli_real_escape_string($con, $_POST['state1']);
      $zip1 = mysqli_real_escape_string($con, $_POST['zip1']);
      $file=$_FILES['image'];

      $filename = $file['name'];
      $filepath = $file['tmp_name'];
      $fileerror = $file['error'];

      if($fileerror == 0)
      {
        $destfile = 'profile image/'.$filename;
        move_uploaded_file($filepath, $destfile);
      }
        $updatequery = "update signup set image='$destfile', name='$username',  email='$email1', mobile='$mobile1', address='$address1', waddress='$waddress1',city='$city1', state='$state1',pincode='$zip1',status='Inactive' where loginid='$loginid' ";
        $iquery = mysqli_query($con, $updatequery);

    if($iquery){
        if(isset($_SESSION['msg'])){
          $subject = "FOODIES Profile Updated Details.";
  $headers = "From: Foodiesmitaoe@gmail.com\r\n";
  $headers .= "MTME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=ISO-8859\r\n";
  $message = "<html>
  <head>
  <title>Foodies</title>
  <style>
  h1 {
      text-align: center;
      color:rgb(11, 10, 10);
      font-size: 20px;
      word-break: break-all;
    }
    h2 {
      text-align: center;
      color:rgb(11, 10, 10);
      font-size: 15px;
      word-break: break-all;
    }
    #hiderow,
  .delete {
    display: none;
  }
  /*
     CSS-Tricks Example
     by Chris Coyier
     http://css-tricks.com
  */
  
  * { margin: 0; padding: 0; }
  body { font: 14px/1.4 Georgia, serif; }
  #page-wrap { width: 800px; margin: 0 auto; }
  #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
  #header1 { height: 2px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
  #address { width: 250px; height: 100px; float: left; }
  #p1 { width: 250px; height: 100px; float: left; }
  #address1 { width: 250px; height: 100px; float: right; }
  #customer { overflow: hidden; }
    </style>
  <body>
          <h1>Foodies</h1>
          <h2>Verify To update your Details</h2>
          <div id='page-wrap'>
          <p id='header'>Activate Your Email ID</p>
      <div id='identity'>
      
          <p id='address'>
          Foodies<br>
          Mit Academy of Engineering<br>
          Alandi Pune 414001  <br>
          Phone: 9421017990</p>
  
          <p id='address1'>
          Name : $username<br>
          Email : $email1<br>
          Mobile : $mobile1<br>
          Address : $address1 $zip1<br>
          $city1 $state1</p>
      </div>
          </div>
          <div id='page-wrap'>

          <textarea id='header1'>Terms And Conditions.<br></textarea>
          
          <div id='identity'>
          <h2>Click here to activate your account
          http://localhost/Food/uactivation1.php?token=$token</h2>
  
          </body>
  </html>";
  $sender_email ="From: farmagrimitaoe@gmail.com";

  if(mail($email, $subject, $message,$headers, $sender_email)){
    $_SESSION['msg2'] ="Profile Updated Successfully You have Recived Mail On $email Verify it.";
     ?>
    <script>
    location.replace("ulogin.php");
    </script>
    <?php
  }else{
    $_SESSION['msg1'] ="Email Not Sent Try again !!";
    ?>
    <script>
    location.replace("ulogin.php");
    </script>
    <?php
  }
            
        }else{
           
        }
        }else{
          $_SESSION['msg1'] = "Profile Not Updated Try Again !!!";
          ?>
          <script>
        location.replace("ueditprofile.php");
          </script>
          <?php
      }
      }
  ?>