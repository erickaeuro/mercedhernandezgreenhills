<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Merced Hernandez Greenhills</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free-5.15.4-web/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.css" rel="stylesheet">
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Connection Database --> 
  <?php include ("../connection.php"); 
  
  session_start();
?>

</head>
    

<body id="page-top" class=" bg-gray-800">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include '../sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include '../navbar.php'; ?>
        <!-- End of Topbar -->

    
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Stocks (Available)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                             $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills") or die("connection failed:".mysqli_error());
                                             $result = mysqli_query($cser,"SELECT * FROM inventorytbl") or die(mysql_error());

                                             if($stockstotal = mysqli_num_rows($result))
                                             {
                                                echo '<h5 class="mb-0"> '.$stockstotal.'</h5>';
                                             }
                                             else
                                             {
                                                echo '<h5="mb-0"> No Data </h5>';
                                             }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list-alt fa-2x text-gray-300 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Redeem Loans</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            <?php 
                                                        $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills") or die("connection failed:".mysqli_error());
                                                        $result = mysqli_query($cser,"SELECT * FROM redeemtbl") or die(mysql_error());

                                                        if($redeemtotal = mysqli_num_rows($result))
                                                        {
                                                            echo '<h5 class="mb-0"> '.$redeemtotal.'</h5>';
                                                        }
                                                        else
                                                        {
                                                            echo '<h5="mb-0"> No Data </h5>';
                                                        }
                                                    ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-csv fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Customers
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php 
                                                        $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills") or die("connection failed:".mysqli_error());
                                                        $result = mysqli_query($cser,"SELECT * FROM customertbl") or die(mysql_error());

                                                        if($customertotal = mysqli_num_rows($result))
                                                        {
                                                            echo '<h5 class="mb-0"> '.$customertotal.'</h5>';
                                                        }
                                                        else
                                                        {
                                                            echo '<h5="mb-0"> No Data </h5>';
                                                        }
                                                    ?>
                                                </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Employees </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                                        $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills") or die("connection failed:".mysqli_error());
                                                        $result = mysqli_query($cser,"SELECT * FROM users") or die(mysql_error());

                                                        if($userstotal = mysqli_num_rows($result))
                                                        {
                                                            echo '<h5 class="mb-0"> '.$userstotal.'</h5>';
                                                        }
                                                        else
                                                        {
                                                            echo '<h5="mb-0"> No Data </h5>';
                                                        }
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
        <?php include '../footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
        
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../login_register/login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

<?php include '../scripts.php'; ?>
<script>
    $(document).ready(function() {
    $('table.display').DataTable();
} );
    </script>
</body>

</html>
