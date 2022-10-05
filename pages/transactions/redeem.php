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
            <a href="redeembtn.php" class="btn btn-info btn-icon-text btn-md"> 
            <i class="fas fa-plus"></i> Add Redeem Loan</a>
        </div>
          <!-- Content Row -->

            <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-info border-bottom-info">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-info">Redeem Loan</h6>
                      </div>
                      <!-- Card Body -->
                      <div class="card-body">

                      <?php 
                            $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                            if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
                        ?> 

                      <?php 

                            //Return data from pawnticket Table
                            $query = "SELECT * FROM pawntickettbl WHERE transactiontype='Redeem'";
                            $query_run = mysqli_query($con, $query);
                            

                            //Return data from Redeem Table
                            $query2 = "SELECT * FROM redeemtbl";
                            $query_run2 = mysqli_query($con, $query2);
                            
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
                                          <th>Redemption Amount</th>
                                          <th>Action </th>
                                      </tr>
                                  </thead>
            <?php
              
                foreach($query_run2 as $row2)
                {
                    foreach ($query_run as $row)
                    {        
            ?>
                                  <tbody>
                                      <tr>
                                      <td> <?php echo $row2['pawnticketno']; ?> </td>
                                        <td> <?php echo $row['customerno']; ?> </td>
                                        <td> <?php echo $row['dateloangranted']; ?> </td>
                                        <td> <?php echo $row['maturity_date']; ?> </td>
                                        <td> <?php echo $row['expiry_date']; ?> </td>
                                        <td> <?php echo $row['principal']; ?> </td>
                                        <td> <?php echo $row['interest']; ?> </td>
                                        <td> <?php echo $row['penalty']; ?> </td>
                                        <td> <?php echo $row2['redemption_amnt']; ?> </td>
                                        <td>
                                            <a href="redeemview.php?id=<?= $row['pawnticketno'];?>&redid=<?=$row2['redeemid'];?>" class="btn btn-info viewbtn">VIEW</a>
                                            <a href="editredeem.php?id=<?= $row['pawnticketno'];?>&redid=<?=$row2['redeemid'];?>" class="btn btn-success editbtn">EDIT</a>
                                            <a href="deleteredeem.php?id=<?= $row['pawnticketno'];?>&redid=<?=$row2['redeemid'];?>" name="deletedata" class="btn btn-danger deletebtn">DELETE</a>
                                        </td>
                                      </tr>
                                  </tbody>

          <?php           
                    
                  }
                }
               /* else 
                {
                    echo "No Record Found";
                }*/
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
