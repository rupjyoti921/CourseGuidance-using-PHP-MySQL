<?php session_start();

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name="cgs";

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
if (!$conn) {
    die("Connection failed ");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$user_pass=mysqli_real_escape_string($conn, trim($_POST["user_pass"]));
$conn_pass=mysqli_real_escape_string($conn, trim($_POST["conn_pass"]));
$token=mysqli_real_escape_string($conn, trim($_POST["token"]));

     if($user_pass===$conn_pass){
     $user_pass=md5($user_pass);

                        $updatequery="UPDATE registration SET user_pass='$user_pass' WHERE token='$token'";
                        if(mysqli_query($conn,$updatequery))
                        {
                            ?>
                            <script>
                            alert("Password successfully updated !!");
                            window.location.href = "index.php";
                            </script> 
                           <?php     
                            
                            
                        }
                        else{

                            ?>
                            <script>
                            alert("Password Updation Failed !!");
                            window.location.href = "resetpass.php";
                            </script> 
                           <?php   
                            
                        }
                    
                
        }
    else{

            ?>
            <script>
            alert("Password updation Failed!! Due to Password Mismatch, Click on reset link again");
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
    <title>Update password</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">


        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-form">
                        <h2 class="form-title">Update Your Password</h2>

                        <?php  if(isset($_SESSION['msgg'])){ ?>
                        <div>
                            <p style="background-color:green;color:white;padding:1px;font-size:13px;padding:4px;margin-bottom:3px;border-radius:5px"> <?php echo $_SESSION['msg']; ?> </p>
                        </div>
                        <?php } ?> 

                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="user password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="user_pass"  placeholder="Enter New Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="user password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="conn_pass"  placeholder="Confirm Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="token"></label>
                                <input type="hidden" name="token" value="<?php echo $_GET['token'];?>"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="update_pass"  class="form-submit" value="Update Password"/>
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