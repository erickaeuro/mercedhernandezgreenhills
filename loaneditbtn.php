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
        
        date_default_timezone_set('Asia/Manila');
        $date = date('y-m-d h:i:s');

        $query = "UPDATE loantbl SET item_type='$item_type', item_desc='$item_desc', appraised_value='$appraisal', principal='$principal', renewal_due='$renewal_due', principal_due='$prindue', interest='$interest', date_loan_granted='$dateloan',
        maturity_date='$datemat', expiry_date='$dateexp',  loan_status='$status',date_created='$date' WHERE loan_id = '$loan_id'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['addstatus'] = "Ticket Edited Successfully!";
            //Time input
            date_default_timezone_set('Asia/Manila');
            $date = date('y-m-d h:i:s');

            //ID
            $id = $_SESSION['id'];

            //INSERT
            $query1 = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','Updated a Pawn Ticket', '$date')"; 
            $query_run1 = mysqli_query($con, $query1);
            header("Location:loan.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }

?>
