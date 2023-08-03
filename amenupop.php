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
  </style>
    <table border='0' width='100%'>
    <tr>
<td style="padding:20px;">
<div class="row">
    <div class="col-sm-7">
    <p>Food Information :</p>
    </div>
    <div class="col-sm-3">
    
</div>
</div>
<p class = "divider-text1"></p>

<?php
include "database/dbcon.php";
 
$userid = $_POST['userid'];
 
$sql = "select * from menu  where foodid=".$userid;
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){
    $id=$row['foodid']; 
?>


<div class="row">
    <div class="col-sm-7">
    <p>Food : <?php echo $row['foodname']; ?>.</p>
    <p>Price : <?php echo $row['price']; ?> Rs.</p>
    </div>
<div class="col-sm-3">
<img src="<?php echo $row['image']; ?>" style="width:300px;height:100px;"/>
</div>
</div>
<p>Description : <?php echo $row['description']; ?>.</p>

<?php } ?>
    


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



 
