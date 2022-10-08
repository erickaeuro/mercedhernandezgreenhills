<?php
session_start();

 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_POST['editjewelry']))
    {   
        $stock_no = $_POST['stock_no'];
        $item_type = $_POST['item_type'];
        $itemdescription = $_POST['itemdescription'];
        $karat_gold = $_POST['karat_gold'];
        $kindofstone = $_POST['kindofstone'];
        $weight = $_POST['weight'];
        $itemqty = $_POST['itemqty'];
        $tagprice = $_POST['tagprice'];
        $date_sold= $_POST['date_sold'];

        $query = "UPDATE inventorytbl SET item_type='$item_type', itemdescription='$itemdescription', karat_gold='$karat_gold', kindofstone=' $kindofstone', weight='$weight', itemqty='$itemqty', tagprice='$tagprice', date_sold='$date_sold' WHERE stock_no='$stock_no'  ";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['status'] = "Stock Updated Successfully!";
            header("Location:stocks.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }

?>
