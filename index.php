<?php

// if (isset($_SESSION['username'])) {
//     header("location:dashboard.php");
// } else {
// 	if (isset($_SESSION['username'])) 
// 		header("location:login.php");
// }
?>

<?php include('server.php')
?>


<?php 
error_reporting(0);
session_start();
$conn = new mysqli("localhost","root","","mercedhernandezgreenhills");
// $conn = new mysqli("localhost","root","","mercedhernandezgreenhills");
// error_reporting(0);
// $conn = new mysqli("localhost","root","","mercedhernandezgreenhills");


$msg="";

session_start();
if(($_SESSION['username'])){
	header("Location: dashboard.php");
  }

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

// if($_SERVER["REQUEST_METHOD"]=="POST")
// {
// 	$username=$_POST["username"];
// 	$passwordd=$_POST["password"];
// 	$usertype=$_POST["usertype"];

// 	$sql="select * from users where username='".$username."' AND password='".$passwordd."' AND  usertype'".$usertype."'";

// 	$result=mysqli_query($conn,$sql);

// 	$row=mysqli_fetch_array($result);

// 	if($row["usertype"]=="Admin")
// 	{
// 		header("location:Email.php");
// 	}
// 	elseif($row["usertype"]=="Appraiser")
// 	{
// 		echo "Appraiser";
// 	}
// 	elseif($row["usertype"]=="Inventory Clerk")
// 	{
// 		echo "Inventory Clerk";
// 	}
// 	else
// 	{
// 		echo "username or password incorrect";
// 	}
// }


// $query = "SELECT * FROM users WHERE username='$username' AND usertype='$usertype'";
// 	  $results = mysqli_query($db, $query);
	
// 	  $usertype = $_POST['usertype'];

//   if($row["usertype"]=="Admin")
//   {
//     header("location:Admin.php");
//   }
//   elseif($row["usertype"]=="Appraiser")
//   {
//     header("location:Appraiser.php");
//   }
//   elseif($row["usertype"]=="Inventory Clerk")
//   {
//     header("location:Inventory Clerk.php");
//   }
//   else
//   {
//     echo "username or password incorrect";
//   }


// $row=mysqli_fetch_array($result);

// if($row["usertype"]="Admin")
// {
// 	echo "admin";
// }
// elseif($row["usertype"]="Appraiser")
// {
// 	echo "admin";
// }
// elseif($row["usertype"]="Inventory Clerk")
// {
// 	echo "admin";
// }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Log in</title>
  <link rel="stylesheet" type="text/css" href="styless.css">
<script src="https://kit.fontawesome.com/dc534e1376.js" crossorigin="anonymous"></script>

</head>
<body>

  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="index.php" class="main-lead">

  	<?php include('errors.php');?>
	
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" class="one-input">
  	
	  	<label>Password</label>
		<input type="password" id="password" name="password" class="one-input">

	  <div class= "pass-holder">
			<label>Show Password</label>
			<input type="checkbox" name="" onclick="myFunction()" class="checkbox">			
		</div>

		<!-- <span>
				<i class="fa-regular fa-eye" id="eye"></i>
		</span> -->
	</div>

	<script type="text/javascript">
function myFunction() {
var show = document.getElementById('password')
	if (show.type=='password'){
		show.type='text';
	}else{
		show.type='password';
	}

}

		</script>
	
	<div class="form-group lead">

	<label for="authentication"><h3	>Please select authentication</h3></label>
	<select name="authentication" id="authentication" class="authen">
		<option disabled selected value="Select a Method">Select a Method</option>
		<option value="MFA">Google Authenticator</option>
		 <option value="EMAIL">EMAIL</option>
		<!-- <option value="SECUIRTY QUESTIONS">SECUIRTY QUESTIONS</option> -->
	</select>

  	<div class="input-group">  		
		  <input type="submit" class="btn" name="login_user" value="Login">
  	</div> 
	  
	  <p>
  		<a href="forgotpassword.php">Forgot passsword? </a>
     </p>
  </form>
  

  <script>
	const toggle

</body>
</html>