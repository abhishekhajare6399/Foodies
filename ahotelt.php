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
$waddress = $userdata['description'];
$email = $userdata['email'];
$pin = $userdata['pincode'];
$image1 = $userdata['image'];
$token = $userdata['token'];

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
          <div class="well">
          <h5>Profile :</h5>
          <form ction ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row">
<div class="col-sm-8" style="padding:15px;">
    </div>
    <div class="col-sm-2" style="padding:5px;">
    <button class="btn btn-success" name="submit" type="submit">Save</button>
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
    <label for="inputAddress2">Hotel Description:</label>
    <textarea type="text" class="form-control" id="inputAddress2" name="waddress1" placeholder="<?php echo $waddress?>" value="<?php echo $waddress?>"></textarea>
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
        </div>
      </div>
      
    </div>
  </div>
</div>

</body>
</html>

<?php
include'database/dbcon.php';
     if(isset($_POST['submit']))
     {
      $resid=$_SESSION['resid'];
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
        $updatequery = "update signuphotel set image='$destfile', hotel='$username',  email='$email1', mobile='$mobile1', address='$address1',description='$address1',city='$city1', state='$state1',pincode='$zip1',status='Inactive' where resid='$resid' ";
        $iquery = mysqli_query($con, $updatequery);

    if($iquery){
      
          $subject = "FOODIES Patner Profile Updated Details.";
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
          Hotel : $username<br>
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
          http://localhost/Food/aactivation1.php?token=$token</h2>
  
          </body>
  </html>";
  $sender_email ="From: farmagrimitaoe@gmail.com";

  if(mail($email, $subject, $message,$headers, $sender_email)){
     ?>
    <script>
    alert("Profile Updated Successfully You have Recived Mail On" $email" Verify it.")
   location.replace("hoteltime.php");
    </script>
    <?php
  }else{
    $_SESSION['msg1'] ="Email Not Sent Try again !!";
    ?>
    <script>
         alert("Email Not Sent Try again !!")
    location.replace("ueditprofile.php");
    </script>
    <?php
  }
        }else{
          $_SESSION['msg1'] = "Profile Not Updated Try Again !!!";
          ?>
          <script>
        location.replace("ahotelt.php");
        alert("Profile Not Updated Try Again !!!")
          </script>
          <?php
      }
      }
  ?>