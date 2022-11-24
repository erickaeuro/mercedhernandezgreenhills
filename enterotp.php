







<!DOCTYPE html>
<html>
<head>
  <title>Enter OTP</title>
  <link rel="stylesheet" type="text/css" href="styless.css">
  <?php 
          include 'connection.php';
          ?>
</head>
<body>


  <div class="header">
  	<h2>Enter OTP</h2>
  </div>
	 
  <form method="post" action="send.php">
  	
	   <div class="input-group">
  		<label>Enter OTP</label>
  		

		  
  	
</div>

  	<div class="input-group">
  		<input type="text" name="otp" required></button>
          <br>
          <br> <a href="dashboard.php" class="btn text-white btn-md" style="background-color: #DE9185;">
               Enter</a>
  	</div>
           
  </form>
</body>
</html>