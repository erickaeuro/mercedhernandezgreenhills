<?php
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_POST['editticket']))
    {   
        $pawnticketno = $_POST['pawnticketno'];
        $transctype = $_POST['transactiontype'];
        $dateloan = $_POST['date_loan'];
        $datemat = $_POST['date_mat'];
        $dateexp = $_POST['date_expire'];
        $principal = $_POST['principal'];
        $interest = $_POST['interest'];
        $penalty = $_POST['penalty'];
        
        

        $query = "UPDATE pawntickettbl SET dateloangranted='$dateloan', maturity_date='$datemat', expiry_date='$dateexp', principal='$principal', interest='$interest', penalty ='$penalty', transactiontype='$transctype' WHERE pawnticketno='$pawnticketno'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:pawnticket.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }

?>
