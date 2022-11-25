<?php
include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Email</title>
  <link rel="stylesheet" type="text/css" href="styless.css">
  <?php 
          include 'connection.php';
          ?>
</head>
<body>


  <div class="header">
  	<h2>Email</h2>
  </div>
	 
  <form method="post" action="send.php">
  	
	   <div class="input-group">
  		<label>Enter Email</label>
  		<input type="email" name="email" required >

		  
  	
</div>

  	<div class="input-group">
  		<button type="submit" class="btn" name="send">SEND</button>
  	</div>

  </form>
</body>
</html>