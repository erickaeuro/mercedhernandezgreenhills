<?php
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

    if(isset($_POST['editauction']))
    {   
        $auctionid = $_POST['auctionid'];
        $pawnticketno = $_POST['pawnticketno'];
        $expiry_date = $_POST['expiry_date'];
        $principal = $_POST['principal']; 
        $payments = $_POST['payments_made'];
        $status = $_POST['status'];
        

        $query = "UPDATE auctiontbl SET auctionid='$auctionid', pawnticketno='$pawnticketno', principal='$principal', expiry_date='$expiry_date', payments_made ='$payments', status='$status' WHERE auctionid='$auctionid'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            echo '<script> alert("Data Saved"); </script>';
            header('Location: auction.php');
           
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    }
    

?>
