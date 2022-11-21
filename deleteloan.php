<?php
 
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}


if(isset($_GET['id']))
{
    $redid = mysqli_real_escape_string ($con, $_GET['id']);

    $query = "DELETE FROM loantbl WHERE loan_id='$redid'";
    

    if(mysqli_query($con, $query))
    {
        header("Location:loan.php?del=1");
    }

}

?>
