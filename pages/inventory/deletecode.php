<?php
 
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}


if(isset($_GET['id']))
{
    $stock_no = mysqli_real_escape_string ($con, $_GET['id']);

    $query = "DELETE FROM inventorytbl WHERE stock_no='$stock_no'";
    

    if(mysqli_query($con, $query))
    {
        echo '<script> alert("Stock Deleted") </script>';
        header("Location:stocks.php?del=1");
    }
    else
    {
        echo '<script> alert("Stock Not Deleted"); </script>';
    }
}

?>