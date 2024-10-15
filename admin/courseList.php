<?php
include 'dbconnection.php';


//code for Extraction of course list by using course standard
if($_SERVER["REQUEST_METHOD"] == "POST"){
$standard=mysqli_real_escape_string($conn, trim($_POST['standard']));
$sql="SELECT * FROM course_details WHERE standard='$standard'";
$result=mysqli_query($conn,$sql);
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>course list</title>
  </head>

  <body>
   <div class='row'>
   <div class='col-md-3'>
  <?php
  include 'sidebar.php';
  ?>
   

  </div>
  <div class='col-md-9'>
  <h4 style="text-align:center;background-color:skyblue;margin-top:5px;"><b>Edit Your Courses</b></h4> 

  <!-- code for Filtering Course Details by standard -->
 <div style="text-align:center">
  <form class="form-inline" style="padding:7px" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
       <div class="form-group col-xs-4 ">
       <label class="mb-2 mr-sm-2" for="standard"><b>Select Standard :</b></label>
       <select  class="form-control"  name="standard" required>
       <option value="">--- Select a Standard ---</option>
       <option value="After_10th">After 10th</option>
       <option value="After_12th">After 12th</option>
       <option value="After_Graduation">After Graduation</option>
       <option value="Others_Course">Others Course</option>
       </select>
       </div>
       <div  class="mb-5 mr-sm-5"></div>
       <button  type="submit" style="float:right;margin-right:20px" name="filter_course" class="btn btn-success  ">Filter</button>
     
  </form> 
</div>
  <hr>
  
<?php if(isset($_POST['filter_course'])){ ?>

  <?php if(mysqli_num_rows($result)>0){ ?>
    <!-- showing course details in a tabular form -->
  <table  class="table table-hover table table-bordered" style="text-align:center">
        <thead style="background-color: DodgerBlue;color:white;font-size:18px">
        <th>Serial No.</th>
        <th>Course Name</th>
        <th>Course Code</th>
        <th>Course Description</th>
        <th>Edit Button</th>
        </thead>
        <?php 
        $x=1; 
            while($row=mysqli_fetch_object($result))
            { 
        ?>
        <tr>
        <td><?php echo $x;  ?></td>
        <td><?php echo $row->course_title; ?></td>
        <td><?php echo $row->course_code; ?></td>
        <td><?php echo $row->course_description; ?></td>
        <td><a href="edit_course.php?course_code=<?php echo $row->course_code; ?>" style="color:white;" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit Course" > <i  class="fa fa-edit" style="font-size:20px;padding:3px"></i></a></td>
        </tr>  
        <?php $x++ ;   
            }    ?>
    </table>
    <?php }
    else{
        ?>
         <h5 style="text-align:center;margin-top:5px">No Data Found</h5>
        <?php 
     } 
}

else{
        ?>
         <h5 style="text-align:center;margin-top:5px">Filter Standard for the data</h5>
        <?php 
}
    ?>
  </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>