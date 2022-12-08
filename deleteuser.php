<?php

$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

session_start();

if(isset($_GET['id']))
{
    $delid = mysqli_real_escape_string ($con, $_GET['id']);

    $query = "DELETE FROM users WHERE id='$delid'";
    

    if(mysqli_query($con, $query))
    {

         $_SESSION['status'] = "User Deleted!";

         //Time input
         date_default_timezone_set('Asia/Manila');
         $date = date('y-m-d h:i:s');
 
         //ID
         $id = $_SESSION['id'];
 
         //INSERT
         $query = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','deleted a user', '$date')"; 
         $query_run = mysqli_query($con, $query);
    

        header("Location:users.php?del=1");
    }
    else
    {
        echo '<script> alert("User not Deleted"); </script>';
    }

    
}


?>