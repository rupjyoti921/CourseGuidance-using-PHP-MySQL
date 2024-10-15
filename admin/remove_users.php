<?php
//code to remove users from database 
include 'dbconnection.php';
if(isset($_GET['mail'])){
    $mail=mysqli_real_escape_string($conn, trim($_GET['mail']));
    $sql="DELETE FROM registration WHERE email_address= '$mail' ";
    if(mysqli_query( $conn,$sql))
       {
         ?>
         <script>
         alert("user removed successfully");  
         window.location.href = "users.php";       
         </script>
         
         <?php
       }
    else{
        ?>
         <script>
         alert("user not removed !!");  
         window.location.href = "users.php";       
         </script>
         
         <?php
    }
}

?>