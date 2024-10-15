<?php
include 'uppart.php'; 
include 'dbconnection.php';
$full_name= $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];

if (isset($_POST['register'])) {
//set full name in session variable
$_SESSION["full_name"] = $full_name;

$full_name = mysqli_real_escape_string($conn, trim($_POST["full_name"]));
$email_address=mysqli_real_escape_string($conn, trim($_POST["email_address"]));
$user_pass=mysqli_real_escape_string($conn, trim($_POST["user_pass"]));
$con_pass=mysqli_real_escape_string($conn, trim($_POST["con_pass"]));

  if($user_pass===$con_pass){
      $user_pass=md5($user_pass);
     //creating token
      $token=bin2hex(random_bytes(15));

      $sql = "INSERT INTO registration (full_name,email_address,user_pass,token,status) VALUES('$full_name','$email_address','$user_pass','$token','active')";

        if(mysqli_query($conn,$sql)){

            ?>
            <script>
            alert("Thank you for the Registration");
            window.location.href = "home.php";
            </script> 
            <?php  
                                   
        }
    }
  else{
    ?>
    <script>
    alert("Registration Failed!! Due to Password Mismatch");
    window.location.href = "googlelogin.php";
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
    <title>Submission of data for the new user</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">New User</h2>
                        <p class="form-title">(Note: Please set your password)</p>
                        <form method="POST" action="" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="full_name"  placeholder="Your Name" value="<?php echo $full_name;?>" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email_address"  placeholder="Your Email" value="<?php echo $_SESSION['email_address'];?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="user_pass"  placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="con_pass"  placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register"  class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>