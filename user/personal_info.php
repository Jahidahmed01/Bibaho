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
  $query = "SELECT* FROM personal_info where user_id=$user_id";
                $table = mysqli_query($con,$query);
               $user = mysqli_fetch_array($table);
                $name=$user['name'];
                $email=$user['email'];
                $mobile=$user['mobileno'];
                $age=$user['age'];
                $dob=$user['dob'];
                $marital=$user['marital_status'];
                $height=$user['height'];
                $blood=$user['blood_group'];
                $religion=$user['religion'];

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
              <li class="nav-item active ">
                <a class="nav-link" href="personal_info.php">Personal_info</a>
              </li>
              <li class="nav-item  ">
                <a class="nav-link" href="familydetails.php">Familydetails</a>
              </li>
              <li class="nav-item  ">
                <a class="nav-link" href="education.php">Education</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="../logout.php">Logout</a>
              </li>
             
             
            </ul>
          </nav>
          <form method = "Post">
            <div class="form-group">
              <label>Name:</label>
              <input type="text" class="form-control" placeholder="Enter Name"   name="name" value=<?php echo $name;?>>
            </div>
            
            <div class="form-group">
              <label>Email:</label>
              <input type="email" class="form-control"  placeholder="Enter email" name="email" value=<?php echo $email;?>>
            </div>

            <div class="form-group">
              <label>Mobileno:</label>
              <input type="text" class="form-control"  placeholder="Enter mobile no" name="mobile" value=<?php echo $mobile;?>>
            </div>

            <div class="form-group">
              <label>Age:</label>
              <input type="text" class="form-control"  placeholder="Enter your age" name="age" value=<?php echo $age;?>>
            </div>

            <div class="form-group">
              <label>Date of birth:</label>
              <input type="date" class="form-control"  placeholder="Enter date of birth" name="dob" value=<?php echo $dob;?>>
            </div>
            <div class="form-group">
              <label>Marital Status:</label>
              <input type="text" class="form-control"  placeholder="Enter your age" name="marital" value=<?php echo $marital;?>>
            </div>
            <div class="form-group">
              <label>Height:</label>
              <input type="number" class="form-control"  placeholder="Enter your height" name="height" value=<?php echo $height;?>>
            </div>
            <div class="form-group">
              <label>Blood Group:</label>
              <select class="form-control" id="religion" name="blood" >
              <option value="A+" <?php if($blood=="A+"){echo "selected";} ?>>A+</option>
              <option value="A-"<?php if($blood=="A-"){echo "selected";} ?>>A-</option>
              <option value="B+"<?php if($blood=="B+"){echo "selected";} ?>>B+</option>
              <option value="B-"<?php if($blood=="B-"){echo "selected";} ?>>B-</option>
              <option value="AB+"<?php if($blood=="AB+"){echo "selected";} ?>>AB+</option>
              <option value="AB-"<?php if($blood=="AB-"){echo "selected";} ?>>AB-</option>
              <option value="O+"<?php if($blood=="O+"){echo "selected";} ?>>O+</option>
              <option value="O-"<?php if($blood=="O-"){echo "selected";} ?>>O-</option>
              
            </select>
            </div>
            <div class="form-group">
              <label>Religion:</label>
              <select class="form-control" id="religion" name="religion">
              <option value="Muslim"<?php if($religion=="Muslim"){echo "selected";} ?>>Muslim</option>
              <option value="Hindu"<?php if($religion=="Hindu"){echo "selected";} ?>>Hindu</option>
              <option value="Buddhist"<?php if($religion=="Buddhist"){echo "selected";} ?>>Buddhist</option>
              <option value="Chirstian"<?php if($religion=="Chirstian"){echo "selected";} ?>>Christian</option>
             </select>
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

                $name=$_POST['name'];
                $email=$_POST['email'];
                $mobile=$_POST['mobile'];
                $age=$_POST['age'];
                $dob=$_POST['dob'];
                $marital=$_POST['marital'];
                $height=$_POST['height'];
                $blood=$_POST['blood'];
                $religion=$_POST['religion'];
                

                

               //$query="insert into personal_info (name,	email	,mobileno	,age	,dob,	marital_status	,height	,blood_group,	religion)
               //values('$name','$email','$mobile',$age,'$dob','$marital',$height,'$blood','$religion')";

$query = "UPDATE personal_info SET name='$name', email='$email',mobileno='$mobile', age=$age, dob='$dob', marital_status='$marital', height=$height, blood_group='$blood', religion='$religion' WHERE user_id=$user_id";               


               if(mysqli_query($con,$query))
               {
                    echo "<font color=Green> Successfully updated!</font>";

                }
                else
                {
                    echo "error".mysqli_error($con);
                }
            }
            
?>
