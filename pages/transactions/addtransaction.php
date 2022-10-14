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
        $datepaid = $_POST['date_paid'];
        $loanid = $_POST['loan_id'];
        $date = date("Y-m-d");

        //VALIDATION
        $validque = "SELECT * FROM loantbl INNER JOIN customertbl ON loantbl.customer_no = customertbl.customer_no WHERE loantbl.loan_id='$loanid'";
        $validqueres = mysqli_query($con, $validque);
        $row = mysqli_fetch_array($validqueres);

        $fullnameval1 = "$row\['first_name'\] $row\['last_name'\]";
        $nameval1 = strtolower()

        if()


        

        $query = ;
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
        $_SESSION['addstatus'] = "Ticket Added Successfully";
        header('Location: pawnticket.php');
        }
        else
        {
            $_SESSION['addstatus'] = "DATA NOT SAVED";
            header('Location: pawnticketbtn.php');
        }
    }
?>
