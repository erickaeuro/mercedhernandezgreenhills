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
  include '../head.php';
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
    <?php include '../navbar.php'; 

    if($_GET['del'] == 1){
      echo"<div class='alert alert-success' role='alert'>Successfully Deleted
      <button type='button' class='close' data-dismiss='alert'>x</button>
      </div>";
    }

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
       <a href="loanbtn.php" class="btn btn-info btn-icon-text btn-md"> 
       <i class="fas fa-plus"></i> New Loan</a>
    </div>

    <!-- Content Row -->

    <form action="addpawn.php" method="POST">

            <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-info border-bottom-info">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-info">LOAN RECORDS</h6>
                      </div>
                      <!-- Card Body -->

                      <div class="card-body">
                          <div class="table-responsive">
                          <table class="table table-hover display" id="datatableid" width="100%" cellspacing="0">
                                  <thead>
                                      <tr style="font-size:13px;font-family:sans-serif;">
                                          <th>Loan ID</th>
                                          <th>Customer Name</th>
                                          <th>Item Type</th>
                                          <th>Appraised Value</th>
                                          <th>Principal</th>
                                          <th>interest</th>
                                          <th>Total Amount Paid</th>
                                          <th>Total Amount Due</th>
                                          <th>Loan Status</th>
                                          <th>Maturity Date</th>
                                          <th>Expiration Date</th>
                                          <th>Action</th>
                        
                                      </tr>
                                  </thead>
                        <tbody>
                        <?php
            //CALL RECORDS FOR AUTO UPDATE
            $query = "SELECT * FROM loantbl";
            $query_run = mysqli_query($con, $query);
            date_default_timezone_set('Asia/Manila');
            $today = date("Y-m-d");
            
            //FOR MULTIPLE AUTO UPDATES
            $matrec = array();
            $exprec = array();
        
            
                    foreach($query_run as $row)
                    {
                      //AUTO UPDATE OR DELETE RECORDS
                      if($row['maturity_date'] <= $today && $row['loan_status'] == "Active Loan" && $row['interest'] <= 5){                        
                        array_push($matrec, $row['loan_id']);
                        $matvalid = 1;
                      }
                      if($row['expiry_date'] <=  $today && $row['loan_status'] == "Active Loan"){
                        array_push($exprec, $row['loan_id']);                        
                        $delvalid = 1;
                      }
                      
                      
                    }

                    if($matvalid == 1 || $delvalid == 1){
                      $delsql = 1;
                      $matsql = 1;
                      include 'loanautoupdate.php';
                    }

                    
                    //CALL UPDATED RECORDS                      
                          $query1 = "SELECT * FROM loantbl INNER JOIN customertbl ON loantbl.customer_no = customertbl.customer_no";
                          $query_run1 = mysqli_query($con, $query1);
                      
                    foreach($query_run1 as $row)
                    {
                        $firstn = $row['first_name'];
                        $middlen = $row['middle_name'];
                        $lastn = $row['last_name'];
                        $fulln = "$firstn $middlen $lastn";

              ?>
                            <tr>                                
                                <td> <?php echo $row['loan_id']; ?> </td>
                                <td> <?php echo $fulln ; ?> </td>
                                <td> <?php echo $row['item_type']; ?> </td>
                                <td> <?php echo $row['appraised_value']; ?> </td>
                                <td> <?php echo $row['principal']; ?> </td>
                                <td> <?php echo $row['interest'];?>%</td>
                                <td> <?php echo $row['total_amt_paid']; ?> </td>
                                <td> <?php echo $row['total_amt_due']; ?> </td>
                                <td> <?php echo $row['loan_status']; ?> </td>
                                <td> <?php echo $row['maturity_date']; ?> </td>
                                <td> <?php echo $row['expiry_date']; ?> </td>
                                <td>
                                    <a href="loanview.php?id=<?= $row['loan_id'];?>" class="btn btn-info viewbtn">VIEW</a>
                                    <a href="editloan.php?id=<?= $row['loan_id'];?>" class="btn btn-success editbtn"> EDIT </a>
                                    <a href="deleteloan.php?id=<?= $row['loan_id'];?>" name="deletedata" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">DELETE</a>
                                </td>
                                   
               
                            </tr>
                            <?php } ?>   
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

                  </form>
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
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
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
