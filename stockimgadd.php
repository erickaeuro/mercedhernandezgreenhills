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

  <title>Add Stock Image | Merced Hernandez Greenhills</title>

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

<?php
if(isset($_SESSION['status']))
              {
                  ?>
                      <div class="alert alert-success" role="alert" role="alert">
                          <?= $_SESSION['status']; ?>
                          <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                      </div>
                  <?php 
                  unset($_SESSION['status']);
              }
?>

        <div class="row">
            <div class="col-md-12">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 1200px;">
                    <div class="card-header">
                        <h4><b>Add Image of Jewelry</b>                      
                    </div>
                    <div class="card-body">

                            <form action="addimgstock.php" method="POST" enctype="multipart/form-data">


                            <div class="form-group col-md-11">
                                <label for="image"><b>Image of Jewelry</b></label>
                                <input type="file" class="form-control" name="file" required>
                            </div>
                           
                        </div>
                        <div class="mb-4">
                            <center> 
                            <a href="stockadd.php"  class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                            <button type="submit" name="addimage" class="btn text-white" style="background-color: #81C784;">Add Image</button> 
                            </center>
                            </div>  
                            
                        </form>
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
