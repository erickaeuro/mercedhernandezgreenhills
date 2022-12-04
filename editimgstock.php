<?php
session_start();

 $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
 if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

 $statusMsg = '';

// File upload path
$targetDir = "jewelry/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$stock_no = $_POST['stock_no'];

if(isset($_POST['editjewelry']) && !empty($_FILES["file"]["name"]))
    {   
        // Allow certain file formats
      $allowTypes = array('jpg','png','jpeg','gif','pdf', 'jfif');
      if(in_array($fileType, $allowTypes)){
          // Upload file to server
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
              // Update image file name into database
              $query = "UPDATE inventorytbl SET file_name ='$fileName' WHERE stock_no='$stock_no' ";
              $query_run = mysqli_query($con, $query);

              if($query_run){
                  $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                  $_SESSION['status'] = "Stock Image Edited Successfully!";
                  
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
