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
    $today = time();
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $addressval = $_POST['address'];
    $address = encrypthis($address, $key);
    $cpnum = $_POST['cpnum'];
    $encpnum = encrypthis($cpnum, $key);
    $BirthDate = $_POST['BirthDate'];
    $AgeVal = strtotime($BirthDate. "+ 18 years");
    $valid_id = $_POST['valid_id'];
}  

//if age if 17 or younger error msg
if ($AgeVal > $today) {
    $_SESSION['custstatus'] = "Customer must be above 18 years old";
    header('Location: custadd.php');
}else{
    $query = "SELECT * FROM customertbl WHERE first_name = '$first_name' AND middle_name = '$middle_name' AND last_name = '$last_name' AND address = '$address' AND cpnum = '$cpnum' AND birthdate = '$BirthDate' AND valid_id = '$valid_id'";
    $query_run = mysqli_query($con, $query);

        if(mysqli_affected_rows($con) == 0 ){
            $valid_id = $_POST['valid_id'];
            $valid_id = encrypthis($valid_id, $key);


            $query = "INSERT INTO customertbl (customer_no,`first_name`,`middle_name`,`last_name`,`address`,`cpnum`,`birthdate`,`valid_id`) VALUES ('$customer_no','$first_name','$middle_name','$last_name','$address','$encpnum','$BirthDate','$valid_id')";
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
            
        }else{
            $_SESSION['custstatus'] = "The customer is already in the record";
            header('Location: custadd.php');
        }


    
        
}

?>