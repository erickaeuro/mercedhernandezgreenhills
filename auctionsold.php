<?php
 session_start();
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_GET['id']))
    {   
     
       $id = mysqli_real_escape_string($con, $_GET['id']);
       $today = date("Y-m-d");       
       

        $query = "UPDATE auctiontbl SET date_sold='$today', status='Sold' WHERE auctionid='$id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['addstatus'] = "Item Sold!!";
            header('Location: auction.php');
           
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    }
    

?>
