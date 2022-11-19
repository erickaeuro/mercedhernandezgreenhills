<?php include 'connection.php' ?>


<?php

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($con, "DELETE FROM inventorytbl WHERE id=$id");
	$_SESSION['message'] = "Stock deleted!"; 
	header('location: stocks.php');
}

?>