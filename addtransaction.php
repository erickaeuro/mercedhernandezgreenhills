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
        $three = strtotime(date("Y-m-d"). "+2 month");
        $today = date("Y-m-d");
        $maturity_date = date("Y-m-d", $one);
        $expiry_date = date("Y-m-d", $three);

        //VARIABLES
        $transc_type = $_POST['transctype'];
        $amt_paid = $_POST['amount_paid'];
        $renewaldue = $_POST['renewaldue'];
        $loanid = $_POST['loan_id'];
        $date = date("Y-m-d");
        $loanstat = $_POST['loanstat'];

        

        //VALIDATION
        $validque = "SELECT * FROM loantbl WHERE loan_id='$loanid'";
        $validqueres = mysqli_query($con, $validque);
        $row = mysqli_fetch_array($validqueres);


        
      
        $transac = ($row['principal_due'] + $row['renewal_due']) - $amt_paid;
        $payupdate = $row['total_amt_paid'] + $amt_paid;


            if($transc_type == "Redeem"){
                //UPDATE PAYMENT
                if($transac == 0){
                    $query = "INSERT INTO pawntickettbl (pawnticketno, loan_id, date_paid, amount_paid, transactiontype, loan_stat, renewal_paid) VALUES (NULL, '$loanid', '$date', '$amt_paid', '$transc_type', '$loanstat', '$renewaldue')";
                    $query_run = mysqli_query($con, $query);

                    $updateque = "UPDATE loantbl SET loan_status='Redeemed', total_amt_paid='$payupdate', principal_due='0', renewal_due='0',date_loan_granted ='$today', maturity_date='$maturity_date', expiry_date='$expiry_date' WHERE loan_id='$loanid'";
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
                    //MATH
                   
                    $amt_paid1 = $amt_paid - $renewaldue;
                    $newprin = $row['principal_due'] - $amt_paid1;
                    
                    $renewalreset = $newprin * 0.04;


                    if($newprin <= 0){                       
                        
                        $_SESSION['addstatus1'] = "Amount paid verified for Redemption, use Redemption Transaction type";
                        header('Location: transactionbtn.php');

                    }else{

                        $updateque = "UPDATE loantbl SET total_amt_paid='$payupdate', loan_status='Active Loan', date_loan_granted ='$today', maturity_date='$maturity_date', expiry_date='$expiry_date', principal_due = '$newprin', renewal_due='$renewalreset' WHERE loan_id='$loanid'";
                        $query_run2 = mysqli_query($con, $updateque);

                        $query = "INSERT INTO pawntickettbl (pawnticketno, loan_id, date_paid, amount_paid, transactiontype, loan_stat, renewal_paid) VALUES (NULL, '$loanid', '$date', '$amt_paid', '$transc_type', '$loanstat', '$renewaldue')";
                        $query_run = mysqli_query($con, $query);

                        if($query_run && $query_run2){
                            $_SESSION['addstatus'] = "Ticket Added Successfully";

                             //Time input
                            date_default_timezone_set('Asia/Manila');
                            $date = date('y-m-d h:i:s');

                            //ID
                            $id = $_SESSION['id'];

                            //INSERT
                            $query4 = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','added a pawn ticket', '$date')"; 
                            $query_run4 = mysqli_query($con, $query4);

                            header('Location: transaction.php');
                        }else{
                            $_SESSION['addstatus'] = "DATA NOT SAVED";
                            header('Location: transactionbtn.php');
                        }
    

                       
                    }
                    
                   

                }else{
                    $_SESSION['addstatus1'] = "Amount Paid is insufficient for Renewal";
                    header('Location: transactionbtn.php');
                }
                
                
    
            }

            if($transc_type == "null"){
                $_SESSION['addstatus1'] = "Select Transaction Type";
                    header('Location: transactionbtn.php');

            }
            

        
           



        

        
    }
?>
