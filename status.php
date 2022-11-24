<?php
include('connection.php');
?>
<?php

$id=$_GET['id'];
$status=$_GET['status'];

$q="update users set status = $status where id=$id";

 mysqli_query($con,$q);
header('location:users.php');
?> 

