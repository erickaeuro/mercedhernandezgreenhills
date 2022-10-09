<?php include '../connection.php' ?>


<?php

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($con, "DELETE FROM customertbl WHERE id=$id");
	$_SESSION['message'] = "Customer Deleted!"; 
	header('location: customer.php');
}

?>