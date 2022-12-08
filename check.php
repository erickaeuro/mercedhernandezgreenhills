

<?php

session_start();

 include('session.php');


$username = $_SESSION['username'];

require "Authenticator.php";
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: index.php");
    die();
}
$Authenticator = new Authenticator();




$checkResult = $Authenticator->verifyCode($_SESSION['auth_secret'], $_POST['code'], 2);    // 2 = 2*30sec clock tolerance

if (!$checkResult) {
    $_SESSION['failed'] = true;
    header("location: indexsu.php");
    die();
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authentication Successful</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <meta name="description" content="Implement Google like Time-Based Authentication into your existing PHP application. And learn How to Build it? How it Works? and Why is it Necessary these days."/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel='shortcut icon' href='/favicon.ico'  />
    <style>
        body,html {
            height: 100%;
        }       


        .bg { 
            /* The image used */
            background-image: url("bg.jpg");
            /* Full height */
            height: 100%; 
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
           
            background-size: cover;
        }
    </style>
</head>
<body  class="bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3"  style="background: white; padding: 20px; box-shadow: 10px 10px 5px #888888; margin-top: 100px;">
                <hr>
                    <div style="text-align: center;">
                           <h1>Authentication Successful!</h1>
                           <p></p>
                    </div>
                <hr>  
                <p>
                <a href='dashboard.php?username=<?=$username?>'  class='btn text-white' style='width: 200px;border-radius: 0px; background-color: #81C784; text-align: center;;'>Continue?</a>

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
               
                </p>
            </div>
    
  	</div>
      </div>
        </div>
    </div>
	
</body>
</html>