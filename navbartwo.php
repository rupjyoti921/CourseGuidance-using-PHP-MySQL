<nav class="navbar navbar-expand-lg navbar-light " style="background-color: white; font-size: 18px;">
    <div class="container-fluid">
    <a  id="fontcolor" class="navbar-brand" href="home.php"> Home  <i class="bi bi-house-door"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarScroll" style="margin-right: 15px;">
        <ul class="navbar-nav ms-auto my-0 my-lg-0 navbar-nav-scroll " style="--bs-scroll-height: 100px;">

          <!-- code for profile button -->
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active fontcolornav" style="color:black" href="#" id="navbarDropdownMenuLink"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/profile.png" height="30px" width="30px"/></a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item"><center><i class="bi bi-person-check-fill"></i>&nbsp;&nbsp;<?php if(isset($_SESSION['email_address'])){echo $_SESSION['full_name'];} ?></center> </a>
          <a class="dropdown-item" href="edit_profile.php" ><center><i class="bi bi-pencil"></i>&nbsp;&nbsp;Edit Profile</center></a>
          <a class="dropdown-item" ><center>
            <form action="" method="post" style="padding-bottom:10px">   
            <input type="submit" class="btn btn-danger" style="color:white" value="Logout" name="logout" class="nav-link">
            </form></center>
          </a>
          </div>
          </li>

        <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle active fontcolornav" style="color:black" href="#" id="navbarDropdownMenuLink"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses After
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="ten.php">10th</a>
          <a class="dropdown-item" href="twelve.php">12th</a>
          <a class="dropdown-item" href="graduation.php">Graduation</a>
          <a class="dropdown-item" href="other_courses.php">Other coursrs</a>
        </div>
        </li>

          <li class="nav-item">
            <a  id="fontcolor2" class="nav-link active" href="#">About us  <i class="bi bi-people"></i></a>
          </li>
          <li class="nav-item">
            <a id="fontcolor2"  class="nav-link active"  href="contact_us.php">Contact us  <i class="bi bi-chat-dots"></i></a>
          </li>
          <li class="nav-item">
            <a id="fontcolor2" class="nav-link active"  href="#">Help  <i class="bi bi-question-circle"></i></a>
          </li>

         

          <!-- below 4 li is only for space -->
          <!-- <li class="nav-item">
            <a id="fontcolor" class="nav-link active"  href="#"></a>
          </li>
          <li class="nav-item">
            <a id="fontcolor" class="nav-link active"  href="#"></a>
          </li>
          <li class="nav-item">
            <a id="fontcolor" class="nav-link active"  href="#"></a>
          </li>
          <li class="nav-item">
            <a id="fontcolor" class="nav-link active"  href="#"></a>
          </li> -->


        </ul>
      </div>
    </div>
  </nav>