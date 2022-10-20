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

<!-- Connection Database --> 
  <?php include ("../connection.php");
  include("../head.php");
  error_reporting(0); 
  
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
        <?php include '../navbar.php'; 
        if(isset($_SESSION['addstatus']))
        {
            ?>
                <div class="alert alert-success" role="alert" role="alert">
                    <?= $_SESSION['addstatus']; ?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php 
            unset($_SESSION['addstatus']);
        }?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- Content Row -->

            <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-info border-bottom-info">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-info">Auction</h6>
                      </div>
                      <!-- Card Body -->
                      <?php 

                        $query = "SELECT * FROM auctiontbl WHERE status = 'Sold'";
                        $query_run = mysqli_query($con, $query);

                        ?> 
                      <form action="auctionsold.php" method="POST">

                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-hover display" id="" width="100%" cellspacing="0">
                                  <thead>
                                      <tr style="font-size:13px;font-family:sans-serif;">
                                          <th>Auction ID</th>
                                          <th>Item Type</th>
                                          <th>Item Description</th>
                                          <th>Price</th>
                                          <th>Status</th>
                                          <th>Date Sold</th>                                          
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  
                                  <tbody>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>  
                                  <tr>
                                    <td> <?php echo $row['auctionid']; ?> </td>
                                    <td> <?php echo $row['item_type']; ?> </td>
                                    <td> <?php echo $row['item_desc']; ?> </td>
                                    <td> <?php echo $row['price']; ?> </td>
                                    <td> <?php echo $row['status']; ?> </td>
                                    <td> <?php echo $row['date_sold']; ?> </td>                                    
                                    <td>
                                    <a href="auctionview.php?id=<?= $row['auctionid'];?>" class="btn btn-info viewbtn">VIEW</a>
                                    </td>
                                  </tr> 
                                  <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?> 
                                  </tbody>
               
                              </table>
                          </div>
                      </div>
                  </div>
              </form>
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