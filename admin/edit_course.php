<?php
include 'dbconnection.php';

//code for extraction of course details from database using course code (getting from course list page) 
if(isset($_GET['course_code'])){

    $course_code=mysqli_real_escape_string($conn, trim($_GET['course_code']));
    $extract="SELECT * FROM course_details WHERE course_code='$course_code'";
    $result=mysqli_query($conn,$extract);
    $row=mysqli_fetch_object($result);


}
//code for updation of course details
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $standard = mysqli_real_escape_string($conn, trim($_POST["standard"]));
  $course_title=mysqli_real_escape_string($conn, trim($_POST["course_title"]));
  $course_code=mysqli_real_escape_string($conn, trim($_POST["course_code"]));
  $course_description=mysqli_real_escape_string($conn, trim($_POST["course_description"]));
  
  $entryquery = "UPDATE course_details SET standard='$standard', course_title='$course_title', course_description='$course_description' WHERE course_code='$course_code'";

  if(mysqli_query($conn,$entryquery))
      {
         ?>
         <script>
           alert("Data updated successfully");
           window.location.href="courseList.php";
         </script>
         <?php

      }
    else{
        ?>
          <script>
          alert("Data updation failed");
          window.location.href="courseList.php";
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

     
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>edit course</title>
  
  
  </head>
  <body>
  
   <div class='row'>
   <div class='col-md-3'>
     <?php
       include 'sidebar.php';
     ?>
   </div>
  <div class='col-md-9'>
  <h4 style="text-align:center;background-color:skyblue;margin-top:5px;color:black"><b>Update Course Data</b></h4>

<!-- form for update course data-->
  <form class="form-horizontal" style="padding:7px" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
       <div class="form-group col-xs-4">
       <label for="standard"><b>Select Standard :</b></label>
       <select  class="form-control"  name="standard" required>
       <option value="">--- Select a Standard ---</option>
       <option value="After_10th">After 10th</option>
       <option value="After_12th">After 12th</option>
       <option value="After_Graduation">After Graduation</option>
       <option value="Others_Course">Others Course</option>
       </select>
       </div>

       <div class="form-group">
       <label for="course title"><b>Course Title :</b></label>
       <input type="text" class="form-control"  placeholder="Enter Your Course Title" name="course_title" id="c_title" required />
       </div> <br>

       <div class="form-group">
       <label for="course code"><b>Course Code :</b></label>
       <input type="text" class="form-control"  placeholder="Enter Your Course Code" name="course_code" id="c_code" readonly />
       </div> <br>

       <div class="form-group">
       <label for="course description"><b>Course Description </b>(Within 3000 characters) <b>:</b></label>
       <textarea  rows="10"  name="course_description" style="width:100%" placeholder="Enter Course Description" id="c_des" required> </textarea>
      </div> 

     <button  type="submit" style="float:right;margin-right:20px" name="editcourse" class="btn btn-success">Update</button>
     
  </form>  
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
    <script>
    document.getElementById("c_title").value =" <?php echo $row->course_title; ?>";
    document.getElementById("c_code").value =" <?php echo $row->course_code; ?>"; 
    document.getElementById("c_des").value =" <?php echo $row->course_description; ?>";
    </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>  
  </body>
</html>