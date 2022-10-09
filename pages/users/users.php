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
  
  session_start();
  error_reporting(0);
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
                        <h4>
                            <a href="addinguser.php" class="btn btn-info btn-icon-text btn-md"> <i class="fas fa-plus"></i>Add Users</a>
                        </h4>
                    </div>
          <!-- Content Row -->
          

            <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-info border-bottom-info">
                      <!-- Card Header - Dropdown -->
                      <!-- <div class="alert alert-success">
                          hello
                        </div> -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        
                          <h6 class="m-0 font-weight-bold text-info">Users</h6>
                      </div>

                      <?php 
                  
                            $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                            if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
       
                    
                        ?> 
                <?php 

                      $query = "SELECT * FROM users";
                      $query_run = mysqli_query($con, $query);
                     
                ?> 
                      <!-- Card Body -->
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-hover display" id="" width="100%" cellspacing="0">
                                  <thead>
                                      <tr style="font-size:13px;font-family:sans-serif;">
                                          <th>User ID</th>
                                          <th>Username</th>
                                          <th>Email Address</th>
                                          <th>Complete Name</th>
                                          <th>Contact Number</th>
                                          <th>Address</th>
                                          <th>User Type</th>
                                          <th>User Status</th>
                                          <th>Action</th>
                                          <th></th>
                                      </tr>
                                  </thead>
                                  
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
      
                  <tbody>
                  <tr>
                      <td> <?php echo $row['id']; ?> </td>
                      <td> <?php echo $row['username']; ?> </td>
                      <td> <?php echo $row['email']; ?> </td>
                      <td> <?php echo $row['cname']; ?> </td>
                      <td> <?php echo $row['contactno']; ?> </td>
                      <td> <?php echo $row['address']; ?> </td>
                      <td> <?php echo $row['usertype']; ?> </td>
                      <td> <a href="users.php?id=<?= $row['id'];?>" name="userstatus" class="btn btn-success editbtn"><?php echo $row['userstatus']; ?></a> </td>
                      <td>
                          <a href="editinguser.php?id=<?= $row['id'];?>" class="btn btn-success editbtn">EDIT</a>
                          <a href="deleteuser.php?id=<?= $row['id']; ?>" name="deletedata" class="btn btn-danger deletebtn">DELETE</a>
                      </td>
                    </tr>
                      
                  </tbody>

                  <?php

                    if(isset($_GET['id']))
                    {
                        $redid = mysqli_real_escape_string ($con, $_GET['id']);

                        //$query = "DELETE FROM users WHERE id='$redid'";
                    
                        $userstatus = $row['userstatus'];

                        if($userstatus == "Active"){

                        $query = "UPDATE users set userstatus = 'Inactive' WHERE id='$redid'";

                        if(mysqli_query($con, $query))
                        {
                            //echo "<div class='alert alert-danger'>";
                            //header("Location:users.php");
                            header("Refresh:0");
                        }
                        else
                        {
                            echo '<script> alert("User not Updated"); </script>';
                        }

                        }

                        //ELSE
                        else if($userstatus == "Inactive"){
                        $query = "UPDATE users set userstatus = 'Active' WHERE id='$redid'";

                        if(mysqli_query($con, $query))
                        {
                            //echo "<div class='alert alert-danger'>";
                            //header("Location:users.php");
                            header("Refresh:0");
                        }
                        else
                        {
                            echo '<script> alert("User not Updated"); </script>';
                        }
                        }                     
                    }

?>

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

