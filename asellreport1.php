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
      <li ><a href="ahome.php">Home</a></li><br>
        <li  ><a href="aorder.php">Order</a></li><br>
        <li><a href="amenu.php">Menu</a></li><br>
        <li><a href="ahoteltime.php">Hotel</a></li><br>
        <li><a href="ahistory.php">History</a></li><br>
        <li  class="active"><a href="asellreport.php">Sell Report</a></li><br>
        <li><a href="alogout.php">Logout</a></li><br><br>
      </ul><br>
      
    </div>
    <br>
    
    <div class="col-sm-10">
      
    <?php include'anav.php'?>

      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="height:567px;">
         
        <?php
    include'database/dbcon.php';
    if(isset($_POST['submit']))
{
  $resid=$_SESSION['resid'];
date_default_timezone_set("Asia/Calcutta");
$date = mysqli_real_escape_string($con, $_POST['date']);
$date1 = mysqli_real_escape_string($con, $_POST['date1']);
        ?>
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
           $selectquery = " SELECT sum(quantity) as sum , sum(total) as total from order1 where foodid='$id' and date BETWEEN '$date' AND '$date1' and resid='$resid'";
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
          $selectquery = " SELECT sum(total) as total,sum(quantity) as quantity,avg(price) as price,resid,orderid from order1 where date BETWEEN '$date' AND '$date1' and resid='$resid' ";
           $query= mysqli_query($con,$selectquery);
           $result =mysqli_fetch_array($query);
           $tota=$result['total'];
           $disc= $a1['discount'];
           $re=$tota-$disc;
           ?>
<tr>
                <th class="py-3 text-black"></th>
                <th class="py-3 text-black">Average Food Price : <?php echo  round($result['price'])?> Rs.</th>
                <th class="py-3 text-black">Total Quantity : <?php echo  $result['quantity']?>.</th>
                <th class="py-3 text-black">
                Total Cost : <?php echo  $tota?> Rs.<br>
                Total Discount : <?php echo  $disc?> Rs.<br>
                After Discount : <?php echo  $re?> Rs.</th>
            </tr>
        </table><br>
            <div class="row">
    <div class="col-sm-5">
  </div>
  <div class="col-sm-2">
  <a href="asellreport2.php?date=<?php echo $date?>&&date1=<?php echo $date1?>"><button class="btn btn-warning" style="padding: 10px 30px;">Print</button></a>
  </div>
  </div>

            <?php } ?>
        </div>
        </div>
      </div>
   
    </div>
  </div>
</div>

</body>
</html>




    