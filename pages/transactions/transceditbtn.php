<?php
 session_start();
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_POST['editticket']))
    {   
        date_default_timezone_set('Asia/Manila');
        
        $ticketno= $_POST['pawnticketno'];
        $id= $_POST['loan_id'];
        $datepaid= $_POST['date_pay'];
        $transac= $_POST['tranctype'];
        $amtpay= $_POST['amtpay'];
        
        $valquery = "SELECT total_amt_paid, total_amt_due FROM loantbl WHERE loan_id = '$id'";
        $vquery_run = mysqli_query($con, $valquery);
        $val = mysqli_fetch_array($vquery_run);


        if($val['total_amt_paid'] > $amtpay){
            $transact = $val['total_amt_due'] + $amtpay;
            $payupdate = $val['total_amt_paid'] - $amtpay;
        }

        if($val['total_amt_paid'] < $amtpay){
            $transact = $val['total_amt_due'] - $amtpay;
            $payupdate = $val['total_amt_paid'] + $amtpay;
        }
        
        
        $updateque = "UPDATE loantbl SET total_amt_paid='$payupdate', total_amt_due='$transact' WHERE loan_id='$id'";
        $query_run2 = mysqli_query($con, $updateque);

        $query = "UPDATE pawntickettbl SET date_paid = '$datepaid', amount_paid='$amtpay', transactiontype = '$transac' WHERE pawnticketno = '$ticketno' ";
        $query_run = mysqli_query($con, $query);

        if($query_run && $query_run2)
        {
            $_SESSION['addstatus'] = "Ticket Edited Successfully!";
            header("Location:transaction.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }

?>
