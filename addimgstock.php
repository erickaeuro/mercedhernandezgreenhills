<?php 
    session_start();
    
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
     
?> 


<?php

    if(isset($_POST['addimage']) && !empty ($_FILES['file']['name'])){
 
        $targetDir = "jewelry/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $fileSize = $_FILES["file"]["size"];
        $max_size = 2097152;
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $query = "INSERT into inventorytbl (file_name) VALUES ('$fileName')";
                $query_run = mysqli_query($con, $query);
   
                if($query_run){
                    $_SESSION['status'] = "The file ".$fileName." Added Successfully!";
                    
                    header('Location: stockadd.php');
                }else{
                    $_SESSION['status'] = "Sorry, file must be 2 mb or less";
                    header('Location: stockadd.php');
                }
            }else{
                $_SESSION['status'] = "Sorry, there was an error uploading your file.";
                header('Location: stockadd.php');
            }
        }else{
            $_SESSION['status'] ='Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            header('Location: stockadd.php');
        }
        
    }
    
?>