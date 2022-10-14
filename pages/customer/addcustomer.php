<?php 
    session_start();
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 


<?php

$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';

function encrypthis($data,$key){
    $encryption_key = base64_decode($key);
    $iv =openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted. '::'. $iv);
 }

if(isset($_POST['addcustomer']))
{
    $customer_no = $_POST['customer_no'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $address = encrypthis($address, $key);
    $cpnum = $_POST['cpnum'];
    $cpnum = encrypthis($cpnum, $key);
    $BirthDate = $_POST['BirthDate'];
    $valid_id = $_POST['valid_id'];
    $valid_id = encrypthis($valid_id, $key);


    $query = "INSERT INTO customertbl (`customer_no`,`name`,`address`,`cpnum`,`birthdate`,`valid_id`) VALUES ('$customer_no','$name','$address','$cpnum','$BirthDate','$valid_id')";
    $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['custstatus'] = "Customer Successfully Added";
            header('Location: customer.php');
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }


        
}

?>