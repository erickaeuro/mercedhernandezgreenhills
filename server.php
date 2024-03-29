<?php
//session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array();
session_start();

// connect to the database
//$db = mysqli_connect("localhost","u228255941_root","Mhgpjdb123","u228255941_mhgpjdb");
$db = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $security_qstn = mysqli_real_escape_string($db, $_POST['security_qstn']);
  $security_ans = mysqli_real_escape_string($db, $_POST['security_ans']);

  /*while($row = mysqli_fetch_array($result)){
    $user_status=$row['user_status'];		
  }*/

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($security_ans)) { array_push($errors, "Security question is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5(md5($password_1));//encrypt the password before saving in the database
  
  	$query = "INSERT INTO users (username, email, password, security_qstn, security_ans, status) 
  			  VALUES('$username', '$email', '$password', '$security_qstn', '$security_ans', 'Active')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Successfuly Registered";
  	header('location: check.php');
  }
}

?>