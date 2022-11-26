<?php
 session_start();
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_POST['editticket']))
    {   
        date_default_timezone_set('Asia/Manila');
        
        $loan_id = $_POST['loan_id'];
        $item_type = $_POST['item_type'];
        $item_desc = $_POST['item_desc'];
        $appraisal = $_POST['appraisal'];
        $principal = $_POST['principal'];
        $interest = $_POST['interest'];
        $dateloan = $_POST['date_loan'];
        $datemat = $_POST['date_mat'];
        $dateexp = $_POST['date_expire'];        
        $status = $_POST['loan_status'];
        $prindue = $_POST['principaldue'];
        
        $renewal_due = $principal * 0.04;
        

        $query = "UPDATE loantbl SET item_type='$item_type', item_desc='$item_desc', appraised_value='$appraisal', principal='$principal', renewal_due='$renewal_due', principal_due='$prindue', interest='$interest', date_loan_granted='$dateloan',
        maturity_date='$datemat', expiry_date='$dateexp',  loan_status='$status' WHERE loan_id = '$loan_id'";
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
