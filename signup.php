<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
    
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] ,input[type=email],input [type=file] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus,input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}


/* Add padding to container elements */
.container {
  padding: 16px;
}
.selet{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
.file{
  width: 100%;
  padding: 5px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}


</style>
<body>
  
<ul>
    <li><a class="active" href="home.php">Home</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="signup.php">Signup</a></li>
    <li><a href="#about">About</a></li>
  </ul>

<form action="signup.php"  style="border:1px solid #ccc" method="Post" enctype="multipart/form-data">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Let's set up your account,while we find Matches for you!</p>
    <hr>
    
    <label><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label><b>Address</b></label>
    <select class="selet" id="religion" name="loc">
      <option value="chittagong">Chittagong</option>
      <option value="dhaka">Dhaka</option>
      <option value="shylet">Shylet</option>
      <option value="coumilla">Coumilla</option>
    </select>

    <label><b>Mobile No</b></label>
    <input type="text" placeholder="Enter Mobile no" name="mobileno" required>


    <label><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label><b>Password</b></label>
    <input type="password" id="pass" placeholder="Enter Password" name="pass" required>

    <label><b>Religion</b></label>
    <select class="selet" id="religion" name="religion">
      <option value="muslim">Muslim</option>
      <option value="hindhu">Hindu</option>
      <option value="boddish">Buddhist</option>
      <option value="boddish">Christian</option>
    </select>

    <label><b>Gender</b></label><br>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label><br>
  
  <label for="image"><b>Picture</b></label>
  <div class="file">
    <input type="file" id="image" name="pic">
  </div>

  <label><b>Date of Birth</b></label><br>
    <input type="date" placeholder="Enter Date of Birth" name="dob" required>
  

    
  <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    
    <div class="clearfix">
      
      <button type="submit" class="btn" name="submit">Submit</button>
    </div>
  </div>
</form>

</body>
</html>

<?php

include("connection.php");

if(isset($_POST['submit']))

{

                $name=$_POST['name'];
                $loc=$_POST['loc'];
                $mobileno=$_POST['mobileno'];
                $email=$_POST['email'];
                $pass=$_POST['pass'];
                $religion=$_POST['religion'];
                $gender=$_POST['gender'];
                //$pic=$_POST['pic'];
                $dob=$_POST['dob'];

                $num=rand(10,1000);
                $user_id="".$num;

                //image upload
                $ext=explode(".",$_FILES['pic']['name']);
                $c=count($ext);
                $ext=$ext[$c-1];

                $date=date("D:M:Y");
                $time=date("h:i:s");

                $image_name=md5($date.$time);
                $image=$image_name.".".$ext;

               $query="insert into user(user_id,name,address,mobileno,email,password,religion,gender,image,dob)  
               values( $user_id,'$name','$loc','$mobileno','$email','$pass','$religion','$gender','$image','$dob')";
               $query1="insert into education(user_id)  values($user_id)";
               $query2="insert into familydetails(user_id)  values($user_id)";
               $query3="insert into personal_info(user_id)  values($user_id)";


               if(mysqli_query($con,$query))
               {
                    echo "<font color=Green> Successfully inserted!</font>";
                    mysqli_query($con,$query1);
                    mysqli_query($con,$query2);
                    mysqli_query($con,$query3);
                    if($image !=null){
                      move_uploaded_file($_FILES['pic']['tmp_name'],"uploadedimage/$image");
                    }
                }
                else
                {
                    echo "error".mysqli_error($con);
                }
            }
            
?>
