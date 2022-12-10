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
            $_SESSION['addstatus'] = "Jewelry Sold!";
            //Time input
            date_default_timezone_set('Asia/Manila');
            $date = date('y-m-d h:i:s');

            //ID
            $id = $_SESSION['id'];

            //INSERT
            $query1 = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','Sold the Auctioned Jewelry', '$date')"; 
            $query_run1 = mysqli_query($con, $query1);
            header('Location: auction.php');
           
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    }
    

?>
