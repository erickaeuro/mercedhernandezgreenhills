<?php
 session_start();
 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

 $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
function encrypthis($data,$key){
    $encryption_key = base64_decode($key);
    $iv =openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted. '::'. $iv);
 }


    if(isset($_POST['editcustomer']))

    {  
        $customer_no = $_POST['customer_no'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $address = encrypthis($address, $key);
        $cpnum = $_POST['cpnum'];
        $encpnum = encrypthis($cpnum, $key);
        $birthdate = $_POST['birthdate'];
        //$valid_id = $_POST['valid_id'];

        $filename = $_FILES["file"]["name"];
        $filename = encrypthis($filename, $key);
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "valid_ids/" . $filename;

        if(mysqli_affected_rows($con) == 0 ){
            //$valid_id = $_POST['valid_id'];
            //$valid_id = encrypthis($valid_id, $key);


            $query = "UPDATE customertbl SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', address='$address', cpnum='$encpnum', birthdate='$birthdate', filename='$filename' WHERE customer_no='$customer_no'";
            mysqli_query($con, $query);

            if (move_uploaded_file($tempname, $folder)) {
                echo "<h3>  Image uploaded successfully!</h3>";
                header('Location: customer.php');
            } else {
                echo "<h3>  Failed to upload image!</h3>";
            }
            
        }
    }
?>