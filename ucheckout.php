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
  
  .divider-text::after{
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 5px solid rgb(11, 10, 10);
    top: 55%;
    left: 0;
    z-index: 1;
  }
  .divider-text1{
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
    padding : 5px;
    
  }
  
  .divider-text1::after{
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 2px solid rgb(11, 10, 10);
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
  <div class="content bg-grey">
<?php
if(isset($_GET['resid'])){
  $resid = $_GET['resid'];
  $selectquery = "select * from signuphotel where resid='$resid' and status ='Active' ";
  $query = mysqli_query($con,$selectquery);
  $result =mysqli_fetch_array($query);
  $hotel=$result['hotel'];
  $image=$result['image'];
  $mobile=$result['mobile'];  
}
?>
  <div class="row">
  <div class="col-sm-2" style="padding:10px;">
  <a href="uhotel.php?resid=<?php echo $resid;?>"><button class="btn btn-outline-primary" type="submit"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
</div>
    <div class="col-sm-8" style="padding:5px;">
<h3><?php echo $hotel?>.</h3>
<p>Contact No.: <?php echo $mobile?>.</p>
</div>
<div class="col-sm-2" style="padding:5px;">
<img src="<?php echo $image?>" alt="" width="100" height="75"></a>
</div>
</div>
<p class = "divider-text"></p>

<div class="row">
    <div class="col-sm-3" style="padding:5px;">
   <p>Menu</p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Quantity</p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Price</p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Total</p>
  </div>
</div>

<?php
if(isset($_GET['resid'])){
    $resid = $_GET['resid'];
  $selectquery = "SELECT * FROM checkout inner join menu on (checkout.foodid=menu.foodid and checkout.resid=menu.resid) where checkout.resid='$resid'";
$query1 = mysqli_query($con,$selectquery);
while($result1 =mysqli_fetch_array($query1)){
  $t=$result1['total'];
  ?>
<div class="row">
    <div class="col-sm-3" style="padding:5px;">
   <p><?php echo $result1['foodname'];?></p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
  <form action ="ucheckout1.php?foodid=<?php echo $result1['foodid'];?>&&resid=<?php echo $resid;?>" method ="POST">
  <div class="row">
  <div class="col-sm-1" style="padding:8px;">
        <button class="btn btn-outline-danger" type="submit" name="submit3"><i class="fa fa-minus" aria-hidden="true"></i></button>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-sm-7" style="padding:5px;">
        <input class="form-control me-2"  type="number" id="quantity" name="quantity" min="0" max="50" aria-label="Search" value="<?php echo $result1['quantity'];?>">
        </div>
        <div class="col-sm-1" style="padding:8px;">
        <button class="btn btn-outline-danger" type="submit" name="submit4"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        </div>
      </form>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Rs.<?php echo $result1['price'];?></p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Rs.<?php echo $result1['total'];?></p>
  </div>
</div>
<?php
}
$sum = "SELECT SUM(total) as total FROM checkout where resid='$resid' and loginid='$loginid'";
$sum1 = mysqli_query($con,$sum);
$resul =mysqli_fetch_array($sum1);
$total=$resul['total'];
if($total>="100" && $total<="500"){
  $discount='4% Discount';
  $discount1=$total*4/100;
  $total1=$total-$discount1;
} elseif ($total>="500" && $total<="1000") {
  $discount='6% Discount';
  $discount1=$total*6/100;
  $total1=$total-$discount1;
}
elseif ($total>="1000" && $total<="2000"){
  $discount='8% Discount';
  $discount1=$total*8/100;
  $total1=$total-$discount1;
}elseif($total>"2000"){
  $discount='10% Discount';
  $discount1=$total*10/100;
  $total1=$total-$discount1;
}else if($total<"100"){
  $discount='1% Discount';
  $discount1=$total*1/100;
  $total1=$total-$discount1;
}
}
$to=$total-$discount1;
?>
  <form action ="" method ="POST">

<div class="form-group">
    <textarea class="form-control" aria-label="With textarea" name="inst" placeholder="Food Cooking Instructions :"></textarea>
  </div>
<p3>Apply Promo <a href ="#">Code.</a></p3>
  <p class = "divider-text"></p>
  <div class="row">
    <div class="col-sm-9" style="padding:5px;"><br><br><br>
    <h5 style="padding:10px;">Total Bill With <?php echo $discount?> :</h5>
  </div>
  <div class="col-sm-3" style="padding:5px;">
    <h7 style="padding:10px;">Rs.<?php echo $total;?></h7><br>
    <h7 style="padding:10px;">Rs.<?php echo $discount1;?>(<?php echo $discount;?>)</h7>
    <p class = "divider-text1"></p>
    <h5 style="padding:10px;">Rs.<?php echo $total1;?></h5>
  </div>
  <div class="row">
    <div class="col-sm-10" style="padding:5px;">
</div>
<div class="col-sm-2" style="padding:5px;">
  <button class="btn btn-outline-success" type="submit" name="submit"  style="float: right;padding:5px;">Place Order</button> 
  </div></div>
  </form>

  </div>  
  </div>
 </div>
</main>
</div>

    </body>
</html>

<?php
include'database/dbcon.php';
if(isset($_GET['resid'])){
$resid = $_GET['resid'];
$rand = rand(100000000,9999999999);
date_default_timezone_set("Asia/Calcutta");
$date = date("Y-m-d");
$time= date("h:i:sa");
$loginid=$_SESSION['loginid'];

$emailquery =" select * from signuphotel where resid ='$resid' and hstatus='Closed' ";
$query = mysqli_query($con, $emailquery);

$emailcount = mysqli_num_rows($query);
if($emailcount>0)
{
  $updatequery = "delete from checkout where resid='$resid' and loginid='$loginid' ";
  $query1 = mysqli_query($con, $updatequery);
  ?>
  <script>
  alert("Hotel is Closed Now Try late !!")
  location.replace("uhotel.php?resid=<?php echo $resid?>");
  </script>
  <?php
}else{

if(isset($_POST['submit']))
{
  $inst = mysqli_real_escape_string($con, $_POST['inst']);


$selectquery = "SELECT * FROM checkout inner join menu on (checkout.foodid=menu.foodid and checkout.resid=menu.resid) where checkout.resid='$resid'";
$query1 = mysqli_query($con,$selectquery);
while($result1 =mysqli_fetch_array($query1)){
  $foodid=$result1['foodid'];
  $price=$result1['price'];
  $qty=$result1['quantity'];
  $foodname=$result1['foodname'];
  $total1=$result1['total'];
  $sum = "SELECT SUM(total) as total FROM checkout where resid='$resid' and loginid='$loginid'";
  $sum1 = mysqli_query($con,$sum);
  $resul =mysqli_fetch_array($sum1);
  $total=$resul['total'];
  if($total>="100" && $total<="500"){
    $discount1=$total*4/100;
  } elseif ($total>="500" && $total<="1000") {
    $discount1=$total*6/100;
  }
  elseif ($total>="1000" && $total<="2000"){
    $discount1=$total*8/100;
  }else if($total>="2000"){
    $discount1=$total*10/100;
  }else if($total<"100"){
    $discount1=$total*1/100;
  }

  $insertquery ="insert into order1(orderid,loginid,resid,foodid,foodname,price,quantity,discount,total,date,time,instruction,status) 
values('$rand','$loginid','$resid','$foodid','$foodname','$price','$qty','$discount1','$total1','$date','$time','$inst','Pending')";
  $iquery = mysqli_query($con, $insertquery);
  $insertquery1 ="insert into histroy(orderid,loginid,resid,foodid,foodname,price,quantity,discount,total,date,time,instruction,status) 
  values('$rand','$loginid','$resid','$foodid','$foodname','$price','$qty','$discount1','$total1','$date','$time','$inst','Pending')";
    $iquery1 = mysqli_query($con, $insertquery1);
    
  if($iquery)
{
  ?>
    <script>
      alert("Order Place Sucessfully");
      location.replace("uhotel.php?resid=<?php echo $resid;?>");
    </script>
    <?php
}else{
  ?>
    <script>
      alert("Order Place Not Sucessfully");
      location.replace("ucheckout.php?resid=<?php echo $resid;?>");
    </script>
    <?php
}
}
$emailquery =" select * from signup where loginid ='$loginid' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['name'];
$address = $userdata['address'];
$mobile = $userdata['mobile'];
$email = $userdata['email'];
$city = $userdata['city'];
$state = $userdata['state'];

$emailquery1 =" select * from signuphotel where resid ='$resid' ";
$query1 = mysqli_query($con, $emailquery1);
$emailcount1 = mysqli_num_rows($query1);
if($emailcount1)
{
$userdata1 = mysqli_fetch_assoc($query1);
$name1 = $userdata1['hotel'];
$mobile1 = $userdata1['mobile'];
$address1 = $userdata1['address'];
$city1 = $userdata1['city'];
$state1 = $userdata1['state'];
$email1 = $userdata1['email'];


$subject = "Foodies Order Place Sucessfully";
              $headers = "From: foodiesmitaoe@gmail.com\r\n";
              $headers .= "MTME-Version: 1.0\r\n";
              $headers .= "Content-type: text/html; charset=ISO-8859\r\n";
              $message = "<html>
              <head>
              <title>VOTE FOR YOU</title>
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
              
              textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
              table { border-collapse: collapse;width:60% }
              table td, table th { border: 1px solid black; padding: 5px; }
              
              #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
              
              #address { width: 250px; height: 100px; float: left; }
              #address1 { width: 300px; height: 110px; float: right; }
              #customer { overflow: hidden; }
              
              
              #meta { margin-top: 1px; width: 300px; float: right; }
              #meta td { text-align: right;  }
              #meta td.meta-head { text-align: left; background: #eee; }
              #meta td textarea { width: 100%; height: 20px; text-align: right; }
              
              #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
              #items th { background: #eee; }
              #items tr.item-row td { border: 0; vertical-align: top; }
              #items td.item-name { width: 175px; }
              #items td.total-line { border-right: 0; text-align: right; }
              #items td.total-value { border-left: 0; padding: 10px; }
              #items td.total-value textarea { height: 20px; background: none; }
              #items td.balance { background: #eee; }
              #items td.blank { border: 0; }
              
              #terms { text-align: center; margin: 20px 0 0 0; }
              #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms textarea { width: 100%; text-align: center;}
              
              textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
              
              .delete-wpr { position: relative; }
              .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
              content {
                max-width: 70%;
                margin: auto;
                background: rgb(243, 240, 240);
                padding: 10px;
    }
                </style>
              <body>
                      <h1>Foodies</h1>
                      <h2>Thank you for Placing Order Confrmation Will Get soon from Hotel $name1.</h2>
                      <div id='page-wrap'>
                      <p id='header'></p>
                  <div id='identity'>
                  
                      <p id='address'>
                      Hotel : $name1.<br>
                      $address1.<br>
                      $city1 $state1.<br>
                      Phone: $mobile1.</p>
              
                      <p id='address1'>
                      Name : $name.<br>
                      Email : $email.<br>
                      Mobile : $mobile.<br>
                      Address : $address.<br>
                      $city $state.</p>
                  </div>
                      </div>
                      <div id='page-wrap'>
                      <textarea id='header'></textarea>
                      <div id='terms'>
              
                      <table id='meta'>
                      <tr>
                              <td class='meta-head py-3 text-black'>Date :</td>
                              <td><div class='due py-3 text-black'>$date</div></td>
                          </tr>
                          <tr>
                              <td class='meta-head py-3 text-black'>Time :</td>
                              <td><div class='due py-3 text-black'>$time</td>
                          </tr>
                      </table>
                   </div><br><br>
                   <table id='items'>
                    <tr>
                        <th class='py-3 text-black'>Food</th>
                        <th class='py-3 text-black'>Quantity</th>
                        <th class='py-3 text-black'>Price</th>
                        <th class='py-3 text-black'>Total</th>
                    </tr>

                  <tr class='item-row'>
                  <td class='cost py-3 text-black'><p>$foodname</p></td>
                  <td class='qty py-3 text-black'><p>$qty.</p></td>
                  <td class='qty py-3 text-black'><p>$price</p></td>
                  <td><p class='cost py-3 text-black'>$t Rs.</p></td>
              </tr>
  

             <tr>
                    <tr>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='total-line py-3 text-black'>Sub Total : </td>
                    <td class='total-value py-3 text-black'><div id='total'>$total Rs.</div></td>
                    </tr>
                    <tr>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='total-line py-3 text-black'>$discount : </td>
                    <td class='total-value py-3 text-black'><div id='total'>$discount1 Rs.</div></td>
                    </tr>
                    <tr>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='total-line py-3 text-black'>Total: </td>
                    <td class='total-value py-3 text-black'><div id='total'>$to Rs.</div></td>
                    </tr>
                  
                   </table>
                
                  
                  
                   <div id='terms'>
                    <h5 class='py-3 text-black'>Terms & Conditions.</h5>
                </div>
            </div>
                  </div>
                  </body>
                  </html>";
                  $sender_email ="From: farmagrimitaoe@gmail.com";
                
                  if(mail($email, $subject, $message,$headers, $sender_email)){

             $subject = "Foodies Patner Someone Place Order";
             $headers = "From: foodiesmitaoe@gmail.com";
             $message = "You Got order From $name of value $to Rs.";
             $sender_email ="From: farmagrimitaoe@gmail.com";
                
             if(mail($email1, $subject, $message, $sender_email)){
                    $updatequery = "delete from checkout where resid='$resid' and loginid='$loginid' ";
                    $query1 = mysqli_query($con, $updatequery);
                    ?>
                    <script>
                      alert("Order Place Sucessfully")
                      location.replace("uhotel.php?resid=<?php echo $resid;?>");
                    </script>
                    <?php
              }else{
                ?>
                <script>
                  alert("00")
                  location.replace("uhotel.php?resid=<?php echo $resid;?>");
                </script>
                <?php
             }}
            }}

}}
}
?>