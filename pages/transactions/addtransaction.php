<?php 
    session_start();
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 

<?php

if(isset($_POST['addtransc']))
    { 
        //VARIABLES
        $transc_type = $_POST['transctype'];
        $amt_paid = $_POST['amount_paid'];
        $loanid = $_POST['loan_id'];
        $date = date("Y-m-d");

        //VALIDATION
        $validque = "SELECT * FROM loantbl WHERE loan_id='$loanid'";
        $validqueres = mysqli_query($con, $validque);
        $row = mysqli_fetch_array($validqueres);



        //NAME VALIDATION

            $query = "INSERT INTO pawntickettbl (pawnticketno, loan_id, date_paid, amount_paid, transactiontype) VALUES (NULL, '$loanid', '$date', '$amt_paid', '$transc_type')";
            $query_run = mysqli_query($con, $query);

            //UPDATE PAYMENT
            $payupdate = $row['total_amt_paid'] + $amt_paid;
            $query2 = "UPDATE loantbl SET total_amt_paid='$payupdate' WHERE loan_id='$loanid'";
            $query_run2 = mysqli_query($con, $query2);

            if($transc_type == "Redeem"){
                $updateque = "UPDATE loantbl SET loan_status='Redeemed' WHERE loan_id='$loanid'";
                $query_run3 = mysqli_query($con, $updateque);

            } if($transc_type == "Renewal"){
                $updateque = "UPDATE loantbl SET loan_status='Active Loan' WHERE loan_id='$loanid'";
                $query_run3 = mysqli_query($con, $updateque);
            }
            

        
            if($query_run && $query_run2){
                $_SESSION['addstatus'] = "Ticket Added Successfully";
                header('Location: transaction.php');
            }else{
                $_SESSION['addstatus'] = "DATA NOT SAVED";
                header('Location: transactionbtn.php');
            }




        

        
    }
?>
