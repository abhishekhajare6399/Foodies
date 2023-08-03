<?php 
include('database/dbcon.php');
 
$country_id = $_POST['country_id'];
$query= "select * from district where country_id='$country_id' order by name ASC";
$result= mysqli_query($con,$query);
 
while ($row= mysqli_fetch_array($result)) {
    ?>
    <option value='<?php echo $row['name'] ?>'><?php echo $row['name']; ?></option>;
<?php } ?>