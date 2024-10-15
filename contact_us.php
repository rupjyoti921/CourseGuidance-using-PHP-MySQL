<?php 
include 'uppart.php'; 
include 'dbconnection.php';

//submitting feedback into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $user_name = mysqli_real_escape_string($conn, trim($_POST["user_name"]));
  $user_email=mysqli_real_escape_string($conn, trim($_POST["user_email"]));
  $feedback=mysqli_real_escape_string($conn, trim($_POST["feedback"]));
 
  
  
  $entryquery = "INSERT INTO feedback (user_name,user_email,feedback) VALUES('$user_name','$user_email','$feedback')";
  if(mysqli_query($conn,$entryquery))
      {
         ?>
         <script>
           alert("Thanks for your valuable feedback");
           location.href("contact_us.php");
         </script>
         <?php

      }
    else{
        ?>
          <script>
          alert("Data submission failed");
          location.href("contact_us.php");
          </script>
        <?php
       }
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/own.css">
    <link rel="stylesheet" href="css/ten.css">
    
    <title>contact us</title>
  
  </head>

  <body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
       <!-- coding for navbar -->
     <div class="row">
       <div class="col-md-12">
         <?php include 'navbartwo.php'; ?>
       </div> 
    </div>
    <div class="row"><div class="col-md-12"><hr style="float: right; width:50%; color:blue;"></div>></div>

     <!-- coding for navbar -->
     <div class="row">
     <div class="col-md-3"></div>
     <div class="col-md-6">
     <h3 style="text-align:center;background-color:#3ceb3e;;">Please send your valuable feedback</h3><hr>
     <!-- form for update course data-->
  <form class="form-horizontal" style="padding:7px" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
       <div class="form-group">
       <label for="user name"><b>User Name :</b></label>
       <input type="text" class="form-control"  placeholder="Enter Your Name" name="user_name" id="c_title" required />
       </div> <br>

       <div class="form-group">
       <label for="user email"><b>User E-mail :</b></label>
       <input type="email" class="form-control"  placeholder="Enter Your E-mail" name="user_email" id="c_title" required />
       </div> <br>

       <div class="form-group">
       <label for="feedback"><b>Feedback :</b></label>
       <textarea  rows="6"  name="feedback" style="width:100%" placeholder="Enter Your Feedback" id="c_des" required> </textarea>
      </div> 

     <button  type="submit" style="float:right;margin-right:20px" name="send_feedback" class="btn btn-success">Send</button>
     
  </form> <br><br>
     </div>
     <div class="col-md-3"></div>
     </div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>
