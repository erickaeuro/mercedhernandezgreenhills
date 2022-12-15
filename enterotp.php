<!DOCTYPE html>
<html>
<head>
  
  <title>Enter OTP</title>
  <link rel="stylesheet" type="text/css" href="styless.css">
  <?php 
          include 'connection.php';
          session_start();
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
  		<input type="text" name="otp" required class="one-input"></button>
          <br>
          <br> 
          <a href="dashboard.php" class="btn text-white btn-md">
               Enter</a>
               <?php

                      $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                      if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

                      date_default_timezone_set('Asia/Manila');
                      $date = date('y-m-d h:i:s');

                      $valquery = "SELECT id from users where username = '$username'";
                      $valquery_run = mysqli_query($con, $valquery);
                      $val = mysqli_fetch_array($valquery_run);

                      $uid = $val['id'];
                      $_SESSION['id'] = $uid;


                      $query = "INSERT into logs (user_id, action_made, date_created) VALUES('$uid','user logged in', '$date')"; 
                      $query_run = mysqli_query($con, $query);

                ?>
  	</div>
           
  </form>
</body>
</html>