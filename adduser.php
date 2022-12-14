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
       // $password = encrypthis($password, $key);
         $cpass = $_POST['cpass'];
       // $cpass = encrypthis($cpass, $key);
        $email = $_POST['email'];
        $cname = $_POST['cname'];
        $contactno = $_POST['contactno'];
        $address = $_POST['address'];
        $usertype = $_POST['usertype'];
        $status = $_POST['status'];


    $equery = "SELECT * FROM users WHERE email='$email' ";
    $equery_run = mysqli_query($con, $equery);
    if(mysqli_num_rows($equery_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: users.php');  
    }
    else
    {
        if($password == $cpass)
        {
            $enc_pass = md5(md5($password));
            $query = "INSERT INTO users (username, password, email, cname, contactno, address, usertype, status) VALUES ('$username','$enc_pass','$email','$cname','$contactno','$address','$usertype','Active')";
            $query_run = mysqli_query($con, $query);
            


            if($query_run)
            {
                // echo "Saved";
                $_SESSION['userstatus1'] = "User Added Successfully";
                 //Time input
                 date_default_timezone_set('Asia/Manila');
                 $date = date('y-m-d h:i:s');

                 //ID
                 $id = $_SESSION['id'];

                 //INSERT
                 $query1 = "INSERT into logs (user_id, action_made, date_created) VALUES('$id','added a new user', '$date')"; 
                 $query_run1 = mysqli_query($con, $query1);
                header('Location: users.php');
            }
            else 
            {
                $_SESSION['userstatus1'] = "User Not Added";
                header('Location: users.php');  
            }
        }
        else 
        {
            $_SESSION['userstatus1'] = "Password and Confirm Password Does Not Match";
            header('Location: users.php');  
        }
    }

}

?>
