<?php
include 'dbconnection.php';

//code for extraction of course details from database using course code (getting from course list page) 
if(isset($_GET['course_code'])){

    $course_code=mysqli_real_escape_string($conn, trim($_GET['course_code']));
    $remove="DELETE FROM course_details WHERE course_code='$course_code'";
    if(mysqli_query($conn,$remove))
      {
          ?>
                <script>
                alert("course removed successfully");
                window.location.href="remove_courses.php";
                </script>
          <?php
      }
    else{
        ?>
        <script>
        alert("Removed failed");
        window.location.href="location:remove_courses.php";
        </script>
        <?php
    }
    


}
?>