<?php 
    session_start();
    
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 


<?php

if(isset($_POST['addjewelry']))
{
    $stock_no = $_POST['stock_no'];
    $item_type = $_POST['item_type'];
    $itemdescription = $_POST['itemdescription'];
    $karat_gold = $_POST['karat_gold'];
    $kindofstone = $_POST['kindofstone'];
    $weight = $_POST['weight'];
    $itemqty = $_POST['itemqty'];
    $tagprice = $_POST['tagprice'];
    $date_sold = $_POST['date_sold'];
    $date_created = $_POST['date_created'];

    $query = "INSERT INTO inventorytbl (`stock_no`,`item_type`,`itemdescription`,`karat_gold`,`kindofstone`,`weight`,`itemqty`,`tagprice`,`date_sold`,`date_created`) VALUES ('$stock_no','$item_type','$itemdescription','$karat_gold','$kindofstone','$weight','$itemqty','$tagprice','$date_sold','$date_created')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Stock Added Successfully!";
        header('Location: stocks.php');
    }
    else
    {
        echo '<script> alert("Stock not Added!"); </script>';
    }
}

?>


