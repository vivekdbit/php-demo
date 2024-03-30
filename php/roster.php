<?php

session_start();

require_once('dbretrieve.php');
$query="select * from roster";
$result= mysqli_query($con, $query);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Class Roster Web App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
  </head>

  </head>
  <body>
  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha384+MdS9E5PLPuPkQsVEWyFtUVvihJpLiKuDO/n9+5dtI9Tf/8MpGdqc1BqumOq/n3h"
    crossorigin="anonymous"></script>
    
    <script 
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
    crossorigin="anonymous"></script>
    
    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
    crossorigin="anonymous"></script>

<!-- 1.Bootstrap Navbar: Navigation header for navgation and branding-->
    <nav class="navbar navbar-expand-lg navbar bg-info-subtle navbar-light ">
      <div class="container">
      <a class="navbar-brand mb-2" href="index.html"> <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        RosterConnect </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link mb-2" href="index.html"> Sign Up <span class="sr-only"></span></a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link mb-2" href="#">Roster</a>
            </li> -->
          </ul>
        </div>
      </nav>
     
 <!-- 2. Bootstrap Grid: Made up of containers, rows, columns with fully responsive flexbox -->

      <div class="container mt-5">
      <div class="col" class="text-center">
        <div class="row">

  <!-- 3. Bootstrap Alerts: Feedback messages for user interactions -->

        <?php if (isset($_SESSION['status'])) { ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Your name has been added to the roster!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label=""></button>
</div>
        <?php echo $_SESSION['status']; ?>
        </div>
  
        <?php } unset($_SESSION['status']); ?>

    
        <div class="container">
        <div class="col" class="text-center">
            <h3>  CLASS ROSTER FOR SPRING B 2024</h3>
      <div class="card-body">
        <div class="col">
          <div class="card mt-3">
 
  <!-- 4. Bootstrap Tables: Table with headers and contextual classes to color tables -->

        <table class="table table-striped table-bordered text-center">
          <tr class="table-info">
            
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Major</th>
          </tr>
          <tr>
            
        <?php
             
            while ($row= mysqli_fetch_assoc($result))
            {
        ?>
            
              <td> <?php echo $row['firstname']; ?></td>
              <td> <?php echo $row['lastname']; ?></td>
              <td> <?php echo $row['email']; ?></td>
              <td> <?php echo $row['major']; ?></td>
        </tr>
        <?php
        }
        ?>
        

        </table>
      </div>
    </div>
  </div>
</div>
</div>




  </body>
</html>
