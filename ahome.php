<?php
session_start();
if(!isset($_SESSION['resid'])){
    echo "You are logged out";
    header('location:alogin.php');
  }
?>
<?php
$resid=$_SESSION['resid'];
$city =$_SESSION['city'];
$image =$_SESSION['image'];
$hotel=$_SESSION['hotel'];
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
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
        .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 13px;
  text-align: center;
  text-decoration: none;
  display: flex;
  font-size: 15px;
  margin: auto;
  transition-duration: 0.4s;
  cursor: pointer;
  
}

.button1 {
  background-color: #FADA0A;
  color: black; 
  border: 2px solid black;
}

.button1:hover {
  background-color: white;
  color: black;
}
.button4 {
  background-color: #f44336; 
  color: white; 
  border: 2px solid #f44336;
}

.button4:hover {
  background-color: white;
  color: #f44336;
}
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
  <?php include'database/dbcon.php'?>
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
      <li class="active"><a href="ahome.php">Home</a></li><br>
        <li  ><a href="aorder.php">Order</a></li><br>
        <li><a href="amenu.php">Menu</a></li><br>
        <li><a href="ahoteltime.php">Hotel</a></li><br>
        <li><a href="ahistory.php">History</a></li><br>
        <li><a href="asellreport.php">Sell Report</a></li><br>
        <li><a href="alogout.php">Logout</a></li><br><br>
      </ul><br>
      
    </div>
    <br>
    
    <div class="col-sm-10">
      <div class="well">
      <div class="row">
      <div class="col-sm-4" style="padding:10px;"></div>
      <div class="col-sm-1" style="padding:10px;"><br>
      <img src="foodiesp.jpg" width="100%" height="100%" >
</div>
      <div class="col-sm-5" style="padding:10px;">
      <h1 class="uppercase text-gray-2000 light:text-white font-black text-3xl">Foodies Partner.</h1>
<h1 class="uppercase text-gray-2000 light:text-white font-black text-3xl"><?php echo $hotel?>.</h1>

      </div>
      <div class="col-sm-1" style="padding:10px;"><br>
      <form ction ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST">
      <?php
       $selectquery1 = "SELECT * FROM  signuphotel where resid='$resid'  ";
       $query= mysqli_query($con,$selectquery1);
       $userdata = mysqli_fetch_assoc($query);
       $hstatus = $userdata['hstatus'];
if($hstatus=="Open"){
      ?>
      <button type="submit" name="submit" class="button button1">Shop is Open</button>
      <?php } else{ ?>
      <button type="submit" name="submit" class="button button4">Shop is Closed</button>
<?php }?>
  </form>    </div>
      
    </div>
      </div>
<?php include'anav.php'?>
    
      <div class="row">
        <div class="col-sm-5">
        <?php include'apie.php'?>

        <div class="col-sm-7">
          <?php include'acolumn.php'?>
          
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
  if($hstatus=="Open"){
  $updatequery = "UPDATE signuphotel set hstatus='Closed' where resid='$resid' ";
  $query1 = mysqli_query($con, $updatequery);
  if($query1){
    ?>
    <script>
  alert("Hotel is Closed")
  location.replace("ahome.php")
    </script>
    <?php
}}else{
$updatequery2 = "UPDATE signuphotel set hstatus='Open' where resid='$resid' ";
$query2 = mysqli_query($con, $updatequery2);
if($query2){
  ?>
  <script>
alert("Hotel is Open")
location.replace("ahome.php")
  </script>
  <?php
}}
}
