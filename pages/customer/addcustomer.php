<?php 
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

 //Validate for users over 18 only
function validateBirthDate($then, $min)
{
    // $then will first be a string-date
    $then = strtotime($then);
    //The age to be over, over +18
    $min = strtotime('+18 years', $then);
    echo $min;
    if(time() < $min)  {
        die('Not 18'); 
    }
}

if(isset($_POST['addcustomer']))
{
    $customer_no = $_POST['customerno'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $address = encrypthis($address, $key);
    $cpnum = $_POST['cpnum'];
    $cpnum = encrypthis($cpnum, $key);
    $BirthDate = $_POST['birthdate'];
    $valid_id = $_POST['valid_id'];
    $valid_id = encrypthis($valid_id, $key);


    $query = "INSERT INTO customertbl (`customerno`,`name`,`address`,`cpnum`,`birthdate`,`valid_id`) VALUES ('$customerno','$name','$address','$cpnum','$BirthDate','$valid_id')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: customer.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>