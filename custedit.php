<?php
error_reporting(0);
session_start();
require 'connection.php';

?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Customer | Merced Hernandez Greenhills</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  
</head>

<body id="page-top" class=" bg-gray-800">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'navbar.php'; ?>
        <!-- End of Topbar -->

<style>

.wrapper {
  display: grid;
  grid-template-columns: 350px 350px 360px;
}

</style> 
        <div class="row">
            <div class="col-md-12">
                <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 1200px;">
                            <div class="card-header">
                                <h4><b>Edit Customer Details</b>                      
                            </div>
                    <div class="card-body">

                    <?php
                       $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
                       function decryptthis($data, $key){
                         $encryption_key = base64_decode($key);
                         list($encryption_data, $iv) = array_pad(explode('::',base64_decode($data),2),2,null);
                         return openssl_decrypt($encryption_data, 'aes-256-cbc',$encryption_key,0,$iv);
                         
                         foreach($query_run as $row)
                         {
                          
                           $addr = $row['address'];
                           $contactNo = $row['cpnum'];
                           $validID = $row['valid_id'];
  
                           //DECRYPT VARIBLES HERE WITH THE RETURN OF DECRYPTION FUNCTION
                           $Address = decryptthis($addr, $key);
                           $contact = decryptthis($contactNo, $key);
                           $vad_id = decryptthis($validID, $key);
  
  
                       }
                      }
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM customertbl WHERE customer_no='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);
                                ?>

                            <form action="editcustomer.php" method="POST" enctype="multipart/form-data">

                            
                            <input type="hidden" name="id" value='<?= $row['id']; ?>'>

                            <div class="form-group col-md-11">
                                <label for="customerno"><b>Customer No.</b></label>
                                <input type="text" class="form-control" name="customer_no" value="<?= $row['customer_no']; ?>">
                            </div>  

                        <div class="wrapper">
                            <div class="form-group col-md-12">
                                <label for="first_name"><b>First Name</b></label>
                                <input type="text" class="form-control" name="first_name" value="<?= $row['first_name']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="middle_name"><b>Middle Name</b></label>
                                <input type="text" class="form-control" name="middle_name" value="<?= $row['middle_name']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="last_name"><b>Last Name</b></label>
                                <input type="text" class="form-control" name="last_name" value="<?= $row['last_name']; ?>">
                            </div>
                        </div>

                            <div class="form-group col-md-11">
                                <label for="Address"><b>Address</b></label>
                                <input type="text" class="form-control" name="address" value="<?= decryptthis($row['address'], $key) ?>">
                            </div>

                            <div class="form-group col-md-11">
                                <label for="cpnum"><b>Contact Number</b></label>
                                <input type="text" class="form-control" name="cpnum" value="<?= decryptthis($row['cpnum'], $key) ?>" >
                            </div>

                            <div class="form-group col-md-11">
                                <label for="birthdate"><b>Birthdate</b></label>
                                <input type="date" class="form-control" name="birthdate" value="<?= $row['birthdate']; ?>" >
                            </div>

                            <div class="form-group col-md-11">
                                <label for="valid_id"><b>Valid ID</b></label> <br/>
                               <a href="custimgedit.php?id=<?= $id?>" class="btn text-white" style="background-color: #81C784 ">EDIT IMAGE </a>
                            </div>


                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="customer.php" class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                            <button type="button" class="btn text-white" style="background-color: #81C784;"  data-bs-toggle="modal" data-bs-target="#EditModal">Edit Customer Details</button> 
                            </center>
                            </div>



                             <!--MODAL FOR EDIT-->
                             <div class="modal" id="EditModal">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Confirm Edit?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        Do you want to save the changes
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="submit" name="editcustomer" class="btn text-white" style="background-color: #81C784;" >Yes</button>
                                        <button type="button" class="btn text-white" style="background-color: #B0B0AB;" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </form>

                        <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

</div>


<?php include 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
