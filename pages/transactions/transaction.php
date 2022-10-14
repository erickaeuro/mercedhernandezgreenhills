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
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.css" rel="stylesheet">
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<?php include ("../connection.php"); 
  
  session_start();
  error_reporting();
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
      <h4>
       <a href="transactionbtn.php" class="btn btn-info btn-icon-text btn-md"> 
       <i class="fas fa-plus"></i>New Transaction</a>
    </div>

    <!-- Content Row -->

    <form action="addtransaction.php" method="POST">

            <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-info border-bottom-info">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-info">Pawn Ticket</h6>
                      </div>
                      <!-- Card Body -->

                      <?php 

                          $query = "SELECT * FROM pawntickettbl";
                          $query_run = mysqli_query($con, $query);

                      ?> 

                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-hover display" id="" width="100%" cellspacing="0">
                                  <thead>
                                      <tr style="font-size:13px;font-family:sans-serif;">
                                          <th>Pawn Ticket No.</th>
                                          <th>Loan ID</th>
                                          <th>Amount Paid</th>
                                          <th>Date Paid</th>
                                          <th>Transaction Type</th>
                                          <th>action</th>
                        
                                      </tr>
                                  </thead>

          <?php
          
                    foreach($query_run as $row)
                    {
              ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['pawnticketno']; ?> </td>
                                <td> <?php echo $row['loan_id']; ?> </td>
                                <td> <?php echo $row['amount_paid']; ?> </td>
                                <td> <?php echo $row['date_paid']; ?> </td>
                                <td> <?php echo $row['transactiontype']; ?> </td>
                                <td>
                                    <a href="pawnview.php?id=<?= $row['pawnticketno'];?>" class="btn btn-info viewbtn">VIEW</a>
                                    <a href="editpawn.php?id=<?= $row['pawnticketno']?>" class="btn btn-success editbtn"> EDIT </button>
                                </td>
                            </tr>
                        </tbody>
            <?php  
                             
                    }
                

          
            ?>             
                              </table>
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
