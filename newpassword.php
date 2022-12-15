
<!DOCTYPE html>
<html>
<head>
  <title>Forgot password</title>
  <link rel="stylesheet" type="text/css" href="styless.css">
</head>
<body>


  <div class="header">
  	<h2>Forgot Password</h2>
  </div>
	 
  <form method="post" action="changepassword.php">
  	 <?//php include('errors.php');?> 
	<div class="input-group">
  		<input type="email" name="email" placeholder="Email Address" class="one-input">
    </div>

    <div class="input-group">
        <input class="one-input" type="password" name="password" placeholder="Create new password" required>
    </div>   

    <div class="input-group">     
        <input class="one-input" type="password" name="cpassword" placeholder="Confirm your password" required>
    </div>

  	<div class="input-group">
  		<button type="submit" class="btn" name="changepassword">Submit</button>
  	</div>

  </form>
</body>
</html>