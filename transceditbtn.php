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

        $query = "UPDATE pawntickettbl SET date_paid = '$datepaid', amount_paid='$amtpay', transactiontype = '$transac' WHERE pawnticketno = '$ticketno' ";
        $query_run = mysqli_query($con, $query);

        if($query_run && $query_run2)
        {
            $_SESSION['addstatus'] = "Ticket Edited Successfully!";
            //Time input
            date_default_timezone_set('Asia/Manila');
            $date = date('y-m-d h:i:s');

            //ID
            $id = $_SESSION['id'];

            //INSERT
            $query1 = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','Updated a transaction', '$date')"; 
            $query_run1 = mysqli_query($con, $query1);
            header("Location:transaction.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }


?>