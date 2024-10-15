<?php
session_start();
include 'dbconnection.php';

if(isset($_POST['signin'])) {  


$email_address=mysqli_real_escape_string($conn, trim($_POST["email_address"]));
$user_pass=mysqli_real_escape_string($conn, trim($_POST["user_pass"]));
$user_pass=md5($user_pass);

//checking email addres is valid or not
$result = mysqli_query($conn, "SELECT * FROM registration WHERE email_address='$email_address'");
if(mysqli_num_rows($result)>0)
{       
        //fetching user name from databse
        $result = mysqli_query($conn, "SELECT full_name FROM registration WHERE email_address='$email_address'");
        $row=mysqli_fetch_object($result);
        $full_name= $row->full_name;
        
        //sql query to fetch information of registerd user and finds user match.
        $query = mysqli_query($conn, "SELECT * FROM registration WHERE email_address='$email_address' and user_pass='$user_pass' and status='active' ");
        
        $rows = mysqli_num_rows($query);
        if($rows == 1){

        //storing name and email address in the session variable
        if(isset($_REQUEST['email_address']) || isset($_REQUEST['user_pass'])){
            $e_mail=$_REQUEST['email_address'];
            $_SESSION['email_address'] = $e_mail;
            $_SESSION['full_name'] = $full_name;
            echo"<script> location.href='home.php' </script>";
        }
        }
        else
        {   
           //checking account is active or not
           $result2 = mysqli_query($conn, "SELECT status FROM registration WHERE email_address='$email_address' ");
           $rows2 = mysqli_fetch_object($result2);
           $check=$rows2->status;
           if($check=='inactive'){
                    //if session msg is set messege will be displayed in session msg variable
                    if(isset($_SESSION['msg'])){
                        echo "<script> location.href='index.php' </script> ";
                        $_SESSION['msg']="Your account is not activated yet !!";
                    }
                    //if session msg is not set it will show using javascript  alert
                    else{
                        ?>
                        <script>
                        alert("Your account is not activated yet !!");
                        window.location.href = "index.php";
                        </script> 
                        <?php   
                    }

                }
                    else{
                        //or it will show wrong password
                        ?>
                        <script>
                        alert("Wrong Password !!");
                        window.location.href = "index.php";
                        </script> 
                    <?php 
                    }
                          
   }
}
// below else part is if email is not valid
else{

    ?>
    <script>
    alert("Email id is not registered yet !!");
    window.location.href = "index.php";
    </script> 
<?php      
}
mysqli_close($conn); // Closing connection
}
?>