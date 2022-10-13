<?php 
    session_start();
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 


<?php

if(isset($_POST['addloan']))
{
    $customerno = $_POST['customerno'];
    $description = $_POST['item_desc'];
    $type = $_POST['item_type'];
    $appraised_value = $_POST['appraised_value'];
    $principal =$_POST['principal'];
    $interest = $_POST['interest']/100;    
    $dateloangranted = $_POST['dateloangranted'];
    $maturity_date = $_POST['maturity_date'];
    $expiry_date = $_POST['expiry_date'];


    $query = "INSERT INTO loantbl (loan_id, customer_no, item_type, item_desc, appraised_value, principal,  interest,  date_loan_granted, maturity_date, expiry_date, loan_status ) VALUES (NULL, '$customerno','$type','$description','$appraised_value','$principal','$interest','$dateloangranted','$maturity_date','$expiry_date','Active Loan')";
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
}

?>
