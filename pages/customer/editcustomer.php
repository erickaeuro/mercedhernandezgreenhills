<?php
 session_start();
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_POST['editcustomer']))
    {   
        $customerno = $_POST['customer_no'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $cpnum = $_POST['cpnum'];
        $birthdate = $_POST['birthdate'];
        $valid_id = $_POST['valid_id'];

        $query = "UPDATE customertbl SET name='$name', address='$address', cpnum='$cpnum', birthdate='$birthdate', valid_id='$valid_id' WHERE customer_no='$customer_no'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['custstatus'] = "Successfully Edited";
            header("Location:customer.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>