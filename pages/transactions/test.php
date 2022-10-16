<html>
    <body>
<?php 
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 

<?php
$connect = new PDO('mysql:host=localhost;dbname=mercedhernandezgreenhills','root', '');


$mquery = "SELECT total_amt_due, principal FROM loantbl WHERE loan_id = '1008'";
        $mquery_run = mysqli_query($con, $mquery);
        foreach($mquery_run as $run){

            $principal = $run['principal'];

            $amtdue = $run['total_amt_due'];
            $newdue = $amtdue + ($principal * 0.01);

            echo  "$principal $amtdue $newdue";
        }
?>
</body> 

</html>