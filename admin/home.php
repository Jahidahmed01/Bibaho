<?php
  session_start();
  if($_SESSION['isloggedin'] == "no"){
    header('Location: ../login.php');
  }
  
  if($_SESSION['user'] != "admin"){
    header('Location: ../unauthorised.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
              <li class="nav-item  ">
                <a class="nav-link active" href="home.php  ">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="updatepassword.php">Update Password</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="updateprofile.php">Update Profile</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="alluser.php">All user</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="../logout.php" >Logout</a>
              </li>
             
            </ul>
          </nav>
          
          <h2>Welcome to Admin page</h2>
        <?php
      include ("../connection.php");
      $id=$_SESSION['id'];
      $sql="select name ,email from admin where id='$id'";
      $r=mysqli_query($con,$sql);
      $row=mysqli_fetch_array($r);
      $name=$row['name'];
      
      $email=$row['email'];
      echo "<h3> Hello I am $name </h3> <b> email: $email</b>";
      //<b> $email</b></p>";
      ?>
    
    