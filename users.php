<?php
session_start();
include('session.php');
?>
<!DOCTYPE html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Users | Merced Hernandez Greenhills</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href= "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet"> 
  <link href= "https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- Connection Database --> 
  <?php include ("connection.php"); 
  
  error_reporting(0);
?>

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
        <?php include 'navbar.php'; 
        

 //EDIT & ADD ALERT//        
 if(isset($_SESSION['userstatus1']))
 {
     ?>
         <div class="alert alert-success" role="alert" role="alert">
             <?= $_SESSION['userstatus1']; ?>
             <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
         </div>
     <?php 
     unset($_SESSION['userstatus1']);
 }?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


        <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
            <h4>
              <a href="addinguser.php" class="btn text-white btn-md" style="background-color: #DE9185;">
              <i class="fas fa-plus"></i> Add Users</a>
            </h4> 
        </div>
        
<body>

    
        <div class="row">

                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-primary border-bottom-primary">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-dark">Users Table</h6>
                      </div>
                      <!-- Card Body -->
                        <div class="card-body">

                        <?php 
                              
                              $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                              if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}

                              $query = "SELECT * FROM users";
                              $query_run = mysqli_query($con, $query);
                            
                        ?> 

                          <div class="table-responsive">
                              <table id="dtbl" class="table table-striped" width="100%" cellspacing="0">
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
                                      </tr>
                                  </thead>

                      <tbody>

                      <?php
              
                        foreach($query_run as $row)
                        {
                            $username = $row['username'];
                            $usertype = $row['usertype'];

                        ?>
                        <tr>
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['username']; ?> </td>
                        <td> <?php echo $row['email']; ?> </td>
                        <td> <?php echo $row['cname']; ?> </td>
                        <td> <?php echo $row['contactno']; ?> </td>
                        <td> <?php echo $row['address']; ?> </td>
                        <td> <?php echo $row['usertype']; ?> </td>
                        <td> 
                      <?php
                      if($row['status']==1){
                        echo '<p><a  href="status.php?id='.$row['id'].'&status=0 " class="btn btn-success">Enable</a></p>';
                      }else{
                        echo '<p><a href="status.php?id='.$row['id'].'&status=1 " class="btn btn-danger">Disable</a></p>';
                      }
                      ?>
                          
                      </td>
                        <td>

                            <a href="userview.php?id=<?= $row['id'];?>" class="btn text-white" style="background-color: #7FD2D4;">VIEW</a>
                            <a href="editinguser.php?id=<?= $row['id'];?>" class="btn text-white" style="background-color: #81C784">EDIT</a>
                            <a href="deleteuser.php?id=<?= $row['id']; ?>" name="del" class="btn text-white" style="background-color: #B0B0AB" onclick="return confirm('Are you sure you want to delete this record?')">DELETE</a>
                        </td>
                            
                        <?php    }?>      
                 
                        </tr>
                      </tbody>                     
                                     
                              </table>
                          </div>
                      </div>
                  </div>
                   
                  <?php

               //   if(isset($_GET['id']))
               //   {
               //       $redid = mysqli_real_escape_string ($con, $_GET['id']);

                      //$query = "DELETE FROM users WHERE id='$redid'";

              //        $userstatus = $row['userstatus'];

              //        if($userstatus == "Active"){

              //        $query = "UPDATE users set userstatus = 'Inactive' WHERE id='$redid'";

              //        if(mysqli_query($con, $query))
              //        {
                          //echo "<div class='alert alert-danger'>";
                          //header("Location:users.php");
            //              header("Refresh:0");
             //         }
             //         else
             //         {
             //             echo '<script> alert("User not Updated"); </script>';
              //        }

              //        }

                      //ELSE
             //         else if($userstatus == "Inactive"){
             //         $query = "UPDATE users set userstatus = 'Active' WHERE id='$redid'";

             //         if(mysqli_query($con, $query))
             //         {
                          //echo "<div class='alert alert-danger'>";
                          //header("Location:users.php");
            //              header("Refresh:0");
           //           }
          //            else
          //            {
         //                 echo '<script> alert("User not Updated"); </script>';
         //             }
        //              }                     
      //            }

?>
              </div>    
            
            </div>
        </div>
             
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
        <?php include 'footer.php'; ?>
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
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <!-- <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>




<?php include 'scripts.php'; ?>   

<script>
        $(document).ready(function () {

            $('#dtbl').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                order: [[0, 'desc']],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Data",
                }
            });

        });
    </script>
 


</body>
</html>