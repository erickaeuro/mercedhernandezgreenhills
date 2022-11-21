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
        $renpay = $_POST['renpay'];
        
        $valquery = "SELECT total_amt_paid, principal_due, renewal_due, loan_status FROM loantbl WHERE loan_id = '$id'";
        $vquery_run = mysqli_query($con, $valquery);
        $val = mysqli_fetch_array($vquery_run);

        $val2query = "SELECT loan_stat, amount_paid FROM pawntickettbl WHERE pawnticketno = '$ticketno'";
        $vquery_run2 = mysqli_query($con, $val2query);
        $val2 = mysqli_fetch_array($vquery_run2);

        //VARIABLE CONDTIONS
        $oldprin = $val['principal_due'] + ($val2['amount_paid'] - $renpay);
        
        if($amtpay >= $renpay){
            
            if($val2['amount_paid'] > $amtpay){
                $paydeduct = $val2['amount_paid'] - $amtpay;            
                $transact = $val['principal_due'] + $paydeduct;
                $payupdate = $val['total_amt_paid'] - ($val2['amount_paid'] - $amtpay);
                $renew = $transact * 0.04;
            }
    
            if($val2['amount_paid'] < $amtpay){
                $paydeduct = $amtpay - $renpay;
                $transact = $val['principal_due'] - $paydeduct;
                $payupdate = $val['total_amt_paid'] + ($amtpay - $val2['amount_paid'] );
                $renew = $transact * 0.04;
            }
            
        
            
            $updateque = "UPDATE loantbl SET total_amt_paid='$payupdate', principal_due='$transact', renewal_due='$renew' WHERE loan_id='$id'";
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

        }else{
            $_SESSION['addstatus'] = "Amount Pay not enough for Renewal due!";
            header("Location:transactionedit.php?id=$ticketno");
        }
    



        
    }

?>
