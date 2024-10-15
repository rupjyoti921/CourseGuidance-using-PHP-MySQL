<?php
include 'dbconnection.php';

//counting numbers of users
$users=0;
$counting1="SELECT email_address FROM registration";
$result1=mysqli_query($conn,$counting1);

while($row=mysqli_fetch_object($result1))
            { 
              $users++ ;   
            }  
//counting numbers of Active users
$active_users=0;
$counting2="SELECT email_address FROM registration WHERE status='active'";
$result2=mysqli_query($conn,$counting2);

while($row2=mysqli_fetch_object($result2))
            { 
              $active_users++ ;   
            } 


//counting numbers of Inactive users
$inactive_users=0;
$counting3="SELECT email_address FROM registration WHERE status='inactive'";
$result3=mysqli_query($conn,$counting3);

while($row3=mysqli_fetch_object($result3))
            { 
              $inactive_users++ ;   
            }
            
//counting total number of courses availabel in the database
$total_course=0;
$counting4="SELECT * FROM course_details";
$result4=mysqli_query($conn,$counting4);

while($row4=mysqli_fetch_object($result4))
        {
          $total_course++;
        }

//counting number of courses After 10th, availabel in the database
$course_after10th=0;
$counting5="SELECT * FROM course_details WHERE standard='After_10th'";
$result5=mysqli_query($conn,$counting5);

while($row5=mysqli_fetch_object($result5))
        {
          $course_after10th++;
        }

//counting number of courses After 12th, availabel in the database
$course_after12th=0;
$counting6="SELECT * FROM course_details WHERE standard='After_12th'";
$result6=mysqli_query($conn,$counting6);

while($row6=mysqli_fetch_object($result6))
        {
          $course_after12th++;
        }

//counting number of courses After Graduation, availabel in the database
$course_after_gra=0;
$counting7="SELECT * FROM course_details WHERE standard='After_Graduation'";
$result7=mysqli_query($conn,$counting7);

while($row7=mysqli_fetch_object($result7))
        {
          $course_after_gra++;
        }

//counting number of extra courses, availabel in the database
$extra_courses=0;
$counting8="SELECT * FROM course_details WHERE standard='Others_Course'";
$result8=mysqli_query($conn,$counting8);

while($row8=mysqli_fetch_object($result8))
        {
          $extra_courses++;
        }

//counting number of feedback in the database
$total_feedback=0;
$counting9="SELECT * FROM feedback ";
$result9=mysqli_query($conn,$counting9);

while($row9=mysqli_fetch_object($result9))
        {
          $total_feedback++;
        }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/style.css">
    <title>Admin Page</title>
  <style>
       h6{
         color:black;
         padding:5px;
       }
       .bgcolor{
         background-color: #71f053;
         text-align:center;
         height:130px;
         border-radius:4px;
       }
  </style>
  </head>
  <body>
   <div class='row'>
   <!-- code for side bar -->
   <div class='col-md-3'>
   <?php
        include 'sidebar.php';
   ?>
   

  </div>
  <div class='col-md-9'>
  <h4 style="text-align:center;background-color:skyblue;margin-top:5px"><b>Dashboard</b></h4>  
  <!-- Creating a row under the 9 column-->  
       <div class='row' style="padding:7px">
       <div class='col-md-3'></div>
           <div class='col-md-2'>
               <div class="bgcolor">
                <h5><b>Total User</b></h5>
                <h1><b><?php echo $users;?></b></h1>
               </div>
           </div>
           <div class='col-md-2'>
               <div  class="bgcolor">
                <h5><b>Active Account</b></h5>
                <h1><b><?php echo $active_users;?></b></h1>
               </div>
           </div>
           <div class='col-md-2'>
               <div  class="bgcolor">
                <h5><b>Inactive Account</b></h5>
                <h1><b><?php echo $inactive_users;?></b></h1>
               </div>
           </div>
           <div class='col-md-3'></div>
         </div>
  <hr>
        <!-- Again Creating a row under the 9 column-->  
         <div class='row' style="padding:7px">
         <div class="col-md-1"></div>
           <div class='col-md-2'>
               <div class="bgcolor">
                <h6><b>Total Courses</b></h6>
                <h1><b><?php echo $total_course;?></b></h1>
               </div>
           </div>
           <div class='col-md-2'>
               <div class="bgcolor">
                <h6><b>Courses After 10th</b></h6>
                <h1><b><?php echo $course_after10th;?></b></h1>
               </div>
           </div>
           <div class='col-md-2'>
               <div class="bgcolor">
                <h6><b>Courses After 12th</b></h6>
                <h1><b><?php echo $course_after12th;?></b></h1>
               </div>
           </div>
           <div class='col-md-2'>
               <div class="bgcolor">
                <h6><b>Courses After Graduation</b></h6>
                <h1><b><?php echo $course_after_gra; ?></b></h1>
               </div>
           </div>
           <div class='col-md-2'>
               <div class="bgcolor">
                <h6><b>Other Courses</b></h6>
                <h1><b><?php echo $extra_courses; ?></b></h1>
               </div>
           </div>
           <div class="col-md-1"></div>
       </div>
       <hr>
        <!-- Again Creating a row under the 9 column-->  
         <div class='row' style="padding:7px">
         <div class="col-md-5"></div>
           <div class='col-md-2'>
               <div class="bgcolor">
                <h6><b>Total Feedback</b></h6>
                <h1><b><?php echo $total_feedback;?></b></h1>
               </div>
           </div>
          <div class="col-md-5"></div>
   
  </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>