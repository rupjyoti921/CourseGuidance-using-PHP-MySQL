<?php
session_start();

include 'dbconnection.php';

if(isset($_POST['register'])) {  

$full_name = mysqli_real_escape_string($conn, trim($_POST["full_name"]));
$email_address=mysqli_real_escape_string($conn, trim($_POST["email_address"]));
$user_pass=mysqli_real_escape_string($conn, trim($_POST["user_pass"]));
$con_pass=mysqli_real_escape_string($conn, trim($_POST["con_pass"]));

$mailquery = "SELECT email_address FROM registration WHERE email_address='$email_address'";
$result=mysqli_query($conn,$mailquery);
if(mysqli_num_rows($result)>0)
 {
    ?>
    <script>
    alert("Registration Failed!! Email address is already registered");
    window.location.href = "register.php";
    </script> 
   <?php 
 }

else if($user_pass===$con_pass){
    $user_pass=md5($user_pass);
    //creating token
    $token=bin2hex(random_bytes(15));

    $sql = "INSERT INTO registration (full_name,email_address,user_pass,token,status) VALUES('$full_name','$email_address','$user_pass','$token','inactive')";

    if(mysqli_query($conn,$sql)){
        
           // $to_email = "$email_address";
            $subject = "Email Activation";
            $body = "Mail from Localhost just for testing my project (Just Ignore it). Hello, $full_name Click here to activate your account : http://localhost/cgs/activate.php?token=$token";
            $sender_email = "From: barmanrupjyoti921@gmail.com";

            if (mail($email_address, $subject, $body, $sender_email)) {
                
             $_SESSION['msg']="Check your mail $email_address to activate your account.";
             header('location:index.php');  

            } else {
                echo "Email sending failed...";
            }


       }
   }
else {
      ?>
        <script>
        alert("Registration Failed!! Due to Password Mismatch");
        window.location.href = "register.php";
        </script> 
       <?php  
    }
}
else{
    header("Location:index.php");
}
?>