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
$item_type = $_POST['item_type'];
//$file_name = $_POST['file_name'];
$itemdescription = $_POST['itemdescription'];
$karat_gold = $_POST['karat_gold'];
$kindofstone = $_POST['kindofstone'];
$weight = $_POST['weight'];
$itemqty = $_POST['itemqty'];
$tagprice = $_POST['tagprice'];
$date_sold = $_POST['date_sold'];


    if(isset($_POST['editjewelry']) && !empty($_FILES["file"]["name"]))
    {   
        // Allow certain file formats
      $allowTypes = array('jpg','png','jpeg','gif','pdf');
      if(in_array($fileType, $allowTypes)){
          // Upload file to server
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
              // Update image file name into database
              $query = "UPDATE inventorytbl SET item_type='$item_type', file_name ='$fileName', itemdescription='$itemdescription', karat_gold='$karat_gold', kindofstone='$kindofstone', weight='$weight', itemqty='$itemqty', tagprice='$tagprice', date_sold='$date_sold' WHERE stock_no='$stock_no' ";
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




