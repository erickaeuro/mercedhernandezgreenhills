<?php
session_start();
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}


if(isset($_GET['id']) && isset($_GET['redid']))
{
    $renid = mysqli_real_escape_string ($con, $_GET['redid']);
    $pawntick = mysqli_real_escape_string ($con, $_GET['id']);


    //SQL RETURN QUERIES
    //--FOR PAWNTABLE--//
    $query = "SELECT * FROM pawntickettbl WHERE pawnticketno=$pawntick";
    $query_run = mysqli_query($con, $query);
    $row = mysqli_fetch_array($query_run);

    //--FOR RENEWALTBL--//
    $query1 = "SELECT * FROM renewaltbl WHERE renewalid=$renid";
    $query_run1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_array($query_run1);

    
    
    //VARIABLES
    $pawnticketno = $row['pawnticketno'];
    $expiry_date = $row['expiry_date'];
    $principal = $row['principal']; 
    $payments = $row1['renewal_amnt'];
    $status = 'Available';

    //SQL UPDATE AND INSERT QUERIES
    $insquery = "INSERT INTO auctiontbl (auctionid, pawnticketno, expiry_date, principal, payments_made, status) VALUES(NULL, '$pawnticketno', '$expiry_date', '$principal', '$payments', '$status')";
    $insquery_run = mysqli_query($con, $insquery);
   
    $renewquery = "UPDATE renewaltbl SET status='0' WHERE renewalid='$renid'";
    $renewquery_run = mysqli_query($con, $renewquery);

    $renewquery = "UPDATE pawntickettbl SET transactiontype='Auction' WHERE pawnticketno='$pawnticketno'";
    $renewquery_run = mysqli_query($con, $renewquery);





    if($renewquery_run)
    {
        $_SESSION['addstatus'] = "Ticket Moved Successfully";
        header("Location:renewal.php");
    }
    else
    {
        echo '<script> alert("Ticket not Moved"); </script>';
    }
}

?>