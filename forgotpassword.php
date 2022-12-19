


<!DOCTYPE html>
<html>
<head>
  <title>Forgot password</title>
  <link rel="stylesheet" type="text/css" href="styless.css">
</head>
<body>
<?php
error_reporting(0);
?>

  <div class="header">
  	<h2>Forgot Password | Merced Hernandez Greenhills</h2>
  </div>
	 
  <form method="post" action="link.php">
  	 <?//php include('errors.php');?> 
	   <div class="input-group">
	   <p class="text-center">Enter your email address</p>
  		<input type="email" name="email" placeholder="Email Address" class="one-input" >
</div>

  	<div class="input-group">
  		<button type="submit" class="btn" name="forgotpassword"  >Submit</button>
  	</div>

  </form>
</body>
</html>