<?php 
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 


<?php

$stock_no = $_POST['stock_no'];
$item_type = $_POST['item_type'];
$itemdescription = $_POST['itemdescription'];
$karat_gold = $_POST['karat_gold'];
$kindofstone = $_POST['kindofstone'];
$weight = $_POST['weight'];
$itemqty = $_POST['itemqty'];
$tagprice = $_POST['tagprice'];
$date_sold = $_POST['date_sold'];

if(isset($_POST['addjewelry']))
{
    echo "<div class=\"w-100 bg-warning text-center text-dark rounded p-2\">";
    if(empty($item_type)|| empty($item_type)|| empty($itemdescription)|| empty($karat_gold)|| empty($kindofstone)|| empty($weight)|| empty($itemqty)|| empty($tagprice){
        echo 'These fields are required';

    $query = "INSERT INTO inventorytbl (`stock_no`,`item_type`,`itemdescription`,`karat_gold`,`kindofstone`,`weight`,`itemqty`,`tagprice`,`date_sold`) VALUES ('$stock_no','$item_type','$itemdescription','$karat_gold','$kindofstone','$weight','$itemqty','$tagprice','$date_sold')";
    $query_run = mysqli_query($con, $query);
    }
    else{
        $query = "INSERT INTO inventorytbl (`stock_no`,`item_type`,`itemdescription`,`karat_gold`,`kindofstone`,`weight`,`itemqty`,`tagprice`,`date_sold`) VALUES ('$stock_no','$item_type','$itemdescription','$karat_gold','$kindofstone','$weight','$itemqty','$tagprice','$date_sold')";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            echo '<script> alert("Data Saved"); </script>';
            header("Location: stocks.php");
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
   
}

?>
