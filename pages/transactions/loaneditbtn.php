<?php
 session_start();
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_POST['editticket']))
    {   
        $loan_id = $_POST['loan_id'];
        $item_type = $_POST['item_type'];
        $item_desc = $_POST['item_desc'];
        $appraisal = $_POST['appraisal'];
        $principal = $_POST['principal'];
        $interest = $_POST['interest']/100;
        $dateloan = $_POST['date_loan'];
        $datemat = $_POST['date_mat'];
        $dateexp = $_POST['date_expire'];        
        $totalamt = $_POST['total_amt_paid'];
        $status = $_POST['loan_status'];
        
        

        $query = "UPDATE loantbl SET item_type='$item_type', item_desc='$item_desc', appraised_value='$appraisal', principal='$principal', interest='$interest', date_loan_granted='$dateloan',
        maturity_date='$datemat', expiry_date='$dateexp', total_amt_paid='$totalamt', loan_status='$status' WHERE loan_id = '$loan_id'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['addstatus'] = "Ticket Edited Successfully!";
            header("Location:loan.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }

?>