<?php 
    session_start();
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 

<?php

if(isset($_POST['addtransc']))
    { 
        //DATE VARIABLES
        date_default_timezone_set('Asia/Manila');
        $one = strtotime(date("Y-m-d"). "+1 month");
        $three = strtotime(date("Y-m-d"). "+1 month");
        $today = date("Y-m-d");
        $maturity_date = date("Y-m-d", $one);
        $expiry_date = date("Y-m-d", $three);

        //VARIABLES
        $transc_type = $_POST['transctype'];
        $amt_paid = $_POST['amount_paid'];
        $renewaldue = $_POST['renewaldue'];
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

                    $updateque = "UPDATE loantbl SET loan_status='Redeemed', total_amt_paid='$payupdate', total_amt_due='0', date_loan_granted ='$today', maturity_date='$maturity_date', expiry_date='$expiry_date' WHERE loan_id='$loanid'";
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
                //VALIDATION OF PAYMENT 
                if($renewaldue <= $amt_paid){

                    $query = "INSERT INTO pawntickettbl (pawnticketno, loan_id, date_paid, amount_paid, transactiontype) VALUES (NULL, '$loanid', '$date', '$amt_paid', '$transc_type')";
                    $query_run = mysqli_query($con, $query);

                    if($amt_paid ==  $row['total_amt_due']){                       
                        
                        $updateque = "UPDATE loantbl SET total_amt_paid='$payupdate', loan_status='Redeemed', date_loan_granted ='$today', maturity_date='$maturity_date', expiry_date='$expiry_date', total_amt_due='$transac' WHERE loan_id='$loanid'";

                    }else{

                        $updateque = "UPDATE loantbl SET total_amt_paid='$payupdate', loan_status='Active Loan', date_loan_granted ='$today', maturity_date='$maturity_date', expiry_date='$expiry_date', total_amt_due='$transac' WHERE loan_id='$loanid'";
                       
                    }

                    $query_run2 = mysqli_query($con, $updateque);
                    
                    if($query_run && $query_run2){
                        $_SESSION['addstatus'] = "Ticket Added Successfully";
                        header('Location: transaction.php');
                    }else{
                        $_SESSION['addstatus'] = "DATA NOT SAVED";
                        header('Location: transactionbtn.php');
                    }


                }else{
                    $_SESSION['addstatus1'] = "Amount Paid is insufficient for Renewal";
                    header('Location: transactionbtn.php');
                }
                
                
    
            }
            

        
           



        

        
    }
?>
