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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  

<!-- Connection Database --> 
  <?php include ("../connection.php"); 
  
  session_start();
  error_reporting(0);
  if($_GET['del'] == 1){
    echo"<div class='alert alert-success' role='alert'>Successfully Deleted
    <button type='button' class='close' data-dismiss='alert'>x</button>
    </div>";
}
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

        <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
                        <h4>
                            <a href="stockadd.php" class="btn btn-info btn-icon-text btn-md"> <i class="fas fa-plus"></i>Add Jewelry Stocks</a>
                        </h4>
                    </div>
        
<body>

    <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-info border-bottom-info">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-info">Jewelry Stocks</h6>
                      </div>
                      <!-- Card Body -->

                      <div class="card">
                        <div class="card-body">

                        <?php 
                            $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                            if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
                        ?> 

                      <?php 

                            $query = "SELECT * FROM inventorytbl where move='0'";
                            $query_run = mysqli_query($con, $query);
                      ?> 

                          <div class="table-responsive">
                              <table id="dtid" class="table table-hover display" width="100%" cellspacing="0">
                                
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
                                          <th>Action</th>
                                      </tr>
                                  </thead>
          <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>

               

                <form action = "stocks.php" method = "POST">

                    <tbody>
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
                            <td>
                                <a href="stockview.php?id=<?= $row['stock_no'];?>" class="btn btn-info viewbtn">VIEW</a>
                                <a href="stockedit.php?id=<?= $row['stock_no'];?>" class="btn btn-success editbtn">EDIT</a>
                                <input type = "submit" class="btn btn-warning" name="move" value="MOVE">

                                <a href="deletecode.php?id=<?= $row['stock_no']; ?>" name="deletedata" class="btn btn-danger deletebtn">DELETE</a>
                                  
                                
                            </td> 
                    </div> 
                        </tr>
                    </tbody>        
                    
                </form>
                
               
         <?php           
                    }
                    
                    if(isset($_POST['move']))
                    { 
                        $stock = $row['stock_no'];
                        
                        $move = "Update inventorytbl set move = '1' where stock_no = '$stock'";
                        $insert_row = $con->query($move) or die ($con->error.__LINE__);
                        echo '<script>alert("Moved")</script>';
                        //eader("Location:stocks.php");
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>


<?php include '../scripts.php'; ?>   

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
                    searchPlaceholder: "Search Records",
                }
            });

        });
    </script>

</body>
</html>