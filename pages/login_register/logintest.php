<?php include('server.php') ?>
<?php 
error_reporting(0);
session_start();
$conn = new mysqli("localhost","root","","mercedhernandezgreenhills");
include('server.php');
// $conn = new mysqli("localhost","root","","mercedhernandezgreenhills");
// error_reporting(0);
// $conn = new mysqli("localhost","root","","mercedhernandezgreenhills");

$msg="";

if(isset($_POST['login_user'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//$passwordd = sha1($password);
	$authentication = $_POST['authentication'];

	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	if (empty($username)) {
		array_push($errors, "Username is required");
   }
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (empty($authentication)) {
		array_push($errors, "Authentication is required");
	}

	$enc_pass = md5($password);

	$query = "SELECT * FROM users WHERE username='$username' AND password='$enc_pass'";
	  $results = mysqli_query($db, $query);

	while($row = mysqli_fetch_array($results)){
		$user_status=$row['userstatus'];
		$user=$row['username'];
    	$pass=$row['password'];		
	}	

	if($user_status == "Inactive"){array_push($errors, "User Deactivated");}

	if (($user == $username) && ($pass == $enc_pass)){

	if (count($errors) == 0) {

		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Successfully Login";

			if($authentication == "EMAIL"){
				header("location:otp.php");
			}

			if($authentication == "MFA"){
				header("location:indexsu.php");
			}

			if($authentication == "SECURITY QUESTIONS"){
				header("location:security_qstn.php");
			}
		}
	}
}

	else {
		array_push($errors, "Wrong Username / Password Combination");
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <title>Merced Hernandez Greenhills Pawnshop & Jewellery</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/affc99a8ad.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php
    require('../connection.php');
    error_reporting(0);
  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-10 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Merced Hernandez Greenhills Pawnshop & Jewellery Login</h5>
            <form method="post" action="login.php" class="main-lead">

                <?php include('errors.php');?>

                <label for="floatingInputUsername">Username</label>
                <input type="text"  name="username"  class="form-control" id="floatingInputUsername" placeholder="Username">

                <label for="floatingPassword">Password</label>
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" >


                <hr />
                <input type="submit" class="btn btn-dark text-warning btn-login w-75" name="sub">
                <button class="btn btn-outline-danger btn-login pl-4 pr-4 "> Forgot Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>