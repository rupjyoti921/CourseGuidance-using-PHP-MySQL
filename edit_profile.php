<?php 
include 'uppart.php'; 
include 'dbconnection.php';

//extracting user data
$email=$_SESSION['email_address'];
$sql="SELECT * FROM registration WHERE email_address='$email' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_object($result);
$token=$row->token;


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
    
    <title>edit profile</title>
  
  </head>
  <body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
     <!-- coding for navbar -->
     <div class="row">
       <div class="col-md-12">
         <?php include 'navbartwo.php'; ?>
       </div> 
    </div>
    <div class="row"><div class="col-md-12"><hr style="float: right; width:50%; color:blue;"></div>></div>
   
<!-- coding for courses after 10th -->

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<h4 style="text-align:center;">Edit your profile</h4><hr>

<form class="form-horizontal" style="padding:7px" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">

       <div class="form-group">
       <label for="full name"><b>Full Name :</b></label>
       <input type="text" class="form-control"  placeholder="Enter Your Full Name" name="full_name" value="<?php echo $row->full_name; ?>" required />
       </div> <br>

       <div class="form-group">
       <label for="Email Address"><b>Email Address :</b></label>
       <input type="email" class="form-control"  placeholder="Enter Your Email Address" name="course_code" value="<?php echo $row->email_address;?>" required />
       </div> <br>

     <button  type="submit" style="float:right;margin-right:20px" name="update" class="btn btn-success">Update</button>
     
  </form>  
</div>
<div class="col-md-4"></div>

</div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>
