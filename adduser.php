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


if(isset($_POST['adduser']))
{
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = encrypthis($pass, $key);
        $email = $_POST['email'];
        $cname = $_POST['cname'];
        $contactno = $_POST['contactno'];
        $address = $_POST['address'];
        $usertype = $_POST['usertype'];
        $status = $_POST['status'];


    $equery = "SELECT * FROM users WHERE email='$emailadd' ";
    $equery_run = mysqli_query($con, $equery);
    if(mysqli_num_rows($equery_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: users.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO users (username, password, email, cname, contactno, address, usertype, status) VALUES ('$uname','$pass','$emailadd','$cname','$contactno','$address','$usertype','Active')";
            $query_run = mysqli_query($con, $query);
            


            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "User Added Successfully";
                $_SESSION['status_code'] = "success";
                header('Location: users.php');
            }
            else 
            {
                $_SESSION['status'] = "User Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: users.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: users.php');  
        }
    }

}

?>
