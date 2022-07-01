<?php
  session_start();
  if($_SESSION['isloggedin'] == "no"){
    header('Location: ../login.php');
  }
  
  if($_SESSION['user'] != "user"){
    header('Location: ../unauthorised.php');
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
              <li class="nav-item active ">
                <a class="nav-link" href="user.php">User</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="updatepassword.php">Update Password</a>
              </li>
              <li class="nav-item">
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
          

    </div>
    




<div class="container">  
<div class="main">
  

  <div class="right">
    
    <?php
      include ("../connection.php");
      $user_id=$_SESSION['id'];
      $sql="select name ,address,mobileno,email,image from user where user_id='$user_id'";
      $r=mysqli_query($con,$sql);
      $row=mysqli_fetch_array($r);
      $name=$row['name'];
      $image=$row['image'];
      $address=$row['address'];
      $mobileno=$row['mobileno'];
      $email=$row['email'];
      echo "<h3> Hello I am $name </h3>";
      echo "<img src='../uploadedimage/$image' height='80px' width='100px'></div> ";
      echo"<h3>Contact Information:</h3>";
      echo "<p><b>Address:</b>  $address</b>
      <br> <b>Mobile No :</b> $mobileno</b>
      <br><b> email: </b>$email</p>";
      echo "<hr/>";

      $sql1="select university,	fyear,cgpa,	college,syear,gpa	,school	,tyear,	gpa2 from education where user_id='$user_id'";
      $r=mysqli_query($con,$sql1);
      $row=mysqli_fetch_array($r);

      $university=$row['university'];
      $fyear=$row['fyear'];
      $cgpa=$row['cgpa'];

      $college=$row['college'];
      $syear=$row['syear'];
      $gpa=$row['gpa'];
  
      $school=$row['school'];
      $tyear=$row['tyear'];
      $gpas=$row['gpa2'];

      echo"<h3>Educational Information:</h3>";
      echo"<b>Highest Qualification :</b> $university</b><br>";
      echo"<b>Passing Year :</b> $fyear</b><br>";
      echo"<b>CGPA :</b> $cgpa</b>";
      echo "<hr/>";
      echo"<b>HSC :</b>$college</b><br>";
      echo"<b>Passing Year :</b> $syear</b><br>";
      echo"<b>CGPA :</b>$gpa</b>";
      echo "<hr/>";
      echo"<b>SSC :</b>$school</b><br>";
      echo"<b>Passing Year :</b>$tyear</b><br>";
      echo"<b>CGPA :</b>$gpas</b>";
      echo "<hr/>";
      echo"<h3>Family Information:</h3>";
      $sql2="select fname,foccupation,mname,moccupation,brothers,sisters,familytypes from familydetails where user_id='$user_id'";
      $r=mysqli_query($con,$sql2);
      $row=mysqli_fetch_array($r);

      $fname=$row['fname'];
      $foccupation=$row['foccupation'];
      $mname=$row['mname'];
      $moccupation=$row['moccupation'];
      $brothers=$row['brothers'];
      $sisters=$row['sisters'];
      $familytypes=$row['familytypes'];

      echo"<b>Father Name :</b>$fname</b><br>";
      echo"<b>Father Occupation :</b>$foccupation</b><br>";
      echo"<b>Mother Name :</b>$mname</b><br>";
      echo"<b>Mother Occupation :</b>$moccupation</b><br>";
      echo"<b>Number of Brothers :</b>$brothers</b><br>";
      echo"<b>Number of Sisters :</b>$sisters</b><br>";
      
      ?>
      
      


    
  </div>
</div>



</body>
</html>

    
    
</div>
</div>
      

    


    
