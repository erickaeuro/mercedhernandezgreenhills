<?php
if(!isset($_SESSION['username'])){
  header("Location: index.php");
  header("Location: dashboard.php");
}

?>