<?php

session_start();
include 'database/dbcon.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];
    $updatequery = "update signuphotel set status='Active' where token='$token' ";

    $query = mysqli_query($con, $updatequery);

    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] ="Profile updated Successfully";
            ?>
            <script>
                location.replace("alogin.php");
            </script>
            <?php
        }else{
            $_SESSION['msg'] ="Profile updated Successfully";
            header('location:alogin.php');
        }
        }else{
            $_SESSION['msg'] ="Account not updated";
            header('location:registration.php');
        }
}
?>