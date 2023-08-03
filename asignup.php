<?php
session_start();
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
      height: 5%;
  }
  label{
          text-align: left;
          color:white;
        }
        h3{
          text-align: center;
          color:white;
        }
        p{
          text-align: center;
          color:white;
        }
        body {
    background-image: url('image/back.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }
  .content {
      max-width: 65%;
      margin: auto;
      padding: 10px;
      border: 3px solid white;
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
    border-bottom: 5px solid white;
    top: 55%;
    left: 0;
    z-index: 1;
  }
    </style>
    <?php include 'link/link.php'?>
    <body>
      <header>
</header>
<div class="content">
  <h3>FOODIES Partner</h3>
  <p>Register Your Hotel With Foodies and Get order From multiple Customers in Your City.</p>
  <p class="bg-success text-white px-1"><?php
  if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  }
  ?>
</p>
  <p class = "divider-text"></p>

<form ction ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row">
    <div class="form-group col-sm-12">
      <label for="inputEmail4">Hotel Name :</label>
      <input type="name" class="form-control" id="inputname4" name="name" placeholder="Hotel Name" required>
    </div>
  </div>
<div class="row">
    <div class="form-group col-sm-6">
      <label for="inputEmail4">Hotel Email ID :</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" required>
    </div>
    <div class="form-group col-sm-6">
      <label for="inputPassword4">Hotel Landline Number :</label>
      <input type="mobile" class="form-control" id="inputmobile4" name="mobile" maxlength="11" placeholder="Landline Number" required>
    </div>
  </div>
  <div class="row">
  <div class="form-group col-sm-6">
      <label for="inputPassword4">Password :</label>
      <input type="password" class="form-control" id="inputPassword4" maxlength="11" name="pass" placeholder="Password" required>
    </div>
    <div class="form-group col-sm-6">
      <label for="inputPassword4">Confirm Password :</label>
      <input type="password" class="form-control" id="inputPassword4" maxlength="11" name="cpass" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Hotel Address :</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
  </div>
  <div class="row">
  <div class="col-sm-3">
      <label for="Categories">Categories :</label>
      <select name="cata" id="Categories" class="form-control" required>
                  <option value=""> Select Categories</option>
                  <?php 
                     include('database/dbcon.php');
                     $query= "select * from categories ";
                     $result= mysqli_query($con,$query);
                     while ($row= mysqli_fetch_array($result)) { ?>
                  <option value="<?php echo $row['categories']; ?>"><?php echo $row['categories'] ?></option>
                  <?php } ?>
               </select>    </div>
    <div class="col-sm-3">
      <label for="inputCity">City :</label>
      <input type="text" class="form-control" id="inputCity" name="city" required>
    </div>
    <div class="col-sm-4">
      <label for="inputState">State :</label>
      <label for="Country">Select State :</label>
               <select name="state" id="country" class="form-control" required>
                  <option value=""> Select State</option>
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
      <input type="text" class="form-control" id="inputZip" name="zip" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Descritption :</label>
    <textarea class="form-control" aria-label="With textarea" name="Description" placeholder="Hotel Information"></textarea>
  </div>
  <div class="p-2 w-full">
<label><strong>Hotel Image:</strong></label>
<input type="file" id="myFile" name="image" required>
</div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" required>
      <label class="form-check-label" for="gridCheck">
        Accept All <a href="#">Terms and Conditions</a>
      </label><br>
      <label>
        Already Have Account  <a href="alogin.php">Login</a> Now.
      </label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
  </div>
  <div class="col-sm-6">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Sign in</button>
  </div>
  </div>
</form>
</div>
</body>
</html>



<?php
include'database/dbcon.php';
if(isset($_POST['submit']))
{
date_default_timezone_set("Asia/Calcutta");
$username = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$password = mysqli_real_escape_string($con, $_POST['pass']);
$cpassword = mysqli_real_escape_string($con, $_POST['cpass']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$Description = mysqli_real_escape_string($con, $_POST['Description']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$state = mysqli_real_escape_string($con, $_POST['state']);
$zip = mysqli_real_escape_string($con, $_POST['zip']);
$cata = mysqli_real_escape_string($con, $_POST['cata']);

$pass = password_hash($password, PASSWORD_BCRYPT);
$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

$token =bin2hex(random_bytes(15));
$rand = rand(100000,999999);
$otp = rand(1000,9999);
$date = date("Y-m-d");
$time= date("h:i:sa");
$file=$_FILES['image'];

$filename = $file['name'];
$filepath = $file['tmp_name'];
$fileerror = $file['error'];

if($fileerror == 0)
{
  $destfile = 'hotel image/'.$filename;
  move_uploaded_file($filepath, $destfile);
}

$emailquery =" select * from signuphotel where email ='$email' ";
$query = mysqli_query($con, $emailquery);

$emailcount = mysqli_num_rows($query);
if($emailcount>0)
{
  $_SESSION['msg'] ="$email These Mail ID is Already taken You have Recive Mail";
  ?>
  <script>
  location.replace("alogin.php");
  </script>
  <?php
}else{
$emalquery =" select * from signuphotel where resid ='$rand' ";
$query = mysqli_query($con, $emalquery);
$emalcount = mysqli_num_rows($query);
if($emalcount>0)
{
  $_SESSION['msg'] ="Sorry your Id was not genrated Try Again !!!";
  ?>
  <script>
  location.replace("asignup.php");
  </script>
  <?php
}

else{
  if($password == $cpassword)
  {
$insertquery ="insert into signuphotel(resid,hotel,Categories,mobile,email,password,cpassword,address,city,state,pincode,date,time,description,image,token,otp,status,mstatus,hstatus) 
values('$rand','$username','$cata','$mobile','$email','$pass','$cpass','$address','$city','$state','$zip','$date','$time','$Description','$destfile','$token','$otp','Inactive','Inactive','Closed')";

$iquery = mysqli_query($con, $insertquery);

if($iquery)
{
  ?>
    <script>
      alert("Check Mail"$email" You have Recived Your Login ID")
    </script>
    <?php
  $subject = "FOODIES Hotel Patner";
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

  .divider-text span{
    padding: 7px;
    font-size: 12px;
    position: relative;
    z-index: 2;
  }
  .divider-text::after{
    position: absolute;
    width: 100%;
    border-bottom: 5px solid white;
    top: 55%;
    left: 0;
    z-index: 1;
  }
    </style>
  <body>
          <h1>Foodies Partner</h1>
          <h2>Thank you for Using Foodies Partner</h2>
          <div id='page-wrap'>
          <p id='header'>Activate Your account</p>
      <div id='identity'>
      
          <p id='address'>
          Foodies<br>
          Mit Academy of Engineering<br>
          Alandi Pune 414001  <br>
          Phone: 9421017990</p>
  
          <p id='address1'>
          Hotel Name : $username<br>
          Email : $email<br>
          Landline Number : $mobile<br>
          Address : $address $zip<br>
          $city $state</p><br><br>
      </div>
          </div><br><br>
          <div id='page-wrap'>
<br><br>
          <textarea id='header1'></textarea>
          
          <div id='identity'>
         
          <h2>Click here to activate your account
          http://localhost/Food/aactivation.php?token=$token</h2>
          <h2>For Mobile Activation OTP : $otp</h2>
  
          </body>
  </html>";
  $sender_email ="From: farmagrimitaoe@gmail.com";

  if(mail($email, $subject, $message,$headers, $sender_email)){
    $_SESSION['msg'] ="Check your mail account $email You recive OTP";

    ?>
    <script>
    location.replace("asignup.php");
    </script>
    <?php
    ?>
    <script>
      alert("Check your mail "$email "for activation")
    </script>
    <?php
  }else{
    $_SESSION['msg'] ="Email Not Sent";
  }
}else{
    ?>
    <script>
      alert("No Inserted ")
    </script>
    <?php
}
  }else{
    $_SESSION['msg'] ="Your Password is Not matching Try Again ";
   }
}
}
$selectquery = "select * from signuphotel where loginid ='$rand' ";
  $query = mysqli_query($con,$selectquery);
  $email_count = mysqli_num_rows($query);
    if($email_count)
    {
    $email_pass = mysqli_fetch_assoc($query);
    $_SESSION['loginid'] =$email_pass['loginid'];
    $_SESSION['email'] =$email_pass['email'];
}
}
?>