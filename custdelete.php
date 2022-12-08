<?php

$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

if (isset($_GET['id'])) {
	$delid = mysqli_real_escape_string ($con, $_GET['id']);
	$query1 = "DELETE FROM customertbl WHERE customer_no='$delid'";

	if(mysqli_query($con, $query1)){
	session_start();
	$_SESSION['custstatus'] = "Customer Deleted!";
	header('Location:customer.php?del=1');
	 //Time input
	 date_default_timezone_set('Asia/Manila');
	 $date = date('y-m-d h:i:s');

	 //ID
	 $id = $_SESSION['id'];

	 //INSERT
	 $query = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','deleted a customer', '$date')"; 
	 $query_run = mysqli_query($con, $query);
	}
	else{
		$_SESSION['custstatus'] = "Customer not deleted!";
        header('Location:customer.php?del=1');
    }
}

?>