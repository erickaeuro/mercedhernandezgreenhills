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
<html>
<head>
  <title>Log in</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php" class="main-lead">
	
  	<?php include('errors.php');?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
	<div class="form-group lead">

	<label for="authentication"><h3	>Please select authentication</h3></label>
	<select name="authentication" id="authentication" class="authen">
		<option disabled selected value="Select a Method">Select a Method</option>
		<option value="MFA">MFA</option>
		<!-- <option value="EMAIL">EMAIL</option> -->
		<!-- <option value="SECUIRTY QUESTIONS">SECUIRTY QUESTIONS</option> -->
	</select>

  	<div class="input-group">  		
		  <input type="submit" class="btn" name="login_user" value="Login">
  	</div> 
	  
	  <p>
  		<a href="forgotpassword.php">Forgot passsword? </a>
     </p>
  	<p>
  	Not yet a member? <a href="register.php">Sign up</a>
   </p>
  </form>
  

</body>
</html>
