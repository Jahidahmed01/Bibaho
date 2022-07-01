<?php
  session_start();
  $_SESSION['isloggedin'] = "no";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        text-align: center;
        
        padding-right: 150px;
      }
      button{
        margin-bottom: 15px;
        background-color: black;
        color: white;
        
      }
      
      
      body{
    background-image: url("cover.png");
    }
    .white{
      color:white;
    }

    </style>
    
</head>
<body>
  <ul>
    <li><a class="active" href="home.php">Home</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="signup.php">Signup</a></li>
    <li><a href="#about">About</a></li>
  </ul>
    <h2 class="white">Login Form</h2>

    <form method="post">
      <label for="fname" class="white">Email:</label><br>
      <input type="email"  name="email"placeholder="Type your email" ><br>
      <label for="lname" class="white">Password:</label><br>
      <input type="password"  name="pswd" placeholder= "Type your password" ><br><br>
      <button type="submit" name="login">Login</button>
    </form>
    <?php
      if(isset($_POST['login'])){
        include 'connection.php';

        $email=$_POST['email'];
        $pswd=$_POST['pswd'];

        $query = "SELECT* FROM user where email = '$email' AND password = '$pswd'";
               $table = mysqli_query($con,$query);
               $user = mysqli_fetch_array($table);

        $query = "SELECT* FROM admin where email = '$email' AND password = '$pswd'";
               $table = mysqli_query($con,$query);
               $admn = mysqli_fetch_array($table);

               if($user){
                //echo"Successfully logged in";
                $_SESSION['isloggedin'] = "yes";
                $_SESSION['user'] = "user";
                $_SESSION['id'] = $user['user_id'];
                header('Location: user/user.php');
              }
              else if($admn){
                $_SESSION['isloggedin'] = "yes";
                $_SESSION['user'] = "admin";
                $_SESSION['id'] = $admn['id'];
                header('Location: admin/home.php');
                 }
                else{
                echo"<p style= 'color:red' >wrong email or password </p>";
              }
      }
      
    ?>
</body>
</html>
