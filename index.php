<?php 
//code for login using Gmail....................
//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];

 
  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();
  
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['email_address'] = $data['email'];
  }

header('location:home.php');
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="img/glogin.png" ></a>';
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">


        <!-- Code for login forom  -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" style="font-size:18px" class="signup-image-link"><b>Create an account</b></a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>

                        <?php  if(isset($_SESSION['msg'])){ ?>
                        <div>
                            <p style="background-color:green;color:white;padding:1px;font-size:13px;padding:4px;margin-bottom:3px;border-radius:5px"> <?php echo $_SESSION['msg']; ?> </p>
                        </div>
                        <?php } ?> 
                        <!-- form coding-->
                        <form method="POST" action="logindata.php" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email_address"  placeholder="Your Email" required/>
                            </div>

                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="user_pass"  placeholder="Password" required/>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signin"  class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <br>
                        <a href="forgotpass.php" style="font-size:18px;color:black"><b>Forgot Password ?</b></a>

                        <div class="social-login">
                            <ul class="socials">
                                <li> <?php echo '<div>'.$login_button . '</div>'; ?></li>
                        </div>
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