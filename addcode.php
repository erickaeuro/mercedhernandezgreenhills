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


if(isset($_POST['addjewelry']) && !empty($_FILES["file"]["name"]))
{
    $stock_no = $_POST['stock_no'];
    $item_type = $_POST['item_type'];
    $file_name = $_POST['file_name'];
    $itemdescription = $_POST['itemdescription'];
    $karat_gold = $_POST['karat_gold'];
    $kindofstone = $_POST['kindofstone'];
    $weight = $_POST['weight'];
    $itemqty = $_POST['itemqty'];
    $tagprice = $_POST['tagprice'];
    $date_sold = $_POST['date_sold'];
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');
    $date_created = $_POST['date_created'];

      // Allow certain file formats
      $allowTypes = array('jpg','png','jpeg','gif','pdf');
      if(in_array($fileType, $allowTypes)){
          // Upload file to server
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
              // Insert image file name into database
              $query = "INSERT into inventorytbl (stock_no, file_name, item_type, itemdescription, karat_gold, kindofstone, weight, itemqty, tagprice, date_sold, date_created) VALUES ('$stock_no', '$file_name','$item_type','$itemdescription','$karat_gold','$kindofstone','$weight','$itemqty','$tagprice','$date_sold','$date')";
              $query_run = mysqli_query($con, $query);

              if($query_run){
                  $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                  $_SESSION['status'] = "Stock Added Successfully!";
                  
                  header('Location: stocks.php');
              }else{
                  $statusMsg = "File upload failed, please try again.";
              } 
          }else{
              $statusMsg = "Sorry, there was an error uploading your file.";
          }
      }else{
          $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
      }
  }else{
      $statusMsg = 'Please select a file to upload.';
  }
    
// Display status message
echo $statusMsg;
?>

