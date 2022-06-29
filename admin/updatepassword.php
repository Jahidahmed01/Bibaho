<?php
  session_start();
  if($_SESSION['isloggedin'] == "no"){
    header('Location: ../login.php');
  }
  
  if($_SESSION['user'] != "admin"){
    header('Location: ../unauthorised.php');
  }
  $id = $_SESSION['id'];
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
                <a class="nav-link" href="home.php  ">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active" href="updatepassword.php">Update Password</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="updateprofile.php">Update Profile</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="alluser.php">All user</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="../logout.php">Logout</a>
              </li>
             
            </ul>
          </nav>
          
          <div class="myLogin">
          <h2 class="login-title">Update password</h2>
          <form method="post">
            <div class="form-group">
              <label>Old password:</label>
              <input type="password" class="form-control"  placeholder="Enter old password" name="pass1">
            </div>
            <div class="form-group">
              <label>New password:</label>
              <input type="password" class="form-control"  placeholder="Enter new password" name="pass2">
            </div>
            <div class="form-group">
              <label>Confirm New password:</label>
              <input type="password" class="form-control"  placeholder="Confirm password" name="pass3">
            </div>

            <div class="but">
              <button type="submit" name="update" class="btn btn-primary">Update</button>

            </div>
            
          </form>
          <?php
              if(isset($_POST['update'])){
                include '../connection.php';

                //collecting email and password from form
               $pass1=$_POST['pass1'];
               $pass2=$_POST['pass2'];
               $pass3=$_POST['pass3'];

              
               
              //executing query
               $query = "SELECT* FROM admin where id=$id";
               $table = mysqli_query($con,$query);
               $admn = mysqli_fetch_array($table);
               $pass = $admn['password'];

              

               if($pass1 != $pass){
                echo"<p style= 'color:red' >Old password doesn't match </p>";
               }
               else if($pass2 != $pass3){
                echo"<p style= 'color:red' >New password doesn't match </p>";
                }

               

              else{
                  $query = "UPDATE admin SET password = '$pass2' WHERE id = $id";

                  if (mysqli_query($con,$query)){
                    echo"<p style= 'color:green' >Password successfully updated </p>";
                  }
                  
                else echo"<p style= 'color:red' >Something went wrong </p>";
              }

             }


    ?>
    </div>
          
          


    </body>
</html>
    