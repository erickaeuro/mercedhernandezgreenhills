<?php
 session_start();
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_POST['editrenewal']))
    {   
        $renewalid = $_POST['renewalid'];
        $pawnticketno = $_POST['pawnticketno'];
        $dateloangranted = $_POST['dateloangranted'];
        $maturity_date = $_POST['maturity_date'];
        $expiry_date = $_POST['expiry_date'];
        $principal = $_POST['principal']; 
        $interest = $_POST['interest']; 
        $penalty = $_POST['penalty']; 
        $renewal_amnt = $_POST['renewal_amnt']; 
        $service_charge = $_POST['service_charge'];
        $total_amount_due = $_POST['total_amount_due'];
        
        

        $query = "UPDATE pawntickettbl SET dateloangranted='$dateloangranted', maturity_date='$maturity_date', principal='$principal', interest='$interest', penalty ='$penalty' WHERE pawnticketno='$pawnticketno'";
        $query_run = mysqli_query($con, $query);
        $query2 = "UPDATE renewaltbl SET pawnticketno='$pawnticketno', service_charge='$service_charge', renewal_amnt='$renewal_amnt', total_amount_due ='$total_amount_due' WHERE renewalid=$renewalid";
        $query_run2 = mysqli_query($con, $query2);
    
        if($query_run)
        {
           if($query_run2){ 
            $_SESSION['addstatus'] = "Ticket Edited Successfully";
            header('Location: renewal.php');
           }
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    }
    

?>
