<?php 
    session_start();
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 

<?php

if(isset($_POST['addpawn']))
    { 

        $customerno = $_POST['customerno'];
        $transc_type = $_POST['transc_type'];
        $dateloangranted = $_POST['dateloangranted'];
        $maturity_date = $_POST['maturity_date'];
        $expiry_date = $_POST['expiry_date'];
        $description = $_POST['description'];
        $appraised_value = $_POST['appraised_value'];
        $principal = $_POST['principal'];
        $interest = $_POST['interest'];
        $penalty = $_POST['penalty'];
        

        $query = "INSERT INTO pawntickettbl (pawnticketno, customerno, dateloangranted, maturity_date, expiry_date, description, appraised_value, principal, interest, penalty, transactiontype) VALUES (NULL,'$customerno','$dateloangranted','$maturity_date','$expiry_date','$description','$appraised_value','$principal','$interest','$penalty', '$transc_type')";
        $query_run = mysqli_query($con, $query);
    
        if($query_run)
        {
        header('Location: pawnticket.php');

        echo '<script> alert("Data Saved"); </script>';
        }
        else
        {
            $_SESSION['addstatus'] = "DATA NOT SAVED";
            header('Location: pawnticketbtn.php');
        }
    }
?>
