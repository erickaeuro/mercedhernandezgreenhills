<?php
session_start();
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

if(isset($_GET['id']))
              { 
                  $stock = $_GET['id'];                  
                  $id = "UPDATE inventorytbl set move = '1' WHERE stock_no = '$stock'";
                  $query_run = mysqli_query($con, $id);


                  if($query_run){
                    $_SESSION['status'] = "Stock Moved Successfully";
                    header("Location:stocks.php");
                  }
                  
              }

                 
?>