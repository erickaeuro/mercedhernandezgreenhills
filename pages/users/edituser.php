<?php
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_POST['edituser']))
    {   
        $userid = $_POST['userid'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $emailadd = $_POST['emailadd'];
        $name = $_POST['name'];
        $contactno = $_POST['contactno'];
        $address = $_POST['address'];
        $usertype = $_POST['usertype'];

        

        $query = "UPDATE userstbl SET uname='$uname', pass='$pass', emailadd='$emailadd', name='$name', contactno='$contactno', address='$address', usertype='$usertype' WHERE userid='$userid'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:users.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }

?>
