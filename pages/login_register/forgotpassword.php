


<!DOCTYPE html>
<html>
<head>
  <title>Forgot password</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


  <div class="header">
  	<h2>Forgot Password</h2>
  </div>
	 
  <form method="post" action="forgotpassword.php">
  	 <?//php include('errors.php');?> 
	   <div class="input-group">
  		<label>Enter new password</label>
  		<input type="text" name="newpassword" >

		  <div class="input-group">
  		<label>Confirm New password</label>
  		<input type="text" name="confirmpassword" >
  	
</div>

  	<div class="input-group">
  		<button type="submit" class="btn" name="forgotpassword"  >Submit</button>
  	</div>

  </form>
</body>
</html>