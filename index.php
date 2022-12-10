<?php include('server.php')
?>


<?php 
error_reporting(0);
session_start();
$conn = new mysqli("localhost","root","","mercedhernandezgreenhills");
include('server.php');



$msg="";

if(isset($_POST['login_user'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

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
	

	$enc_pass = md5(md5($password));

	$query = "SELECT * FROM users WHERE username='$username' AND password='$enc_pass'";
	  $results = mysqli_query($db, $query);

	while($row = mysqli_fetch_array($results)){
		$status=$row['status'];
		$user=$row['username'];
    	$pass=$row['password'];
		
	}	

	 if($status == "1"){array_push($errors, "User Deactivated");}

	if (($user == $username) && ($pass == $enc_pass)){

	if (count($errors) == 0) {

		if (mysqli_num_rows($results) == 1) {
			
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Successfuly Login";

			if($authentication == "EMAIL"){
				header("location:Email.php");
			}

			if($authentication == "MFA"){
				$_SESSION['username'] = $username;
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
  <link rel="stylesheet" type="text/css" href="styless.css">
 
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="index.php" class="main-lead">
	
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
		 <option value="EMAIL">EMAIL</option>
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