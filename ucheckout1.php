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
    <?php include'database/dbcon.php';?>
    </html>

    <?php
include 'database/dbcon.php';
if(isset($_GET['resid']) && isset($_GET['foodid']))
{
    date_default_timezone_set("Asia/Calcutta");
    $resid = $_GET['resid'];
    $foodid = $_GET['foodid'];
    $loginid=$_SESSION['loginid'];
    $date = date("Y-m-d");
    $time= date("h:i:sa");

    $emailquery =" select * from signuphotel where resid ='$resid' and hstatus='Closed' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);
    if($emailcount>0)
    {
      ?>
      <script>
      alert("Hotel is Closed Now Try late !!")
      location.replace("uhotel.php?resid=<?php echo $resid?>");
      </script>
      <?php
    }else{
    if(isset($_POST['submit1'])){
        $selectquery = "SELECT * from menu  where resid='$resid' and foodid='$foodid'";
        $query1 = mysqli_query($con,$selectquery);
        $result1 =mysqli_fetch_array($query1);
        $price=$result1['price']; 
        $qty = mysqli_real_escape_string($con, $_POST['quantity']);
        $total=$price*$qty;

        if($qty!=0){
        $updatequery = "update checkout set quantity='$qty', total='$total' where resid='$resid' and foodid='$foodid' and loginid='$loginid' ";
        $query1 = mysqli_query($con, $updatequery);
        if($query1)
        {
           ?>
           <script>
           location.replace("uhotel.php?resid=<?php echo $resid?>");
           </script>
           <?php
       }else{
           ?>
           <script>
             alert("Check Mail You have Recived Your Login ID")
           </script>
           <?php
       }}else{
        $updatequery = "delete from checkout where resid='$resid' and foodid='$foodid' and loginid='$loginid' ";
        $query1 = mysqli_query($con, $updatequery);
        if($query1)
        {
           ?>
           <script>
           location.replace("uhotel.php?resid=<?php echo $resid?>");
           </script>
           <?php
       }else{
           ?>
           <script>
             alert("Check Mail You have Recived Your Login ID")
           </script>
           <?php
       }
       }
    }
    if(isset($_POST['submit2'])){
        $selectquery = "SELECT * from menu  where resid='$resid' and foodid='$foodid'";
        $query1 = mysqli_query($con,$selectquery);
        $result1 =mysqli_fetch_array($query1);
        $price=$result1['price']; 
        $qty = mysqli_real_escape_string($con, $_POST['quantity']);
        $total=$price*$qty;

        $emailquery =" select * from checkout where resid='$resid' and foodid='$foodid' and loginid='$loginid' ";
        $query = mysqli_query($con, $emailquery);
        
        $emailcount = mysqli_num_rows($query);
        if($emailcount>0)
        {
            $updatequery = "update checkout set quantity='$qty', total='$total' where resid='$resid' and foodid='$foodid' and loginid='$loginid' ";
            $query1 = mysqli_query($con, $updatequery);
        if($query1)
        {
           ?>
           <script>
           location.replace("uhotel.php?resid=<?php echo $resid?>");
           </script>
           <?php
       }else{
           ?>
           <script>
             alert("Check Mail You have Recived Your Login ID")
           </script>
           <?php
       }}else{
      $insertquery ="insert into checkout(loginid,resid,foodid,quantity,total,date,time) 
     values('$loginid','$resid','$foodid','$qty','$total','$date','$time')";
     
     $iquery = mysqli_query($con, $insertquery);
     
     if($iquery)
     {
        ?>
        <script>
        location.replace("uhotel.php?resid=<?php echo $resid?>");
        </script>
        <?php
    }else{
        ?>
        <script>
          alert("Check Mail You have Recived Your Login ID")
        </script>
        <?php
    }}
  }

  if(isset($_POST['submit3'])){
    $selectquery = "SELECT * from menu  where resid='$resid' and foodid='$foodid'";
    $query1 = mysqli_query($con,$selectquery);
    $result1 =mysqli_fetch_array($query1);
    $price=$result1['price']; 
    $qty = mysqli_real_escape_string($con, $_POST['quantity']);
    $total=$price*$qty;

    if($qty!=0){
    $updatequery = "update checkout set quantity='$qty', total='$total' where resid='$resid' and foodid='$foodid' and loginid='$loginid' ";
    $query1 = mysqli_query($con, $updatequery);
    if($query1)
    {
       ?>
       <script>
       location.replace("ucheckout.php?resid=<?php echo $resid?>");
       </script>
       <?php
   }else{
       ?>
       <script>
         alert("Check Mail You have Recived Your Login ID")
       </script>
       <?php
   }}else{
    $updatequery = "delete from checkout where resid='$resid' and foodid='$foodid' and loginid='$loginid' ";
    $query1 = mysqli_query($con, $updatequery);
    if($query1)
    {
       ?>
       <script>
       location.replace("ucheckout.php?resid=<?php echo $resid?>");
       </script>
       <?php
   }else{
       ?>
       <script>
         alert("Check Mail You have Recived Your Login ID")
       </script>
       <?php
   }
   }
}
if(isset($_POST['submit4'])){
    $selectquery = "SELECT * from menu  where resid='$resid' and foodid='$foodid'";
    $query1 = mysqli_query($con,$selectquery);
    $result1 =mysqli_fetch_array($query1);
    $price=$result1['price']; 
    $qty = mysqli_real_escape_string($con, $_POST['quantity']);
    $total=$price*$qty;

    $emailquery =" select * from checkout where resid='$resid' and foodid='$foodid' and loginid='$loginid' ";
    $query = mysqli_query($con, $emailquery);
    
    $emailcount = mysqli_num_rows($query);
    if($emailcount>0)
    {
        $updatequery = "update checkout set quantity='$qty', total='$total' where resid='$resid' and foodid='$foodid' and loginid='$loginid' ";
        $query1 = mysqli_query($con, $updatequery);
    if($query1)
    {
       ?>
       <script>
       location.replace("ucheckout.php?resid=<?php echo $resid?>");
       </script>
       <?php
   }else{
       ?>
       <script>
         alert("Check Mail You have Recived Your Login ID")
       </script>
       <?php
   }}else{
  $insertquery ="insert into checkout(loginid,resid,foodid,quantity,total,date,time) 
 values('$loginid','$resid','$foodid','$qty','$total','$date','$time')";
 
 $iquery = mysqli_query($con, $insertquery);
 
 if($iquery)
 {
    ?>
    <script>
    location.replace("ucheckout.php?resid=<?php echo $resid?>");
    </script>
    <?php
}else{
    ?>
    <script>
      alert("Check Mail You have Recived Your Login ID")
    </script>
    <?php
}}
}}}
?>