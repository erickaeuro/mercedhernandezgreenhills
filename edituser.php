<?php
session_start();
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

     if(isset($_POST['edituser']))
        {
        $userid = $_POST['id'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $emailadd = $_POST['emailadd'];
        $contactno = $_POST['contactno'];
        $address = $_POST['address'];
        $usertype = $_POST['usertype'];
        $cname = $_POST['cname'];
        $status = $_POST['status'];
        //$name = $_POST['name'];
   
        $query = "UPDATE users SET username='$uname', password='$pass', email='$emailadd', contactno='$contactno', address='$address', usertype='$usertype', cname = '$fullname', status = '$status' WHERE id='$userid'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['status'] = "User Updated Successfully!";
            header("Location:users.php");
        }
        else
        {
            echo '<script> alert("User Not Updated"); </script>';
        }
    }

?>