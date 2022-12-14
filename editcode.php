<?php
session_start();

 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

// File upload path
$stock_no = $_POST['stock_no'];
$item_type = $_POST['item_type'];
//$file_name = $_POST['file_name'];
$itemdescription = $_POST['itemdescription'];
$karat_gold = $_POST['karat_gold'];
$kindofstone = $_POST['kindofstone'];
$weight = $_POST['weight'];
$itemqty = $_POST['itemqty'];
$tagprice = $_POST['tagprice'];
$date_sold = $_POST['date_sold'];





    if(isset($_POST['editjewelry']))
    {   
    
              $query = "UPDATE inventorytbl SET item_type='$item_type',  itemdescription='$itemdescription', karat_gold='$karat_gold', kindofstone='$kindofstone', weight='$weight', itemqty='$itemqty', tagprice='$tagprice', date_sold='$date_sold' WHERE stock_no='$stock_no' ";
              $query_run = mysqli_query($con, $query);

              if($query_run){

                  $_SESSION['status'] = "Stock Edited Successfully!";

                    //Time input
                    date_default_timezone_set('Asia/Manila');
                    $date = date('y-m-d h:i:s');

                    //ID
                    $id = $_SESSION['id'];

                    //INSERT
                    $query1 = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','updated a stock', '$date')"; 
                    $query_run1 = mysqli_query($con, $query1);
            
                  
                    header('Location: stocks.php');
              }
        }
?>




