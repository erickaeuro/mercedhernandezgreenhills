<?php 
    session_start();
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 

<?php

if(isset($_POST['addtransc']))
    { 
        //VARIABLES
        $custfname = $_POST['cust_fname'];
        $custlname = $_POST['cust_lname'];
        $transc_type = $_POST['transctype'];
        $amt_paid = $_POST['amount_paid'];
        $loanid = $_POST['loan_id'];
        $date = date("Y-m-d");

        //VALIDATION
        $validque = "SELECT * FROM loantbl INNER JOIN customertbl ON loantbl.customer_no = customertbl.customer_no WHERE loantbl.loan_id='$loanid'";
        $validqueres = mysqli_query($con, $validque);
        $row = mysqli_fetch_array($validqueres);

        $fname1 = $row['first_name'];
        $lname1 = $row['last_name'];
        $fullnameval1 = "$fname1 $lname1";
        $fullnameval2 = "$custfname $custlname";
        $nameval1 = strtolower($fullnameval1);
        $nameval2 = strtolower($fullnameval2);
        //END OF VALIDATION VARS

        //NAME VALIDATION
        if($nameval2 == $nameval1){
            
            $query = "INSERT INTO pawntickettbl (pawnticketno, loan_id, date_paid, amount_paid, transactiontype) VALUES (NULL, '$loanid', '$date', '$amt_paid', '$transc_type')";
            $query_run = mysqli_query($con, $query);

            //UPDATE PAYMENT
            $payupdate = $row['total_amount_paid'] + $amt_paid;
            $query2 = "UPDATE loantbl SET total_amt_paid='$payupdate' WHERE loan_id='$loanid'";
            $query_run2 = mysqli_query($con, $query2);

            if($transc_type = "Redemption"){
                $updateque = "UPDATE loantbl SET loan_status='Redeemed' WHERE loan_id='$loanid'";
            }
            

        
            if($query_run && $query_run2){
                $_SESSION['addstatus'] = "Ticket Added Successfully";
                header('Location: transaction.php');
            }else{
                $_SESSION['addstatus'] = "DATA NOT SAVED";
                header('Location: transactionbtn.php');
            }

        }else{
            $_SESSION['addstatus'] = "Customer Name Invalidated";
                header('Location: transactionbtn.php');
        }


        

        
    }
?>
