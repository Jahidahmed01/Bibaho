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
  $query = "SELECT* FROM education where user_id=$user_id";
               $table = mysqli_query($con,$query);
               $user = mysqli_fetch_array($table);
                
                $university=$user['university'];
                $fyear=$user['fyear'];
                $cgpa=$user['cgpa'];

                $college=$user['college'];
                $syear=$user['syear'];
                $gpa=$user['gpa'];
            
                $school=$user['school'];
                $tyear=$user['tyear'];
                $gpas=$user['gpa2'];
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
              <li class="nav-item">
                <a class="nav-link" href="updatepassword.php">Update Password</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="updateprofile.php">Update Profile</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="personal_info.php">Personal_info</a>
              </li>
              <li class="nav-item  ">
                <a class="nav-link" href="familydetails.php">Familydetails</a>
              </li>
              <li class="nav-item  active">
                <a class="nav-link" href="education.php">Education</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="../logout.php">Logout</a>
              </li>
             
             
            </ul>
          </nav>
          <br>

          <form method = "Post">
            
  
            <div class="form-group">
              <label>Highest Qualification:</label>
              <input type="text" class="form-control" placeholder="Enter your university"   name="university" value=<?php echo $university;?>>
            </div>

            <div class="form-group">
              <label>Passing Year:</label>
              <input type="number" class="form-control" placeholder="Enter your Passing Year"   name="fyear" value=<?php echo $fyear;?>>
            </div>

            <div class="form-group">
              <label>CGPA:</label>
              <input type="float" class="form-control" placeholder="Enter your cgpa"   name="cgpa"value=<?php echo $cgpa;?>>
            </div>
            
            <div class="form-group">
              <label>HSC:</label>
              <input type="text" class="form-control" placeholder="Enter your college name"   name="college"value=<?php echo $college;?>>
            </div>

            <div class="form-group">
              <label>Passing Year:</label>
              <input type="number" class="form-control" placeholder="Enter your Passing Year"   name="syear"value=<?php echo $syear;?>>
            </div>

            <div class="form-group">
              <label>GPA:</label>
              <input type="float" class="form-control" placeholder="Enter your gpa"   name="gpa"value=<?php echo $gpa;?>>
            </div>

            

            <div class="form-group">
              <label>SSC:</label>
              <input type="text" class="form-control" placeholder="Enter your school name"   name="school"value=<?php echo $school;?>>
            </div>

            <div class="form-group">
              <label>Passing Year:</label>
              <input type="number" class="form-control" placeholder="Enter your Passing Year"   name="tyear"value=<?php echo $tyear;?>>
            </div>

            <div class="form-group">
              <label>GPA:</label>
              <input type="float" class="form-control" placeholder="Enter your gpa"   name="gpas"value=<?php echo $gpas;?>>
            </div>
            <div class="but">
              <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </div>
        </form>

</body>
</html>
<?php

include("../connection.php");

if(isset($_POST['submit']))

{

                $university=$_POST['university'];
                $fyear=$_POST['fyear'];
                $cgpa=$_POST['cgpa'];

                $college=$_POST['college'];
                $syear=$_POST['syear'];
                $gpa=$_POST['gpa'];
            
                $school=$_POST['school'];
                $tyear=$_POST['tyear'];
                $gpas=$_POST['gpas'];

                
                
             //$query="insert into education (university,	fyear,	sear,	cgpa,	colleyear,	gpa	,school	,tyear,	gpa2)	
              //values( '$university',$fyear,'$cgpa','$college',$syear,'$gpa','$school',$tyear,'$gpas')";

$query = "UPDATE education SET university='$university', fyear='$fyear',cgpa='$cgpa', college='$college', syear=$syear, gpa='$gpa', school='$school', tyear=$tyear, gpa2='$gpas'   WHERE user_id=$user_id";              

               if(mysqli_query($con,$query))
               {
                    echo "<font color=Green> Successfully inserted!</font>";

                }
                else
                {
                    echo "error".mysqli_error($con);
                }
            }
            
?>




             
             
            