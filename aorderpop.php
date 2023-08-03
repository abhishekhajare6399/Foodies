<style>
#myDIV{
  display:none;
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
  </style>
    <table border='0' width='100%'>
    <tr>
<td style="padding:20px;">
<div class="row">
    <div class="col-sm-3">
    <p>Food Name :</p>
    </div>
    <div class="col-sm-3">
    <p>Price :</p>
</div>
<div class="col-sm-3">
<p>Quantity :</p>
</div>
<div class="col-sm-3">
<p>Total :</p>
</div>
</div>
<p class = "divider-text1"></p>

<?php
include "database/dbcon.php";
 
$userid = $_POST['userid'];
 
$sql = "select * from order1  where orderid=".$userid;
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$t = $row['orderid'];
$dis= $row['discount'];
$sum = "SELECT SUM(total) as total FROM order1 where orderid='$t'";
$sum1 = mysqli_query($con,$sum);
$resul =mysqli_fetch_array($sum1);
$tot=$resul['total'];
$total=$tot-$dis;
$d=$dis*100/$tot;
$sql1 = "select * from order1  where orderid='$t'";
$result1 = mysqli_query($con,$sql1);
while( $row1 = mysqli_fetch_array($result1) ){
?>


<div class="row">
    <div class="col-sm-3">
    <p><?php echo $row1['foodname']; ?>.</p>
    </div>
    <div class="col-sm-3">
    <p><?php echo $row1['price']; ?> Rs.</p>
</div>
<div class="col-sm-3">
<p><?php echo $row1['quantity']; ?>.</p>
</div>
<div class="col-sm-3">
<p><?php echo $row1['total']; ?> Rs.</p>
</div>
</div>

<?php } ?>
    
<p class = "divider-text1"></p>
<div class="row">
    <div class="col-sm-6">
    <p>Total with <?php echo $d;?>% Discount :</p>
    </div>
    <div class="col-sm-3">
    </div>
    <div class="col-sm-3">
    <p><?php echo $total;?> Rs.</p>
    </div>
    </div>

<a href="#" onclick="myFunction()">Cooking Instructions :</a>
<div class="row">
<div class="col-sm-12">
<div id="myDIV">
    <p><?php echo  $row['instruction'];; ?></p>
</div>
</div>
</div><br>

</td>
</tr>

</table>


<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
 
