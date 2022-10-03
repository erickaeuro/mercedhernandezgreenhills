<?php
 
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}


if(isset($_GET['id']))
{
    $redid = mysqli_real_escape_string ($con, $_GET['id']);

    $query = "DELETE FROM userstbl WHERE userid='$redid'";
    

    if(mysqli_query($con, $query))
    {
        echo '<script> alert("User Deleted") </script>';
        header("Location:users.php?del=1");
    }
    else
    {
        echo '<script> alert("User not Deleted"); </script>';
    }
}

?>