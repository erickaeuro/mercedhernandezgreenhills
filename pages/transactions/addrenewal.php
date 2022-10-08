<?php 
    session_start();
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 

<?php

if(isset($_POST['addrenewal']))
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
        $service_charge = $_POST['service_charge'];
        $total_amount_due = $_POST['total_amount_due'];
        $renewal_amnt = $_POST['renewal_amnt'];
        


        //UPDATE TICKET
        $query1 = "UPDATE pawntickettbl SET dateloangranted='$dateloangranted', maturity_date='$maturity_date', expiry_date='$expiry_date', description = '$description', appraised_value='$appraised_value',principal='$principal', interest='$interest', penalty ='$penalty', transactiontype='Renewal' WHERE pawnticketno='$pawnticketno'";
        $query_run1 = mysqli_query($con, $query1);
        //INSERT TO RENEWAL TABLE
        $query = "INSERT INTO renewaltbl (renewalid, pawnticketno, service_charge, total_amount_due, renewal_amnt, status) VALUES (NULL, '$pawnticketno','$service_charge','$total_amount_due','$renewal_amnt','1')";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
            if($query_run1){ 
                echo '<script> alert("Data Saved"); </script>';
                header('Location: renewal.php');
               }
        }
        else
        {
            $_SESSION['addstatus'] = "DATA NOT SAVED";
            header('Location: renewalbtn.php');
        }
    }
?>