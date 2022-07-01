<?php
include '../connection.php';
$user_id = $_REQUEST['id'];
$query ="DELETE FROM user WHERE user_id=$user_id";
if(mysqli_query($con,$query)) ;
    header('Location: alluser.php');

?>