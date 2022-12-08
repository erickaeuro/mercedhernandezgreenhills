<?php 
    session_start();
    
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
     
?> 


<?php
if(isset($_POST['addjewelry']))
{   

$stock_no = $_POST['stock_no'];
$item_type = $_POST['item_type'];
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

 $fileName = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size= $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="jewelry/";
 
 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
$query = "INSERT into inventorytbl (stock_no, file_name, type, size, item_type, itemdescription, karat_gold, kindofstone, weight, itemqty, tagprice, date_sold, date_created) VALUES ('$stock_no', '$fileName', '$final_file','$file_type','$new_size','$item_type','$itemdescription','$karat_gold','$kindofstone','$weight','$itemqty','$tagprice','$date_sold','$date')";
 mysqli_query($con,$query);
  
 
  echo "File sucessfully upload";
        
  
 }
 else
 {
  
  echo "Error.Please try again";
		
		}
	}
?>

