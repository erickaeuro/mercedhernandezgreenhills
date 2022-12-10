<?php
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

	session_start();

	//Time input
	date_default_timezone_set('Asia/Manila');
	$date = date('y-m-d h:i:s');

	//ID
	$id = $_SESSION['id'];

	//INSERT
	$query = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','user logged out', '$date')"; 
	$query_run = mysqli_query($con, $query);
	
	unset($_SESSION["id"]);
	unset($_SESSION["username"]);
	session_destroy();
	header("Location: index.php");


?>