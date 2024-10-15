<?php
include 'dbconnection.php';

//code for extraction  of feedback details from database
$sql="SELECT * FROM feedback ORDER BY feedback_time DESC ";
$result=mysqli_query($conn,$sql);


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
  <title>check feedback</title>
  
  
  </head>
  <body>
  
   <div class='row'>
   <div class='col-md-3'>
     <?php
       include 'sidebar.php';
     ?>
   </div>
  <div class='col-md-9'>
  <h4 style="text-align:center;background-color:skyblue;margin-top:5px;color:black"><b>Check Feedback</b></h4>
 
  <?php if(mysqli_num_rows($result)>0){ ?>
    <!-- showing feedback details in a tabular form -->
  <table  class="table table-hover table table-bordered" style="text-align:center">
        <thead style="background-color: DodgerBlue;color:white;font-size:18px">
        <th>Serial No.</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>Feedback</th>
        <th>Date & Time</th>
        </thead>
        <?php 
        $x=1; 
            while($row=mysqli_fetch_object($result))
            { 
        ?>
        <tr>
        <td><?php echo $x;  ?></td>
        <td><?php echo $row->user_name; ?></td>
        <td><?php echo $row->user_email; ?></td>
        <td><?php echo $row->feedback; ?></td>
        <td><?php echo $row->feedback_time; ?></tr>  
        <?php $x++ ;   
            }    ?>
    </table>
    <?php } ?>

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