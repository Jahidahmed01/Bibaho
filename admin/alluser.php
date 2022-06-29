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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
              <li class="nav-item  ">
                <a class="nav-link " href="home.php  ">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="updatepassword.php">Update Password</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="updateprofile.php">Update Profile</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="alluser.php">All user</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="../logout.php" >Logout</a>
              </li>
             
            </ul>
          </nav>
          
          <div class="text-center">
                <h2>All User</h2>

          </div>
          <table class="table table-white table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date of birth</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            include '../connection.php';
            $query = "SELECT * FROM user";
            $table = mysqli_query($con,$query);
            while ($row = mysqli_fetch_array($table)){?>

        
        <tr>
            <td><?php echo $row['name'];  ?></td>
            <td><?php echo $row['email'];  ?></td>
            <td><?php echo $row['dob'];  ?></td>
            <td>
                <a class="btn btn-primary" href="edituser.php?id=<?php echo $row['user_id'];  ?>">Edit</a>
                <button class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row['user_id'];  ?>">Delete</button>
                                <!-- The Modal -->
                <div class="modal" id="myModal<?php echo $row['user_id'];  ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Delete Comfirmation!!!</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        Do you really want to delete?<b><?php echo $row['name'];  ?></b> ?
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                      <a class="btn btn-danger" href="deleteuser.php?id=<?php echo $row['user_id'];  ?>">Delete</a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      </div>

                    </div>
              </div>
        </div>
            </td>
        </tr>
        <?php } ?>
        
        </tbody>
    </table>
    
</body>
</html>