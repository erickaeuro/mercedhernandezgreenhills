<?php
 
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

session_start();


if(isset($_GET['id']))
{
    $stock_no = mysqli_real_escape_string ($con, $_GET['id']);

    $query = "DELETE FROM inventorytbl WHERE stock_no='$stock_no'";
    

    if(mysqli_query($con, $query))
    {
         //Time input
         date_default_timezone_set('Asia/Manila');
         $date = date('y-m-d h:i:s');

         //ID
         $id = $_SESSION['id'];

         //INSERT
         $query = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','added a stock', '$date')"; 
         $query_run = mysqli_query($con, $query);
        echo '<script> alert("Stock Deleted") </script>';
        header("Location:stocks.php?del=1");
    }
    else
    {
        echo '<script> alert("Stock Not Deleted"); </script>';
    }
}

?>