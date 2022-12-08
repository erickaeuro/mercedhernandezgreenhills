<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Merced Hernandez Greenhills</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href= "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet"> 
  <link href= "https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  

<!-- Connection Database --> 
  <?php include ("connection.php"); 
  
  session_start();
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
        <?php include 'navbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php 
      

              if(isset($_SESSION['status']))
              {
                  ?>
                      <div class="alert alert-success" role="alert" role="alert">
                          <?= $_SESSION['status']; ?>
                          <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                      </div>
                  <?php 
                  unset($_SESSION['status']);
              }

        ?>
        
<body>

    <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-primary border-bottom-primary">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-dark">Sold Jewelry Stocks</h6>
                      </div>
                      <!-- Card Body -->

                      <div class="card">
                        <div class="card-body">

                        <?php 
                            $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                            if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
                        ?> 

                      <?php 

                            $query = "SELECT * FROM inventorytbl where move='1'";
                            $query_run = mysqli_query($con, $query);
                      ?> 

                          <div class="table-responsive">
                              <table id="dtid" class="table table-striped" width="100%" cellspacing="0">
                                
                                  <thead>
                                      <tr style="font-size:13px;font-family:sans-serif;">
                                          <th>Stock No.</th>
                                          <th>Item Type</th>
                                          <th>Item Description</th>
                                          <th>Karat/Gold</th>
                                          <th>Kind of Stone</th>
                                          <th>Weight</th>
                                          <th>Item Quantity</th>
                                          <th>Tag Price</th>
                                          <th>Date Sold</th>
                                          <th>Date Created</th>
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
                                <td> <?php echo $row['stock_no']; ?> </td>
                                <td> <?php echo $row['item_type']; ?> </td>
                                <td> <?php echo $row['itemdescription']; ?> </td>
                                <td> <?php echo $row['karat_gold']; ?> </td>
                                <td> <?php echo $row['kindofstone']; ?> </td>
                                <td> <?php echo $row['weight']; ?> </td>
                                <td> <?php echo $row['itemqty']; ?> </td>
                                <td> <?php echo $row['tagprice']; ?> </td>
                                <td> <?php echo $row['date_sold']; ?> </td>
                                <td> <?php echo $row['date_created']; ?> </td>
                                <td>
                                <a href="soldstockview.php?id=<?= $row['stock_no'];?>" class="btn text-white" style="background-color: #7FD2D4;">VIEW</a>
                                <a href="soldstockedit.php?id=<?= $row['stock_no'];?>" class="btn text-white" style="background-color: #81C784 ">EDIT</a>
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
          <a class="btn btn-primary" href="../login_register/login.php">Logout</a>
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
    $(document).ready(function() {
    $('dtid').DataTable();
    } );
    </script>

    <script>
        $(document).ready(function () {

            $('#dtid').DataTable({
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