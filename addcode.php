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
$date = date('y-m-d H:i:s');
$date_created = $_POST['date_created'];

if(isset($_POST['addjewelry']) && !empty($_FILES["file"]["name"]))
{
    if ($_FILES["file"]["size"] >=  2097152){
        $query2 = "INSERT INTO stockssample (stock, edit_no, item_type, itemdescription, karat_gold, kindofstone, weight, itemqty, tagprice ) VALUES ( NULL , '10','$item_type','$itemdescription','$karat_gold','$kindofstone','$weight','$itemqty','$tagprice')"; 
        $query_run2 = mysqli_query($con, $query2);

        $_SESSION['status'] = "File must be less than 2mb file size.";
        header('Location: stockadd.php?edit=10');
            }
      else {
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
                  $_SESSION['status3'] = "Stock Added Successfully!";

                    //ID
                    $id = $_SESSION['id'];

                    //INSERT
                    $query1 = "INSERT INTO logs (user_id, action_made, date_created) VALUES('$id','added a stock', '$date')"; 
                    $query_run1 = mysqli_query($con, $query1);

                    if(isset($_SESSION['edit'])){
                        $edit_no = $_SESSION['edit'];
                        $delquery = "DELETE FROM stockssample WHERE edit_no = '$edit_no'"; 
                        $delqueryrun = mysqli_query($con, $delquery);
                        unset($_SESSION['edit']);
                    }
                  
                  header('Location: stocks.php');
              }else{
                  //$statusMsg = "File upload failed, please try again.";
                    $query2 = "INSERT INTO stockssample (stock, edit_no, item_type, itemdescription, karat_gold, kindofstone, weight, itemqty, tagprice ) VALUES ( NULL , '10','$item_type','$itemdescription','$karat_gold','$kindofstone','$weight','$itemqty','$tagprice')"; 
                    $query_run2 = mysqli_query($con, $query2);


                  $_SESSION['status'] = "File upload failed, please try again.";
                  header('Location: stockadd.php?edit=10');
              } 
          }else{
            $query2 = "INSERT INTO stockssample (stock, edit_no, item_type, itemdescription, karat_gold, kindofstone, weight, itemqty, tagprice,  date_created) VALUES (NULL, '10','$item_type','$itemdescription','$karat_gold','$kindofstone','$weight','$itemqty','$tagprice')"; 
            $query_run2 = mysqli_query($con, $query2);


              //$statusMsg = "Sorry, there was an error uploading your file.";
              $_SESSION['status'] = "File must be less than 2mb file size.";
              header('Location: stockadd.php?edit=10');
          }
      }else{
        $query2 = "INSERT INTO stockssample (stock, edit_no, item_type, itemdescription, karat_gold, kindofstone, weight, itemqty, tagprice ) VALUES ( NULL , '10','$item_type','$itemdescription','$karat_gold','$kindofstone','$weight','$itemqty','$tagprice')"; 
        $query_run2 = mysqli_query($con, $query2);

          //$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
          $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
          header('Location: stockadd.php?edit=10');;
      }
  }

  }
    
// Display status message
echo $statusMsg;
?>