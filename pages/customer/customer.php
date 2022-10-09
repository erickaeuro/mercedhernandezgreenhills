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

<!-- Connection Database --> 
  <?php 
  include '../head.php'; 
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
        if($_GET['del'] == 1){
          echo"<div class='alert alert-success' role='alert'>Successfully Deleted
          <button type='button' class='close' data-dismiss='alert'>x</button>
          </div>";
        }

        if(isset($_SESSION['custstatus']))
        {
            ?>
                <div class="alert alert-success" role="alert" role="alert">
                    <?= $_SESSION['custstatus']; ?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php 
            unset($_SESSION['custstatus']);
        }?>
        
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          
        <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
            <h4>
                <a href="custadd.php" class="btn btn-info btn-icon-text btn-md"> <i class="fas fa-plus"></i> Add Customer</a>
            </h4>
        </div>
        
          <!-- Content Row -->

          <form action= "addcustomer.php" method="POST">

            <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-info border-bottom-info">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-info">Customers</h6>
                      </div>
                      <!-- Card Body -->

                      <?php require '../connection.php'; ?>

                      <?php 

                            $query = "SELECT * FROM customertbl";
                            $query_run = mysqli_query($con, $query);

                      ?> 
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-hover display" id="" width="100%" cellspacing="0">
                                  <thead>
                                      <tr style="font-size:13px;font-family:sans-serif;">
                                          <th>Customer No.</th>
                                          <th>Name</th>
                                          <th>Address</th>
                                          <th>Contact Number</th>
                                          <th>Birthdate</th>
                                          <th>Valid ID</th>
                                          <th>Action</th>
                                          <th></th>
                                      </tr>

                                  </thead>
            <?php
              
                    foreach($query_run as $row)
                    {
            ?>
                                  <tbody>
                                      <tr>
                                        <td> <?php echo $row['customerno']; ?> </td>
                                        <td> <?php echo $row['name']; ?> </td>
                                        <td> <?php echo $row['address']; ?> </td>
                                        <td> <?php echo $row['cpnum']; ?> </td>
                                        <td> <?php echo $row['birthdate']; ?> </td>
                                        <td> <?php echo $row['valid_id']; ?> </td>
                                        <td>
                                        <a href="custview.php?id=<?= $row['customerno'];?>" class="btn btn-info viewbtn">VIEW</a>
                                        <a href="custedit.php?id=<?= $row['customerno'];?>" class="btn btn-success editbtn">EDIT</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal">DELETE</button>
                                        </td>
                                      </tr>
                                  </tbody>

                                  <!--MODAL FOR Delete-->
                                  <div class="modal" id="DeleteModal">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                            <h4 class="modal-title">Confirm Deletion?</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
                                          </div>
                                          <!-- Modal body -->
                                          <div class="modal-body">
                                            <strong>WARNING!!</strong><br/>
                                            You are about to delete the selected ticket
                                            are you sure you want to continue?
                                          </div>
                                          <!-- Modal footer -->
                                          <div class="modal-footer">
                                          <a href="custdelete.php?id=<?=$row['customerno'];?>" name="deletedata" class="btn btn-success">Yes</a>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  
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
