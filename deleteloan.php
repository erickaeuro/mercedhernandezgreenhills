<?php
 
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
session_start();

if(isset($_GET['id']))
{
    $redid = mysqli_real_escape_string ($con, $_GET['id']);

    $query = "DELETE FROM loantbl WHERE loan_id='$redid'";
    

    if(mysqli_query($con, $query))
    {
        $_SESSION['status'] = "Loan Deleted!";

        //Time input
        date_default_timezone_set('Asia/Manila');
        $date = date('y-m-d h:i:s');

        //ID
        $id = $_SESSION['id'];

        //INSERT
        $query1 = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','deleted a loan', '$date')"; 
        $query_run1 = mysqli_query($con, $query1);
      
        header("Location:loan.php?del=1");
    }

}

?>
