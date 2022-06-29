<?php
  session_start();
  if($_SESSION['isloggedin'] == "no"){
    header('Location: ../login.php');
  }
  
  if($_SESSION['user'] != "user"){
    header('Location: ../unauthorised.php');
  }
  $user_id = $_SESSION['id'];
  include '../connection.php';

  $query = "SELECT* FROM user where user_id=$user_id";
               $table = mysqli_query($con,$query);
               $user = mysqli_fetch_array($table);
               $name = $user['name'];
               $email = $user['email'];
               $dob = $user['dob'];
               $mobileno = $user['mobileno'];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
              <li class="nav-item  ">
                <a class="nav-link" href="user.php">User</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="updatepassword.php">Update Password</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="updateprofile.php">Update Profile</a>
              </li>
              <li class="nav-item  ">
                <a class="nav-link" href="personal_info.php">Personal_info</a>
              </li>
              <li class="nav-item  ">
                <a class="nav-link" href="familydetails.php">Familydetails</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="education.php">Education</a>
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

            

            <div class="form-group">
              <label>Date of birth:</label>
              <input type="date" class="form-control"   name="dob" value= "<?php echo $dob;?>">

              <div class="form-group">
              <label>Mobile No:</label>
              <input type="text" class="form-control"   name="mobileno" value= "<?php echo $mobileno;?>">
              
            
            
            <div class="but">
              <button type="submit" class="btn btn-primary" name="update">Update</button>

            </div>
            
          </form>
          <?php
              if(isset($_POST['update'])){
                $name=$_POST['name'];
               $email=$_POST['email'];
               $dob=$_POST['dob'];
               $mobileno=$_POST['mobileno'];
              

              
                $query = "UPDATE user SET name='$name', email='$email',dob='$dob', mobileno='$mobileno' WHERE user_id=$user_id";

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