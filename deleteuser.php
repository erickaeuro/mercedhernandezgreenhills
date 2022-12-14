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

         $_SESSION['userstatus1'] = "User Deleted!";

         //Time input
         date_default_timezone_set('Asia/Manila');
         $date = date('y-m-d h:i:s');
 
         //ID
         $id = $_SESSION['id'];
 
         //INSERT
         $query1 = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','deleted a user', '$date')"; 
         $query_run1 = mysqli_query($con, $query1);
    

        header("Location:users.php?del=1");
    }
    else
    {
        $_SESSION['userstatus1'] = "User not Deleted!";
        header("Location:users.php");
    }

    
}


?>