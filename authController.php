<!DOCTYPE html>
<html>
<head>
  <title></title>
  
</head>
<body>

<?php
if(isset($_POST['forgotpassword'])) {
    $email = $_POST['email'];

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email address is invalid";
}
if(empty($email)) {
    $errors['email'] = "Email required";
}

if (count($error) == 0) {
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $token = $user['token'];
    sendPasswordResetlink($email, $token);
    header('location: password_message.php');
    exit(0);
}
}
?>
	 
  


  </form>
</body>
</html>