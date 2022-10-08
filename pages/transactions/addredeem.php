<?php 
    session_start();
    $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
    if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 


<?php

if(isset($_POST['addredeem']))
{
    $pawnticketno = $_POST['pawnticketno'];
    $dateloangranted = $_POST['dateloangranted'];
    $maturity_date = $_POST['maturity_date'];
    $expiry_date = $_POST['expiry_date'];
    $description = $_POST['description'];
    $appraised_value = $_POST['appraised_value'];
    $principal = $_POST['principal']; 
    $interest = $_POST['interest']; 
    $penalty = $_POST['penalty']; 
    $redemption_amnt = $_POST['redemption_amnt']; 
    

    $query = "UPDATE pawntickettbl SET dateloangranted='$dateloangranted', maturity_date='$maturity_date', expiry_date='$expiry_date', description = '$description', appraised_value='$appraised_value',principal='$principal', interest='$interest', penalty ='$penalty', transactiontype='Redeem' WHERE pawnticketno='$pawnticketno'";
    $query_run = mysqli_query($con, $query);
    $query2 = "INSERT INTO redeemtbl (redeemid, pawnticketno, redemption_amnt) VALUES (NULL, '$pawnticketno', '$redemption_amnt')";
    $query_run2 = mysqli_query($con, $query2);

    if($query_run2)
    {
       if($query_run){ 
        $_SESSION['addstatus'] = "Transaction Added Successfully";
        header('Location: redeem.php');
       }
    }
    else
    {
        $_SESSION['addstatus'] = "DATA NOT SAVED";
            header('Location: redeembtn.php');
    }
}

?>