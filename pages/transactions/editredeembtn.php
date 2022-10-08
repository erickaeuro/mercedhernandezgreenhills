<?php
 session_start();
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_POST['editredeem']))
    {   
        $redeemid = $_POST['redeemid'];
        $pawnticketno = $_POST['pawnticketno'];
        $dateloangranted = $_POST['dateloangranted'];
        $maturity_date = $_POST['maturity_date'];
        $expiry_date = $_POST['expiry_date'];
        $principal = $_POST['principal']; 
        $interest = $_POST['interest']; 
        $penalty = $_POST['penalty']; 
        $redemption_amnt = $_POST['redemption_amnt']; 
        
        

        $query = "UPDATE pawntickettbl SET dateloangranted='$dateloangranted', maturity_date='$maturity_date', principal='$principal', interest='$interest', penalty ='$penalty' WHERE pawnticketno='$pawnticketno'";
        $query_run = mysqli_query($con, $query);
        $query2 = "UPDATE redeemtbl SET pawnticketno='$pawnticketno', redemption_amnt='$redemption_amnt' WHERE redeemid=$redeemid";
        $query_run2 = mysqli_query($con, $query2);
    
        if($query_run)
        {
           if($query_run2){ 
            $_SESSION['addstatus'] = "Ticket Edited Successfully";
            header('Location: redeem.php');
           }
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    }
    

?>
