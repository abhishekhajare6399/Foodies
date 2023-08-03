<?php
session_start();
if(!isset($_SESSION['loginid'])){
    echo "You are logged out";
    header('location:ulogin.php');
  }

include 'database/dbcon.php';
if(isset($_GET['repeat']) && isset($_GET['resid'])){
    $rep = $_GET['repeat'];
    $resid = $_GET['resid'];
    $loginid=$_SESSION['loginid'];
    $rand = rand(100000000,9999999999);
    date_default_timezone_set("Asia/Calcutta");
    $date = date("Y-m-d");
    $time= date("h:i:sa");
    $loginid=$_SESSION['loginid'];
    $selectquery = "SELECT * FROM histroy WHERE resid='$resid' and orderid='$rep'and loginid='$loginid'  ";
    $query1 = mysqli_query($con,$selectquery);
    while($result1 =mysqli_fetch_array($query1)){
      $foodid=$result1['foodid'];
      $price=$result1['price'];
      $qty=$result1['quantity'];
      $foodname=$result1['foodname'];
      $discount=$result1['discount'];
      $total=$result1['total'];
      $inst=$result1['instruction'];

      $insertquery ="insert into order1(orderid,loginid,resid,foodid,foodname,price,quantity,discount,total,date,time,instruction,status) 
    values('$rand','$loginid','$resid','$foodid','$foodname','$price','$qty','$discount','$total','$date','$time','$inst','Pending')";
      $iquery = mysqli_query($con, $insertquery);
      $insertquery1 ="insert into histroy(orderid,loginid,resid,foodid,foodname,price,quantity,discount,total,date,time,instruction,status) 
      values('$rand','$loginid','$resid','$foodid','$foodname','$price','$qty','$discount','$total','$date','$time','$inst','Pending')";
        $iquery1 = mysqli_query($con, $insertquery1);
    }
      if($iquery)
    {
      $sum = "SELECT SUM(total) as total FROM histroy where resid='$resid' and loginid='$loginid' and orderid='$rep'";
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
      }else{
        $discount='1% Discount';
        $discount1=$total*1/100;
        $total1=$total-$discount1;
      }
      $t=$total-$discount1;

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
                          <td class='total-value py-3 text-black'><div id='total'>$t Rs.</div></td>
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
                          $subject = "Foodies Patner Repeat Order";
                          $headers = "From: foodiesmitaoe@gmail.com";
                          $message = "Some Repeat the order From $name of value $t Rs.";
                          $sender_email ="From: farmagrimitaoe@gmail.com";
                             
                          if(mail($email1, $subject, $message, $sender_email)){
                          ?>
                          <script>
                            alert("Order Place Sucessfully");
                            location.replace("uhistroy.php");
                          </script>
                          <?php
                    }else{
                      ?>
                      <script>
                        alert("Email Not Sent");
                            location.replace("uhistroy.php");
                      </script>
                      <?php
                   }}}}
    }else{
      ?>
        <script>
          alert("Order Place Not Sucessfully");
          location.replace("uhistroy.php");
        </script>
        <?php
    }
    
}

if(isset($_GET['cancel']) && isset($_GET['resid'])){
    $rep = $_GET['cancel'];
    $resid = $_GET['resid'];
    $loginid=$_SESSION['loginid'];
    $updatequery = "update histroy set status='Cancel' where resid='$resid' and orderid='$rep'and loginid='$loginid'";
    $query = mysqli_query($con, $updatequery);
    $updatequery1 = "update order1 set status='Cancel' where resid='$resid' and orderid='$rep'and loginid='$loginid'";
    $query1 = mysqli_query($con, $updatequery1);
    if($query1)
    {
      ?>
        <script>
          alert("Order Cancellation Sucessfully");
          location.replace("uhistroy.php");
        </script>
        <?php
    }else{
      ?>
        <script>
          alert("Order Place Not Sucessfully");
        //   location.replace("uhistroy.php");
        </script>
        <?php
    }
}
?>