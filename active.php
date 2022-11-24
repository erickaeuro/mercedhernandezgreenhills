<?php

$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

include('edituser.php');

if(isset($_GET['id']))
{
    $redid = mysqli_real_escape_string ($con, $_GET['id']);

    //$query = "DELETE FROM users WHERE id='$redid'";
 
    $status = $_POST['status'];

    if($status == "Active"){

    $query = "UPDATE users set status = 'Inactive' WHERE id='$redid'";

    if(mysqli_query($con, $query))
    {
        echo "<div class='alert alert-danger'>";
        header("Location:users.php?del=1");
    }
    else
    {
        echo '<script> alert("User not Updated"); </script>';
    }

    }

    //ELSE
    else if($status == "Inactive"){
    $query = "UPDATE users set status = 'Active' WHERE id='$redid'";

    if(mysqli_query($con, $query))
    {
        echo "<div class='alert alert-danger'>";
        header("Location:users.php?del=1");
    }
    else
    {
        echo '<script> alert("User not Updated"); </script>';
    }
    }

    
}


?>