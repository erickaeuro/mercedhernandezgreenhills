<?php 
session_start();
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

if(isset($_POST['changepassword'])){

    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $encpass = md5(md5($password));
        $update_pass = "UPDATE users SET password='$encpass' WHERE email ='$email'";
        $run_query = mysqli_query($con, $update_pass);
        if($run_query){
            echo "<script> alert('Changed Successfully'); 
            </script>";
            header('Location: login.php');
        }else{
            echo '<script> alert("Password not Changed!"); </script>';
        }
    }
}














?>