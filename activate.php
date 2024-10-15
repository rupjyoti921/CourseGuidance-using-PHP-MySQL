<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name="cgs";

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
if (!$conn) {
    die("Connection failed ");
}

if(isset($_GET['token'])){
    $token=$_GET['token'];

    $updatequery="UPDATE registration SET status='active' WHERE token='$token'";
    if(mysqli_query($conn,$updatequery))
       {
           if(isset($_SESSION['msg'])){
           $_SESSION['msg']="Account has been activated !!";
           header('location:index.php');
           }
           else{
               $_SESSION['msg']="You are logged out.";
               header('location:index.php');
           }
           
          
       }
    else{
        $_SESSION['msg']="Account is not updated";
        header('location:register.php');
    }

}



?>