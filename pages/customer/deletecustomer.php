<?php

$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

if (isset($_GET['id'])) {
	$id = mysqli_real_escape_string ($con, $_GET['id']);
	$query = "DELETE FROM customertbl WHERE customerno='$id'";

	if(mysqli_query($con, $query)){
	header('location: customer.php?del=1');
	}
	else{
        echo '<script> alert("Customer not Deleted"); </script>';
    }
}

?>