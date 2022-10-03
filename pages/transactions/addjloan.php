<?php 
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 


<?php

if(isset($_POST['addjewelryloan']))
{
    $customerno = $_POST['customerno'];
    $pawnticketno = $_POST['pawnticketno'];
    $name = $_POST['name'];
    $dateloangranted = $_POST['dateloangranted'];
    $maturity_date = $_POST['maturity_date'];
    $expiry_date = $_POST['expiry_date'];
    $principal =$_POST['principal'];
    $appraised_value = $_POST['appraised_value'];
    $description = $_POST['description'];
    $interest = $_POST['interest'];
    $penalty = $_POST['penalty'];
    $redemption_amnt = $_POST['redemption_amnt'];
    $renewal_amnt = $_POST['renewal_amnt'];

    $query = "INSERT INTO jloantbl (customerno, pawnticketno, name, dateloangranted, maturity_date, expiry_date, principal, appraised_value, description, interest, penalty, redemption_amnt, renewal_amnt) VALUES ('$customerno','$pawnticketno','$name','$dateloangranted','$maturity_date','$expiry_date','$principal','$appraised_value','$description','$interest','$penalty','$redemption_amnt','$renewal_amnt')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: jloan.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>
