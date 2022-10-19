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
    $principal =$_POST['principal'];
    $interest = 5;    
    $dateloangranted = date("Y-m-d");
    $maturity_date = date("Y-m-d", $one);
    $expiry_date = date("Y-m-d", $three);


    if($appraised_value > $principal){
        
        $query = "INSERT INTO loantbl (loan_id, customer_no, item_type, item_desc, appraised_value, principal,  interest,  date_loan_granted, maturity_date, expiry_date, total_amt_due, loan_status ) 
        VALUES (NULL, '$customerno','$type','$description','$appraised_value','$principal','$interest','$dateloangranted','$maturity_date','$expiry_date','$principal','Active Loan')";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['addstatus'] = "Transaction Successful";
            header('Location: loan.php');
        }
        else
        {
            $_SESSION['addstatus'] = "Transaction Failed";
            header('Location: loanbtn.php');
        }
    }else{
        $_SESSION['addstatus1'] = "Principal Should NOT be higher than the appraised Value;";
            header('Location: loanbtn.php');
    }
   
}

?>
