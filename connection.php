<?php 

     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 

<?php
error_reporting(0);
session_start();
$connect = new PDO('mysql:host=localhost;dbname=mercedhernandezgreenhills','root', '');
include ("session.php");
?> 

