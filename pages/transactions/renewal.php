<!DOCTYPE html>
<html lang="en">

    <?php include '../head.php'; 
    error_reporting(0);
    session_start();
    
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
        <?php include '../navbar.php'; 
        //DELETE ALERT//   
        if($_GET['del'] == 1){
          echo"<div class='alert alert-success' role='alert'>Successfully Deleted
          <button type='button' class='close' data-dismiss='alert'>x</button>
          </div>";
        }
        //EDIT & ADD ALERT//        
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
            <h4 class="m-0 font-weight-bold text-info">
            LOANS FOR RENEWAL
            </h4>
        </div>
          <!-- Content Row -->

            <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-info border-bottom-info">
                      <!-- Card Header - Dropdown -->

                      <!-- Card Body -->
                      <div class="card-body">

                      <?php 
                            $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                            if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
                        ?> 

                      <?php 
                            $query = "SELECT * FROM loantbl INNER JOIN customertbl ON loantbl.customer_no = customertbl.customer_no WHERE loantbl.loan_status ='Active Loan'";
                            $query_run = mysqli_query($con, $query);

                      ?> 

                          <div class="table-responsive">
                              <table class="table table-hover display" id="" width="100%" cellspacing="0">
                                  <thead>
                                      <tr style="font-size:13px;font-family:sans-serif;">
                                      <th>Loan ID</th>
                                          <th>Customer Name</th>
                                          <th>Item Type</th>
                                          <th>Item Description</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
        
                                  <tbody>
          <?php
              
              foreach($query_run as $row)
              {
                $firstn = $row['first_name'];
                $middlen = $row['middle_name'];
                $lastn = $row['last_name'];
                $fulln = "$firstn $middlen $lastn";
          ?>
                                  <td> <?php echo $row['loan_id']; ?> </td>
                                  <td> <?php echo $fulln ; ?> </td>
                                  <td> <?php echo $row['item_type']; ?> </td>
                                  <td> <?php echo $row['item_desc']; ?> </td>
                                  <td>
                                      <a href="renewalview.php?id=<?= $row['loan_id'];?>" class="btn btn-info viewbtn">VIEW</a>                                      
                                  </td>
                            </tr>
                <?php 
                  
                  }

                  ?>  
                                  </tbody>                                 

             
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
