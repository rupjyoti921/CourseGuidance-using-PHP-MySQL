<?php
include 'uppart.php'; 
include 'dbconnection.php';
// code for store data if user is login for the first time through Gmail
$email_address=$_SESSION['email_address'];
$mailquery = "SELECT * FROM `registration` WHERE `email_address`='$email_address'"; //checking if we get data then its not first time 
$result=mysqli_query($conn,$mailquery);
if(mysqli_num_rows($result)>0)
 {
   //if we found the data then we have to store the full name in session variable so we can show that fulll name in profile icon
   $row3=mysqli_fetch_object($result);
   $_SESSION["full_name"]=$row3->full_name;
 }
 else{
  ?>
  <script>
  alert("You are login for the first time please submit your data");
  window.location.href = "googlelogin.php";
  </script> 
 <?php 
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
  
    
  <title>course guidance system</title>
  </head>
  <body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
     <!-- coding for navbar -->
     <div class="row">
       <div class="col-md-12">
          <?php include 'navbar.php'; ?>
       </div> 
    </div>
    <div class="row"><div class="col-md-12"><hr style="float: right; width:50%; color:blue;"></div>></div>  
 
    <!-- coding for home page image and text -->
   
     <div class="row">
         <div class="col-md-5">
            <center><img class="bgimg" src="img/conf.png" height="150px" width="300px" style="margin-bottom:5px;margin-top:5%;"></center>
            <h3 class="bgimg" style="color:slateblue; text-align:center; font-family: Times New Roman, Times, serif;">confused ! what to choose ?</h3><br>
            <h1 class="bgimg" id="main_heading" style="color:slateblue; text-align:center; font-family: Times New Roman, Times, serif;">Explore 500+ Courses...</h1>
            <a type="button" class="btn btn-primary btn-transition px-6" style="margin-left:auto;margin-right:auto;display:block;width:50%;font-size:20px;"  onclick="callgetstarted()">Explore Now</a>
        </div>
         <div class="col-md-7" >
         <div class="bgimg"><img  src="img/bg.png" height="100%" width="100%" style="margin-top:5px"></div>
        </div>
     </div>
    
     <!-- coding for cards -->
     <?php include 'cards.php'; ?>
     <br> <br>

     
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
      <script>
          function callgetstarted(){
            document.getElementById("getstarted").scrollIntoView({behavior: 'smooth'});
          }
      </script>
  </body>
</html>

<!-- https://htmlstream.com/front-v4.0/landing-classic-corporate.html  -->