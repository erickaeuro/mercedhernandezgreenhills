<?php
session_start();
require 'connection.php';

?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>View Customer | Merced Hernandez Greenhills</title>

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
                        <h4><b>View Customer Details</b>                      
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
                         $cpn = $row['cpnum'];
                         $validID = $row['valid_id'];

                         //DECRYPT VARIBLES HERE WITH THE RETURN OF DECRYPTION FUNCTION
                         $Address = decryptthis($addr, $key);
                         $contact = decryptthis($cpn, $key);
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


                            <div class="form-group col-md-11">
                                <label for="customer_no"><b>Customer No.</b></label>
                                <p class="form-control"> <?= $row['customer_no']; ?> </p>
                            </div>  

                        <div class="wrapper">
                            <div class="form-group col-md-12">
                                <label for="first_name"><b>First Name</b></label>
                                <p class="form-control"> <?= $row['first_name']; ?> </p>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="middle_name"><b>Middle Name</b></label>
                                <p class="form-control"> <?= $row['middle_name']; ?> </p>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="last_name"><b>Last Name</b></label>
                                <p class="form-control"> <?= $row['last_name']; ?> </p>
                            </div>
                        </div>

                            <div class="form-group col-md-11">
                                <label for="address"><b>Address</b></label>
                                <p class="form-control"> <?= decryptthis($row['address'], $key) ?> </p>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="cpnum"><b>Contact Number</b></label>
                                <p class="form-control"> <?= decryptthis($row['cpnum'], $key) ?> </p>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="birthdate"><b>Birthdate</b></label>
                                <p class="form-control"> <?= $row['birthdate']; ?> </p>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="valid_id"><b>Valid ID</b></label>
                                <p class="form-control"> <?= decryptthis($row['filename'], $key) ?>
                            </div>

                            <?php
                                        $customerNo = $row['customer_no'];

                                        $sql=mysqli_query($con,"SELECT filename FROM customertbl where customer_no = $customerNo");

                                        if($sql->num_rows > 0){
                                            while($row=mysqli_fetch_array($sql)){
                                                $imageURL = 'valid_ids/'.$row["filename"];
                                        ?>
                                            <img src="<?php echo $imageURL; ?>" alt="" width="450" height="350" />
                                        <?php }
                                        }else{ ?>
                                            <p>No image(s) found...</p>
                                        <?php } ?>

                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="customer.php" class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                            </center>
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
