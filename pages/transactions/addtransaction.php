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
      
        $transac = $row['total_amt_due'] - $amt_paid;
        $payupdate = $row['total_amt_paid'] + $amt_paid;
            

            if($transc_type == "Redeem"){
                //UPDATE PAYMENT
                if($transac == 0){
                    $query = "INSERT INTO pawntickettbl (pawnticketno, loan_id, date_paid, amount_paid, transactiontype) VALUES (NULL, '$loanid', '$date', '$amt_paid', '$transc_type')";
                    $query_run = mysqli_query($con, $query);

                    $updateque = "UPDATE loantbl SET loan_status='Redeemed', total_amt_paid='$payupdate', total_amt_due='0' WHERE loan_id='$loanid'";
                    $query_run2 = mysqli_query($con, $updateque);
                }if($transac > 0){
                    $_SESSION['addstatus1'] = "Payment Insufficient for Redemption";
                    header('Location: transactionbtn.php');
                }
                
                if($query_run && $query_run2){
                    $_SESSION['addstatus'] = "Ticket Added Successfully";
                    header('Location: transaction.php');
                }
    

            } 

            if($transc_type == "Renewal"){
                $query = "INSERT INTO pawntickettbl (pawnticketno, loan_id, date_paid, amount_paid, transactiontype) VALUES (NULL, '$loanid', '$date', '$amt_paid', '$transc_type')";
                $query_run = mysqli_query($con, $query);

                 
                $updateque = "UPDATE loantbl SET total_amt_paid='$payupdate', loan_status='Active Loan', total_amt_due='$transac' WHERE loan_id='$loanid'";
                $query_run2 = mysqli_query($con, $updateque);

                if($query_run && $query_run2){
                    $_SESSION['addstatus'] = "Ticket Added Successfully";
                    header('Location: transaction.php');
                }else{
                    $_SESSION['addstatus'] = "DATA NOT SAVED";
                    header('Location: transactionbtn.php');
                }
    
            }
            

        
           



        

        
    }
?>
