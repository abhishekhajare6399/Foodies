<?php

include 'database/dbcon.php';

if(isset($_GET['Av'])){
    $Av = $_GET['Av'];
    $updatequery = "update menu set menustatus='Available' where foodid='$Av' ";

    $query = mysqli_query($con, $updatequery);

    if($query){
            ?>
            <script>
          alert("Menu is Available")
          location.replace("amenu.php")
            </script>
            <?php
        }
       
}
if(isset($_GET['Un'])){
    $un = $_GET['Un'];
    $updatequery = "update menu set menustatus='Unavailable' where foodid='$un' ";

    $query = mysqli_query($con, $updatequery);

    if($query){
                ?>
                <script>
              alert("Menu is Unavailable")
              location.replace("amenu.php")
                </script>
                <?php
            }
}
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
   ?>
   <?php
session_start();
if(!isset($_SESSION['resid'])){
    echo "You are logged out";
    header('location:alogin.php');
  }
  $resid=$_SESSION['resid'];
  $selectquery = "select * from menu where foodid='$id' and resid='$resid' ";
  $query = mysqli_query($con,$selectquery);
  $result =mysqli_fetch_array($query);
  $food=$result['foodname'];
  $price=$result['price'];
  $d=$result['description'];


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
    * {
    box-sizing: border-box;
    }

    input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    }

    label {
    padding: 12px 12px 12px 0;
    display: inline-block;
    }

    input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }

    .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
    }

    .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
    content: "";
    display: table;
    clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
    }
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
          <h5><?php echo $food ?> :</h5>

          <div class="row slideanim">
          <div class="container">
<form ction ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
  <div class="row">
    <div class="col-25">
      <label for="fname">Food Name :</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="food" value="<?php echo $food?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Price :</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="price" value="<?php echo $price?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Description</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="subject" placeholder="Enter Food Description" style="height:200px"></textarea>
    </div>
  </div>
  <br>
  <div class="row">
  <div class="col-sm-8">
    </div>
    <div class="col-sm-2">
    <input type="submit" name ="subm" value="Delete">

    </div>
    <div class="col-sm-2">
    <input type="submit" name ="submit" value="Submit">

    </div>
  </div>
  </form>
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


   <?php

   if(isset($_POST['submit']))
   {
$food1 = mysqli_real_escape_string($con, $_POST['food']);
$price1 = mysqli_real_escape_string($con, $_POST['price']);
$subject = mysqli_real_escape_string($con, $_POST['subject']);

$insertquery ="update menu set foodname='$food1' , price='$price1',description='$subject' where foodid='$id' ";
$iquery = mysqli_query($con, $insertquery);

if($iquery)
{
  ?>
    <script>
      alert("Menu Update Successfully")
      location.replace("amenu.php")
    </script>
    <?php
}
}
if(isset($_POST['subm']))
{
$insertquery ="delete from menu where foodid='$id' ";
$iquery = mysqli_query($con, $insertquery);

if($iquery)
{
  ?>
    <script>
      alert("Menu Delete Successfully")
      location.replace("amenu.php")
    </script>
    <?php
}
}
}
?>

<?php
if(isset($_GET['add'])){
    $resid = $_GET['add'];
   ?>
   <?php
session_start();
if(!isset($_SESSION['resid'])){
    echo "You are logged out";
    header('location:alogin.php');
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
    * {
    box-sizing: border-box;
    }

    input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    }

    label {
    padding: 12px 12px 12px 0;
    display: inline-block;
    }

    input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }

    .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
    }

    .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
    content: "";
    display: table;
    clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
    }
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
          <h5>Add New Food Name :</h5>

          <div class="row slideanim">
          <div class="container">
<form ction ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
  <div class="row">
    <div class="col-25">
      <label for="fname">Food Name :</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="food" placeholder="Food Name">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Price :</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="price" placeholder="Price">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="country">Categories :</label>
    </div>
    <div class="col-75">
    <select name="state" id="country" class="form-control" required>
                  <option value=""> Select Categories</option>
                  <?php 
                     include('database/dbcon.php');
                     $query= "select * from categories ";
                     $result= mysqli_query($con,$query);
                     while ($row= mysqli_fetch_array($result)) { ?>
                  <option value="<?php echo $row['cateid']; ?>"><?php echo $row['categories'] ?></option>
                  <?php } ?>
               </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Description</label>
    </div>
    <div class="col-75">
    <textarea class="form-control" aria-label="With textarea" name="subject" placeholder="Food Description"></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
    </div>
    <div class="col-75">
   
<p1><strong>Click Here to upload your image:</strong></p1>
<input type="file" id="myFile" name="image" required>
  </div>
  

  <br>
  <div class="row">
  
    <input type="submit" name ="subm" value="Add Food Item">

  </div>
  </form>
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


   <?php
include'database/dbcon.php';
   if(isset($_POST['subm']))
  
   {
$food1 = mysqli_real_escape_string($con, $_POST['food']);
$price1 = mysqli_real_escape_string($con, $_POST['price']);
$subject = mysqli_real_escape_string($con, $_POST['subject']);
$cat = mysqli_real_escape_string($con, $_POST['state']);
$rand = rand(10000,99999);
$file=$_FILES['image'];

$filename = $file['name'];
$filepath = $file['tmp_name'];
$fileerror = $file['error'];

if($fileerror == 0)
{
  $destfile = 'menu image/'.$filename;
  move_uploaded_file($filepath, $destfile);
}
$insertquery ="insert into menu(resid,foodid,foodname,price,description,image,cateid,menustatus) 
values('$resid','$rand','$food1','$price1','$subject','$destfile','$cat','Available')";

$iquery = mysqli_query($con, $insertquery);
if($iquery)
{
  ?>
    <script>
      alert("Menu Added Successfully")
      location.replace("amenu.php")
    </script>
    <?php
}else{
    ?>
      <script>
        alert("Menu Not Added Successfully")
      </script>
      <?php
  }
}
}
?>