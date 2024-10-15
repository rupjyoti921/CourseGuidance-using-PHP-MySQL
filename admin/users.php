<?php
include 'dbconnection.php';


//code for Extraction of users data
$sql="SELECT * FROM registration ORDER BY full_name ASC ";
$result=mysqli_query($conn,$sql);

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
  </head>

  <body>
   <div class='row'>
   <div class='col-md-3'>
  <?php
  include 'sidebar.php';
  ?>
   

  </div>
  <div class='col-md-9'>
  <h4 style="text-align:center;background-color:skyblue;margin-top:5px"><b>Users Details</b></h4>  

  <?php if(mysqli_num_rows($result)>0){ ?>
  <table  class="table table-hover table table-bordered" style="text-align:center">
        <thead style="background-color: DodgerBlue;color:white;font-size:18px">
        <th>Serial No.</th>
        <th>Name</th>
        <th>Email Id</th>
        <th>Status</th>
        <th>Registration Date</th>
        <th>Remove Button</th>
        </thead>
        <?php 
        $x=1; 
            while($row=mysqli_fetch_object($result))
            { 
        ?>
        <tr onMouseOver="this.style.color='red'" onMouseOut="this.style.color='black'">
        <td><?php echo $x;  ?></td>
        <td><?php echo $row->full_name ?></td>
        <td><?php echo $row->email_address ?></td>

        <td <?php if($row->status=='active'){  ?>style="background-color:green;color:white;"<?php } else { ?>style="background-color:red;color:white;"<?php  }  ?> ><?php echo $row->status ?></td>

        <td><?php echo $row->reg_date ?></td>
        <td><a href="remove_users.php?mail=<?php echo $row->email_address; ?>" style="color:white;" class="btn btn-danger" ><b>Remove</b></a></td>
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