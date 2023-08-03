<?php
  include'database/dbcon.php';
if(isset($_GET['date']) && isset($_GET['date1'])){
    $date = $_GET['date'];
    $date1 = $_GET['date1'];
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
    .divider-text1{
position: relative;
text-align: center;
margin-top: 5px;
margin-bottom: 5px;
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
.divider-text{
position: relative;
text-align: center;
margin-top: 5px;
margin-bottom: 5px;
padding : 0px;

}
.divider-text::after{
content: "";
position: absolute;
width: 100%;
align-items: center;
border-bottom: 5px solid rgb(11, 10, 10);
top: 10%;
left: 0;
z-index: 1;
}
.content {
      max-width: 70%;
      margin:auto;
      padding: 20px;
      border: 5px solid rgb(12, 11, 11);
    }
    .content1 {
      max-width: 70%;
      padding: 20px;
      border: 5px solid rgb(12, 11, 11);
    }

    h1{
          text-align: center;
          font-size: 20px;
          color:rgb(10, 6, 10);
        }
        p{
          text-align: center;
          font-size: 15px;
          color:rgb(10, 6, 10);
        }
        .p1{
          text-align: left;
          font-size: 18px;
          color:rgb(10, 6, 10);
        }
        .table {
            width: 100%;
            margin-bottom: 20px;
        }	
        table td, table th { border: 1px solid black; padding: 5px; }
        #meta { margin-top: 1px; width: 300px; float: right; }
#meta td { text-align: right;  }
#meta td.meta-head { text-align: left; background: gray; }
#meta td textarea { width: 100%; height: 10px; text-align: center; }

#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
#items th { background: gray; }
#items textarea { width: 80px; height: 10px; }
#items tr.item-row td { border: 1px solid black; vertical-align: top; }
#items td.description { width: 300px; }
#items td.item-name { width: 175px; }
#items td.description textarea, #items td.item-name textarea { width: 100%; }
#items td.total-line { border-right: 0; text-align: right; }
#items td.total-value { border-left: 0; padding: 10px; }
#items td.total-value textarea { height: 10px; background: none; }
#items td.balance { background: #eee; }
#items td.blank { border: 0; }

        @media print{
            #print {
                display:none;
            }
        }
        @media print {
            #PrintButton {
                display: none;
            }
        }
        
        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
  </style>
  <?php include'database/dbcon.php' ?>
</head>
<body style="display: flex;">
&nbsp;&nbsp;&nbsp;<a href="asellreport.php"><button class="btn btn-outline-success"  style="float: left;padding:10px;">Back</button></a>  

    <div class="content">
        
        <h1>FOODIES Partner</h1>
        <p>Email :<a href=""> foodiesmitaoe@gmail.com</a>.</p>
        <p class = "divider-text"></p>
        <?php
        $resid=$_SESSION['resid'];
        $selectquery1 = "SELECT * FROM  signuphotel WHERE resid='$resid' ";
      $query= mysqli_query($con,$selectquery1);
      $emailcount = mysqli_num_rows($query);
    
        $userdata = mysqli_fetch_assoc($query);
        $hotel = $userdata['hotel'];
        $address = $userdata['address'];
        $mobile = $userdata['mobile'];
        $state = $userdata['state'];
        $zip = $userdata['pincode'];
        $email = $userdata['email'];
        $city = $userdata['city'];
        $image = $userdata['image'];
        ?>
<div class="row" style="padding:px;">
    <div class="col-sm-8" style="padding:5px;">
<p1  style="padding:10px;"><?php echo $hotel;?>.</p1><br>
<p1  style="padding:10px;"><?php echo $address;?></p1><br>
<p1 style="padding:10px;"><?php echo $zip;?>.</p1><br>
<p1  style="padding:10px;"><?php echo $city;?>  <?php echo $state;?>.</p1><br>
<p1  style="padding:10px;">Mobile : <?php echo $mobile;?>.</p1><br>
<p1  style="padding:10px;">Email : <a href=""> <?php echo $email;?>.</a></p1>
        </div>
    <div class="col-sm-4" style="padding:8px;">
    <img id="image" src="<?php echo $image;?>" alt="logo" style="width: 200px; height: 125px;padding:10px;" />
    </div>
  </div>
  <p class = "divider-text"></p>
                <h1>Sell Report From Date <?php echo $date?> To <?php echo $date1 ?>.</h1>
          <table id="meta">
                <tr>
                        <td class="meta-head py-3 text-black" >From Date :</td>
                        <td><div class="due py-3 text-black" ><?php echo $date;?></div></td>
                    </tr>
                    <tr>
                        <td class="meta-head py-3 text-black" >To Date :</td>
                        <td><div class="due py-3 text-black" ><?php echo $date1;?></div></td>
                    </tr>
                </table>

                <div class="row" style="padding:px;">
    <div class="col-sm-12" style="padding:10px;">
    <table id="items">
            
            <tr>
                <th class="py-3 text-black">Food Name : </th>
                <th class="py-3 text-black">Price : </th>
                <th class="py-3 text-black">Total Quantity : </th>
                <th class="py-3 text-black">Total : </th>
            </tr>

            <?php
             include'database/dbcon.php';
      $selectquery2 = "SELECT * FROM order1 WHERE date BETWEEN '$date' AND '$date1' and resid='$resid' GROUP by order1.foodname";
      $query2 = mysqli_query($con,$selectquery2);
      while($result2 =mysqli_fetch_array($query2))
        {
           $id=$result2['foodid'];
           $selectquery = " SELECT sum(quantity) as sum , sum(total) as total from order1 where foodid='$id' and date BETWEEN '$date' AND '$date1' and resid='$resid' ";
           $query= mysqli_query($con,$selectquery);
           $result =mysqli_fetch_array($query);
        ?>
    <tr class="item-row">
        
    <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['foodname'];?>.</div></td>
            <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['price'];?> Rs.</div></td>
            <td class="total-value py-3 text-black"><div id="subtotal"><?php echo  $result['sum']?>.</div></td>
            <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result['total'];?> Rs.</div></td>
    </tr>


        
<?php }  $s1 = " SELECT sum(discount) as discount, resid,orderid from order1 where date BETWEEN '$date' AND '$date1' and resid='$resid' group by orderid";
           $q= mysqli_query($con,$s1);
           $a1 =mysqli_fetch_array($q);
 $selectquery = " SELECT sum(quantity) as sum , sum(total) as total, sum(discount) as dis, avg(price) as price,resid from order1 where date BETWEEN '$date' AND '$date1' and resid='$resid' ";
           $query= mysqli_query($con,$selectquery);
           $result =mysqli_fetch_array($query); 
           $re=$result['total']-$a1['discount'];
           ?>
<tr>
<th class="py-3 text-black"></th>
                <th class="py-3 text-black">Average Food Price : <?php echo  round($result['price'])?> Rs.</th>
                <th class="py-3 text-black">Total Quantity : <?php echo  $result['sum']?>.</th>
                <th class="py-3 text-black">
                Total Cost : <?php echo  $result['total']?> Rs.<br>
                Total Discount <?php echo  $a1['discount']?> Rs.<br>
                After Discount : <?php echo  $re?> Rs.</th>
            </tr>
        </table>

   

  <script type="text/javascript">
        function PrintPage() {
            window.print();
        }
        document.loaded = function(){
            
        }
        window.addEventListener('DOMContentLoaded', (event) => {
               PrintPage()
            setTimeout(function(){ window.close() },750)
        });
    </script>
   
</body>
</html>
   <?php
   }?>