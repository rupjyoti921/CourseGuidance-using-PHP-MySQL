<?php 
include 'uppart.php'; 
include 'dbconnection.php';

//coding for extract course data after class graduation
$query="SELECT * FROM course_details WHERE standard='After_Graduation' ORDER BY course_title ASC ";
$result=mysqli_query($conn,$query);

//code for extract course description from database 
if(isset($_GET['course_code'])){

  $course_code=mysqli_real_escape_string($conn, trim($_GET['course_code']));
  $course_des="SELECT * FROM course_details WHERE course_code='$course_code'";
  $result_course_des=mysqli_query($conn,$course_des);
  $row2=mysqli_fetch_object( $result_course_des);


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
    
    <title>Courses After Graduation</title>
  
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
<div class="col-md-2"></div>
<div class="col-md-8"><h3 style="text-align:center;background-color:#3ceb3e;">Select Courses after Graduation</h3><hr></div>
<div class="col-md-2"></div>
</div>      
      
      
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-4">
<!-- code for printing courses title in the table form --> 
<?php 
 $slno=1;
 if(mysqli_num_rows($result)>0){ ?>
<table class="table table-hover">
    <thead style="background-color:#3ceb3e;">
      <tr>
        <th style="text-align:center;font-size:18px;">Course Name</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        while($row=mysqli_fetch_object($result)){
          ?>
      <tr>
        <td style="font-size:20px;color:black;"><a style="color:black;text-decoration: none;" href="graduation.php?course_code=<?php echo $row->course_code; ?>" ><?php echo $slno ; echo ". " ; echo $row->course_title; ?></a></td>
      </tr>
      <?php 
      $slno++;
       }  ?>
    </tbody>
  </table>
  </div>
  <!-- code for printing courses description --> 
  <div class="col-md-6">
  <?php
  if(isset($_GET['course_code'])){
  ?><h3 style="text-decoration: underline;text-align:center;background-color:#3ceb3e;"><?php echo $row2->course_title; ?> </h3><br><?php 
  echo $row2->course_description; 
  }
  else{
    ?> <center><h4>Hello !!<br>Select a course to get know about more</h4></center> <?php
  }
  ?>

  </div>
  <?php }  else{
      ?>
         <center><h4>No Data Found !!</h4> </center>
      <?php
    }   ?>
 

 <div class="col-md-1"></div>
</div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>
