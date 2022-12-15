<?php 
    session_start();
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 


<?php

if(isset($_POST['addloan']))
{
    //DATE VARIABLES
    date_default_timezone_set('Asia/Manila');
    $one = strtotime(date("Y-m-d"). "+1 month");
    $three = strtotime(date("Y-m-d"). "+3 month");

    //INPUT VARIABLES
    $customerno = $_POST['customerno'];
    $description = $_POST['item_desc'];
    $type = $_POST['item_type'];
    $appraised_value = $_POST['appraised_value'];
    $principal = $_POST['principal'];
    $interest = 4;    
    $dateloangranted = date("Y-m-d");
    $maturity_date = date("Y-m-d", $one);
    $expiry_date = date("Y-m-d", $three);
    $renewdue = $principal * 0.04;


    if($appraised_value > $principal){
        
        $query = "INSERT INTO loantbl (loan_id, customer_no, item_type, item_desc, appraised_value, principal,  interest,  date_loan_granted, maturity_date, expiry_date, renewal_due, principal_due, loan_status ) 
        VALUES (NULL, '$customerno','$type','$description','$appraised_value','$principal','$interest','$dateloangranted','$maturity_date','$expiry_date','$renewdue','$principal','Active Loan')";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['addstatus'] = "Transaction Successful";
             //Time input
             date_default_timezone_set('Asia/Manila');
             $date = date('y-m-d h:i:s');

             //ID
             $id = $_SESSION['id'];

             //INSERT
             $query1 = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','added a loan', '$date')"; 
             $query_run1 = mysqli_query($con, $query1);
            header('Location: loan.php');

            if(isset($_SESSION['edit'])){
                $edit_no = $_SESSION['edit'];
                $delquery = "DELETE FROM loansample WHERE edit_no = '$edit_no'"; 
                $delqueryrun = mysqli_query($con, $delquery);
                unset($_SESSION['edit']);
            }
        }
        else
        {
            $query2 = "INSERT INTO loansample (loanid, edit_no, custno, item_type, item_desc, appraised_value, principal) VALUES (NULL, '10', '$customerno', '$type', '$description', '$appraised_value', '$principal')"; 
            $query_run2 = mysqli_query($con, $query2);


            $_SESSION['addstatus'] = "Transaction Failed";
            header('Location: loanbtn.php?edit=10');
        }
    }else{
        $query2 = "INSERT INTO loansample (loanid, edit_no, custno, item_type, item_desc, appraised_value, principal) VALUES (NULL, '10', '$customerno', '$type', '$description', '$appraised_value', '$principal')"; 
        $query_run2 = mysqli_query($con, $query2);

        $_SESSION['addstatus1'] = "Principal Should NOT be higher than the appraised Value";
            header('Location: loanbtn.php?edit=10');
    }
   
}

?>
