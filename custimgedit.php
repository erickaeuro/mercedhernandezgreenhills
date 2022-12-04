<?php
session_start();
error_reporting(0);
require 'connection.php';

?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Merced Hernandez Greenhills</title>

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
  grid-template-columns: 500px 550px;
}

</style> 

        <div class="row">
            <div class="col-md-12">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 1200px;">
                    <div class="card-header">
                        <h4><b>Edit Customer Image</b>                      
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

                            <form action="editimgcust.php" method="POST" enctype="multipart/form-data">

                            
                            <input type="hidden" name="id" value='<?= $row['id']; ?>'>
                            <div class="form-group col-md-11">
                                <label for="customerno"><b>Customer No.</b></label>
                                <input type="text" class="form-control" name="customer_no" value="<?= $row['customer_no']; ?>" readonly>
                            </div> 

                            <div class="form-group col-md-11">
                                <label for="valid_id"><b>Valid ID</b></label>
                                <input type="file" class="form-control" name="file" value="<?= decryptthis($row['filename'], $key) ?>" >
                            </div>

                            <div id="display-image">
                                <?php
                                    $customerNo = $row['customer_no'];

                                    $sql=mysqli_query($con,"SELECT filename FROM customertbl where customer_no = $customerNo");
                            
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <img src="valid_ids/<?php echo $data['filename']; ?> " width="450" height="350">
                            
                                <?php
                                    }
                                ?>
                            </div>


                           
                        </div>
                        <div class="mb-4">
                            <center> 
                            <a href="custedit.php?id=<?= $id; ?>"  class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                            <button type="button" class="btn text-white" style="background-color: #81C784;" data-bs-toggle="modal" data-bs-target="#EditModal">Edit Image</button> 
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
                                        Do you want to save the changes?
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="submit" name="editcustomer" class="btn text-white" style="background-color: #81C784;">Yes</button> 
                                        <button type="button"  class="btn text-white" style="background-color: #B0B0AB;" data-bs-dismiss="modal">Close</button>
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
