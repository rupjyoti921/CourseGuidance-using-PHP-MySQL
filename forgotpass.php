<?php 
session_start();
include 'dbconnection.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $email_address = $_POST['email_address'];
    $mailquery = "SELECT 'email_address' FROM `registration` WHERE `email_address`='$email_address'";
    $result=mysqli_query($conn,$mailquery);
    if(mysqli_num_rows($result)>0){       
                $selectquery="SELECT token,full_name FROM registration WHERE email_address='$email_address'";
                $result=mysqli_query($conn,$selectquery);
                $row = $result->fetch_assoc();
                $token=$row["token"];
                $full_name=$row["full_name"];
                   
                        //code for sending email for reset password  with user token number
                        // $to_email = "$email_address";
                        $subject = "Reset Password";
                        $body = "Hello, $full_name Click here to Reset your Password :  http://localhost/cgs/resetpass.php?token=$token";
                        $sender_email = "From: barmanrupjyoti921@gmail.com";
            
                        if (mail($email_address, $subject, $body, $sender_email)) {
                            
                         $_SESSION['msg']="Check your mail $email_address to reset your password";
                            header('location:index.php');  
                            }
        }
    else{
        ?>
                <script>
                alert("Email is not registered yet !!");
                window.location.href = "index.php";
                </script> 
            <?php   
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>forgot password</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">


        <!-- form for reset password -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-form">
                        <h2 class="form-title">Reset Password</h2> 

                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email_address"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email_address"  placeholder="Enter Your Email" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="send_mail"  class="form-submit" value="Send Mail"/>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>