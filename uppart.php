 <?php
session_start();
if(!isset($_SESSION['email_address']) && !isset($_SESSION['full_name'])){      // ||- both compulsory, &&- one is compulsory
     echo"<script> location.href='index.php' </script>";
 } 


if(isset($_REQUEST['logout'])){
    unset($_SESSION['email_address']);
    unset($_SESSION['full_name']);
    unset($_SESSION['access_token']);
    unset($msg);
    session_destroy();
    //$_SESSION['msg']="Log Out Successful !! Thanks for visit";
    echo "<script> location.href='index.php' </script> ";
}

?>

 
    
   