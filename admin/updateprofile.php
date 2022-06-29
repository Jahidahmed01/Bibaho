<?php
  session_start();
  if($_SESSION['isloggedin'] == "no"){
    header('Location: ../login.php');
  }
  
  if($_SESSION['user'] != "admin"){
    header('Location: ../unauthorised.php');
  }
  $id = $_SESSION['id'];
  include '../connection.php';

  $query = "SELECT* FROM admin where id=$id";
               $table = mysqli_query($con,$query);
               $user = mysqli_fetch_array($table);
               $name = $user['name'];
               $email = $user['email'];
              
  
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
                <a class="nav-link" href="updatepassword.php">Update Password</a>
              </li>
              <li class="nav-item active">
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
          <h2 class="login-title">Update profile</h2>
          <form method = "Post">
            <div class="form-group">
              <label>Name:</label>
              <input type="text" class="form-control"    name="name" value= "<?php echo $name;?>">
            </div>
            
            <div class="form-group">
              <label>Email:</label>
              <input type="email" class="form-control"  name="email" value= "<?php echo $email;?>">
            </div>

            

            
            
            <div class="but">
              <button type="submit" class="btn btn-primary" name="update">Update</button>

            </div>
            
          </form>
          <?php
              if(isset($_POST['update'])){
                $name=$_POST['name'];
               $email=$_POST['email'];
              

              
                $query = "UPDATE admin SET name='$name', email='$email' WHERE user=$id";

              if(mysqli_query($con,$query)){
                echo"<p style = 'color:green'>data successfully updated</p>";
              }
              else{
                echo"<p style = 'color:red'>Something is wrong!!!!</p>";
              }
              
            }

        

               ?>
        </div>
        
    
</body>
</html>
    