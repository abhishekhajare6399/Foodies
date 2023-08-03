<html>
    <head>
    <title>Foodies Partner</title>
  <link rel="icon" href="foodiesp.jpg" />
    </head>
</html>
<?php
session_start();
session_destroy();

setcookie('emailcookie','',time()-86400);
setcookie('passwordcookie','',time()-86400);
$_SESSION['msg'] ="You are Logout login Again !!!";

header('location:alogin.php');
?>