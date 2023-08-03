<html>
    <head>
        <title>FOODIES</title>
        <link rel="icon" href="foodies.jpg" />
    </head>
</html>
<?php
session_start();
session_destroy();

setcookie('emailcookie','',time()-86400);
setcookie('passwordcookie','',time()-86400);
$_SESSION['msg'] ="You are Logout login Again !!!";

header('location:ulogin.php');
?>