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
    //$valid_id = $_POST['valid_id'];
}  

//if age if 17 or younger error msg
if ($AgeVal > $today) {
    $_SESSION['custstatus'] = "Customer must be above 18 years old";
    header('Location: custadd.php');
}else{
    if ($_FILES["file"]["size"] >= 10485760){
        $_SESSION['status'] = "File size must be less than 10mb!";
header('Location: customer.php');
    }
   else {
    $filename = $_FILES["file"]["name"];
    $filename = encrypthis($filename, $key);
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "valid_ids/" . $filename;
    $query = "SELECT * FROM customertbl WHERE first_name = '$first_name' AND middle_name = '$middle_name' AND last_name = '$last_name' AND address = '$address' AND cpnum = '$cpnum' AND birthdate = '$BirthDate' AND filename ='$filename'";
    $query_run = mysqli_query($con, $query);

        if(mysqli_affected_rows($con) == 0 ){
            //$valid_id = $_POST['valid_id'];
            //$valid_id = encrypthis($valid_id, $key);


            $query = "INSERT INTO customertbl (customer_no,`first_name`,`middle_name`,`last_name`,`address`,`cpnum`,`birthdate`,`filename`) VALUES (NULL,'$first_name','$middle_name','$last_name','$address','$encpnum','$BirthDate','$filename')";
            mysqli_query($con, $query);

            if (move_uploaded_file($tempname, $folder)) {
                $_SESSION['status'] = "Customer added successfully!";

                  //Time input
                  date_default_timezone_set('Asia/Manila');
                  $date = date('y-m-d h:i:s');

                  //ID
                  $id = $_SESSION['id'];

                  //INSERT
                  $query1 = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','added a customer', '$date')"; 
                  $query_run1 = mysqli_query($con, $query1);
                
                header('Location: customer.php');
            } else {
                $_SESSION['status'] = "Customer not added!";
                header('Location: customer.php');
            }
            
        }else{
            $_SESSION['custstatus'] = "The customer is already in the record";
            header('Location: custadd.php');
        }
   }
}

 
?>