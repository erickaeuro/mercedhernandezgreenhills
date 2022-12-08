<?php 
    session_start();
    
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
     
?> 


<?php

$statusMsg = '';

// File upload path
$targetDir = "jewelry/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$stock_no = $_POST['stock_no'];
$item_type = $_POST['item_type'];
//$file_name = $_POST['file_name'];
$itemdescription = $_POST['itemdescription'];
$karat_gold = $_POST['karat_gold'];
$kindofstone = $_POST['kindofstone'];
$weight = $_POST['weight'];
$itemqty = $_POST['itemqty'];
$tagprice = $_POST['tagprice'];

date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');
$date_created = $_POST['date_created'];

if(isset($_POST['addjewelry']) && !empty($_FILES["file"]["name"]))
{
      // Allow certain file formats
      $allowTypes = array('jpg','png','jpeg','gif','pdf', 'jfif');
      if(in_array($fileType, $allowTypes)){
          // Upload file to server
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
              // Insert image file name into database
              $query = "INSERT into inventorytbl (stock_no, file_name, item_type, itemdescription, karat_gold, kindofstone, weight, itemqty, tagprice,  date_created) VALUES ('$stock_no', '$fileName','$item_type','$itemdescription','$karat_gold','$kindofstone','$weight','$itemqty','$tagprice','$date')";
              $query_run = mysqli_query($con, $query);

              if($query_run){
                  //$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                  $_SESSION['status'] = "Stock Added Successfully!";
                  
                  header('Location: stocks.php');
              }else{
                  //$statusMsg = "File upload failed, please try again.";
                  $_SESSION['status'] = "File upload failed, please try again.";
                  header('Location: stocks.php');
              } 
          }else{
              //$statusMsg = "Sorry, there was an error uploading your file.";
              $_SESSION['status'] = "File must be less than 2mb file size.";
              header('Location: stocks.php');
          }
      }else{
          //$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
          $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
          header('Location: stocks.php');
      }
  }else{
      //$statusMsg = 'Please select a file to upload.';
      $_SESSION['status'] = "Please select a file to upload.";
      header('Location: stocks.php');

  }
    
// Display status message
echo $statusMsg;
?>

