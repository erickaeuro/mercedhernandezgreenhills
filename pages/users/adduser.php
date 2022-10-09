<?php
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
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $pass = encrypthis($pass, $key);
        $emailadd = $_POST['email'];
        $name = $_POST['name'];
        $contactno = $_POST['contactno'];
        $address = $_POST['address'];
        $usertype = $_POST['usertype'];
        $userstatus = $_POST['userstatus'];


    $equery = "SELECT * FROM users WHERE emailadd='$emailadd' ";
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
            $query = "INSERT INTO users (username, password, email, name, contactno, address, usertype, userstatus) VALUES ('$uname','$pass','$emailadd','$name','$contactno','$address','$usertype','$userstatus')";
            $query_run = mysqli_query($con, $query);
            


            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: users.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
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
