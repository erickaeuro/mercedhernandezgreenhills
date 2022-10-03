<!DOCTYPE html>
<html lang="en">

    <?php include '../head.php'; 
    error_reporting(0);
    if($_GET['del'] == 1){
      echo"<div class='alert alert-success' role='alert'>Successfully Deleted
      <button type='button' class='close' data-dismiss='alert'>x</button>
      </div>";
  }
    ?>

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
            <h4>
            <a href="renewalbtn.php" class="btn btn-info btn-icon-text btn-md"> 
            <i class="fas fa-plus"></i> Add Renewal Loan</a>
        </div>
          <!-- Content Row -->

            <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-info border-bottom-info">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-info">Renewal Loan</h6>
                      </div>
                      <!-- Card Body -->

                      <div class="card-body">

                      <?php 
                            $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                            if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
                        ?> 

                      <?php 
                             //Return data from Renewal Table
                            $query = "SELECT * FROM renewaltbl WHERE status = 1";
                            $query_run = mysqli_query($con, $query);
                            


                             //Return data from Pawnticket Table
                            $query1 = "SELECT * FROM pawntickettbl WHERE transactiontype='Renewal' ";
                            $query_run1 = mysqli_query($con, $query1);
                            $row1 = mysqli_fetch_array($query_run1);
                      ?> 

                          <div class="table-responsive">
                              <table class="table table-hover display" id="" width="100%" cellspacing="0">
                                  <thead>
                                      <tr style="font-size:13px;font-family:sans-serif;">
                                          <th>Pawn Ticket No.</th>
                                          <th>Customer No.</th>
                                          <th>Date Loan Granted</th>
                                          <th>Maturity Date</th>
                                          <th>Expiry Date</th>
                                          <th>Principal</th>
                                          <th>Interest</th>
                                          <th>Penalty</th>
                                          <th>Service Charge</th>
                                          <th>Total Amount Due</th>
                                          <th>Renewal Amount</th>
                                          <th>Action</th>
                                          <th></th>
                                      </tr>
                                  </thead>

            <?php
                if($query_run1)
                { 
                    foreach($query_run as $row)
                    {
            ?>
                                  <tbody>

                                  <tr>
                                        <td> <?php echo $row1['pawnticketno']; ?> </td>
                                        <td> <?php echo $row1['customerno']; ?> </td>
                                        <td> <?php echo $row1['dateloangranted']; ?> </td>
                                        <td> <?php echo $row1['maturity_date']; ?> </td>
                                        <td> <?php echo $row1['expiry_date']; ?> </td>
                                        <td> <?php echo $row1['principal']; ?> </td>
                                        <td> <?php echo $row1['interest']; ?> </td>
                                        <td> <?php echo $row1['penalty']; ?> </td>
                                        <td> <?php echo $row['service_charge']; ?> </td>
                                        <td> <?php echo $row['total_amount_due']; ?> </td>
                                        <td> <?php echo $row['renewal_amnt']; ?> </td>
                                        <td>
                                        <a href="renewalview.php?id=<?= $row1['pawnticketno'];?>&redid=<?=$row['renewalid'];?>" class="btn btn-info viewbtn">VIEW</a>
                                        <a href="editrenewal.php?id=<?= $row1['pawnticketno'];?>&redid=<?=$row['renewalid'];?>" class="btn btn-success editbtn">EDIT</a>
                                        <a href="moverenewal.php?id=<?= $row1['pawnticketno'];?>&redid=<?=$row['renewalid'];?>" class="btn btn-warning editbtn">MOVE</a>

                                        <a href="deleterenewal.php?id=<?= $row1['pawnticketno']; ?>&redid=<?=$row['renewalid'];?>" name="deletedata" class="btn btn-danger deletebtn">DELETE</a>
                                        </td>
                                      </tr>
                                    
                                  </tbody>                              
          <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
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
