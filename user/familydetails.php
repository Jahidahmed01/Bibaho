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

  $query = "SELECT* FROM familydetails where user_id=$user_id";
               $table = mysqli_query($con,$query);
               $user = mysqli_fetch_array($table);
                
                $fname=$user['fname'];
                $foccupation=$user['foccupation'];

                $mname=$user['mname'];
                $moccupation=$user['moccupation'];
            
                $brothers=$user['brothers'];
                $sisters=$user['sisters'];
                $familytypes=$user['familytypes'];

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
              <li class="nav-item  active">
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
          <br>

          <form method = "Post">
            <div class="form-group">
              <label>Father Name:</label>
              <input type="text" class="form-control" placeholder="Enter your father name"   name="fname" value=<?php echo $fname;?>>
            </div>
            
            <div class="form-group">
              <label>F_Occupation:</label>
              <select class="form-control" id="religion" name="foccupation"value=<?php echo $foccupation;?>>
              <option value="doctor" <?php if($foccupation=="doctor"){echo "selected";}?>>Doctor</option>
              <option value="teacher" <?php if($foccupation=="teacher"){echo "selected";}?>>Teacher</option>
              <option value="business"<?php if($foccupation=="business"){echo "selected";}?>>Business</option>
              <option value="farmer"<?php if($foccupation=="farmer"){echo "selected";}?>>farmer</option>
            </select>
            </div>

            <div class="form-group">
              <label>Mother Name:</label>
              <input type="text" class="form-control" placeholder="Enter your mother name"   name="mname" value=<?php echo $mname;?>>
            </div>

            <div class="form-group">
              <label>M_Occupation:</label>
              <select class="form-control" id="religion" name="moccupation" value=<?php echo $moccupation;?>>
              <option value="housewife"<?php if($moccupation=="housewife"){echo "selected";}?>>Housewife</option>
              <option value="doctor"<?php if($moccupation=="doctor"){echo "selected";}?>>Doctor</option>
              <option value="teacher"<?php if($moccupation=="teacher"){echo "selected";}?>>Teacher</option>
              <option value="business"<?php if($moccupation=="business"){echo "selected";}?>>Business</option>
              <option value="farmer"<?php if($moccupation=="farmer"){echo "selected";}?>>farmer</option>
            </select>
            </div>

            
            
            <div class="form-group">
              <label>No. of Brothers:</label>
              <input type="number" class="form-control"  placeholder="Enter your numbers of brothers" name="brothers"value=<?php echo $brothers;?>>
            </div>

            
            <div class="form-group">
              <label>No. of Sisters:</label>
              <input type="number" class="form-control"  placeholder="Enter your numbers of sisters" name="sisters"value=<?php echo $sisters;?>>
            </div>

            

            <div class="form-group">
              <label>Family Types</label>
              <input type="text" class="form-control"  placeholder="Enter Family Types" name="familytypes"value=<?php echo $familytypes;?>>
            
            
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

                $fname=$_POST['fname'];
                $foccupation=$_POST['foccupation'];

                $mname=$_POST['mname'];
                $moccupation=$_POST['moccupation'];
            
                $brothers=$_POST['brothers'];
                $sisters=$_POST['sisters'];
                $familytypes=$_POST['familytypes'];
                

                

               //$query="insert into familydetails (fname,foccupation,mname,moccupation,brothers,sisters,familytypes)
               //values('$fname','$foccupation','$mname','$moccupation',$brothers,$sisters,'$familytypes')";
               $query = "UPDATE familydetails SET fname='$fname', foccupation='$foccupation',mname='$mname',moccupation='$moccupation', brothers=$brothers,  sisters=$sisters,familytypes='$familytypes'  WHERE user_id=$user_id";

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




             
             
            