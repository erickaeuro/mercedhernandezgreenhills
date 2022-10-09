<?php
 
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}


if(isset($_GET['id']))
{
    $stock_no = mysqli_real_escape_string ($con, $_GET['id']);

    $query = "DELETE FROM customertbl WHERE customerno='$customerno'";
    

    if(mysqli_query($con, $query))
    {
        echo '<script> alert("Customer Deleted") </script>';
        header("Location:customer.php?del=1");
    }
    else
    {
        echo '<script> alert("Customer Not Deleted"); </script>';
    }
}

?>