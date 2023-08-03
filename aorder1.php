<?php
session_start();
if(!isset($_SESSION['resid'])){
    echo "You are logged out";
    header('location:alogin.php');
  }
?>
<?php
$resid=$_SESSION['resid'];
$hotel=$_SESSION['hotel'];
$city =$_SESSION['city'];
$image =$_SESSION['image'];
?>
<?php
include'database/dbcon.php';
if(isset($_GET['order'])){
    $t = $_GET['order'];
    $resid=$_SESSION['resid'];
if(isset($_POST['submit']))
{
    $updatequery = "update order1 set status='Accepted' where orderid='$t' and resid='$resid'";
    $query = mysqli_query($con, $updatequery);
    $updatequery1 = "update histroy set status='Accepted' where orderid='$t' and resid='$resid' ";
    $query1 = mysqli_query($con, $updatequery1);
    if($query1){
      $emailquery1 =" select * from signup inner join histroy on histroy.loginid=signup.loginid where resid ='$resid' ";
      $query1 = mysqli_query($con, $emailquery1);
      $emailcount1 = mysqli_num_rows($query1);
      if($emailcount1)
      {
      $userdata1 = mysqli_fetch_assoc($query1);
      $name1 = $userdata1['name'];
      $email = $userdata1['email'];
      }
            $subject = "$hotel Accept Your Order";
            $headers = "From: foodiesmitaoe@gmail.com";
            $message = "You Order is Accepted order Will perpared in next 20 minutes..
            Thank You For Ordering";
            $sender_email ="From: farmagrimitaoe@gmail.com";
               
            if(mail($email, $subject, $message, $sender_email)){
        ?>
        <script>
      alert("Order Accepted")
      location.replace("aorder.php")
        </script>
        <?php
    }else{
        ?>
        <script>
      alert("Not Accepted")
      location.replace("aorder.php")
        </script>
        <?php
    }
}}
}
if(isset($_GET['order'])){
    $t = $_GET['order'];
if(isset($_POST['sub']))
{
    $updatequery4= "update order1 set status='Completed' where orderid='$t' and resid='$resid' ";
    $query4 = mysqli_query($con, $updatequery4);
    $updatequery5 = "update histroy set status='Completed' where orderid='$t' and resid='$resid' ";
    $query5= mysqli_query($con, $updatequery5);
    if($query5){
      $emailquery1 =" select * from signup inner join histroy on histroy.loginid=signup.loginid where resid ='$resid' ";
      $query1 = mysqli_query($con, $emailquery1);
      $emailcount1 = mysqli_num_rows($query1);
      if($emailcount1)
      {
      $userdata1 = mysqli_fetch_assoc($query1);
      $name1 = $userdata1['name'];
      $email = $userdata1['email'];
      }
            $subject = "$hotel has Complete Your Order";
            $headers = "From: foodiesmitaoe@gmail.com";
            $message = "You Order is Completed Take Your Order From Hotel. You can Take Bill Copy From website.
            Thank You For Ordering";
            $sender_email ="From: farmagrimitaoe@gmail.com";
               
            if(mail($email, $subject, $message, $sender_email)){
               ?>
        <script>
      alert("Order Completed")
      location.replace("aorder.php")
        </script>
        <?php
    }else{
        ?>
        <script>
      alert("Not Completed")
      location.replace("aorder.php")
        </script>
        <?php
    }}
}}
if(isset($_GET['order'])){
    $t = $_GET['order'];
if(isset($_POST['submi']))
{
    $updatequery2 = "update order1 set status='Delivered' where orderid='$t' and resid='$resid' ";
    $query2 = mysqli_query($con, $updatequery2);
    $updatequery3 = "update histroy set status='Delivered' where orderid='$t' and resid='$resid' ";
    $query3 = mysqli_query($con, $updatequery3);
    if($query3){

$emailquery1 =" select * from signup inner join histroy on histroy.loginid=signup.loginid where resid ='$resid' ";
$query1 = mysqli_query($con, $emailquery1);
$emailcount1 = mysqli_num_rows($query1);
if($emailcount1)
{
$userdata1 = mysqli_fetch_assoc($query1);
$name1 = $userdata1['name'];
$email = $userdata1['email'];
}
      $subject = "$hotel Delivered Your Food Order Thank you";
      $headers = "From: foodiesmitaoe@gmail.com";
      $message = "You Order is Delivered Thank you for placing Order You can Take Bill Copy From website.
      Thank You Enjoy your Food.";
      $sender_email ="From: farmagrimitaoe@gmail.com";
         
      if(mail($email, $subject, $message, $sender_email)){
        ?>
        <script>
      alert("Order Deliverd")
      location.replace("aorder.php")
        </script>
        <?php
       }else{
         ?>
         ?>
        <script>
      alert("Not Deliverd")
      location.replace("aorder.php")
        </script>
        <?php
      }
    }
}}
?>