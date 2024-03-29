<?php
session_start();
require 'connection.php';

?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="item_desc" content="">
  <meta name="author" content="">

  <title>View Auction | Merced Hernandez Greenhills</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  
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

        <div clas"row">
            <div class="col-md-12">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 1200px;">
                    <div class="card-header">
                        <h4><b>View Auctioned Jewelry</b>                      
                    </div>
                    <div class="card-body">

                    <?php
                    
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM auctiontbl WHERE auctionid ='$id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                
                                $row = mysqli_fetch_array($query_run);
                                ?>

                            <div class="form-group col-md-11">
                                <label for="auctionid"><b>Auction ID</b></label>
                                <p class="form-control"> <?= $row['auctionid']; ?>
                            </div>  


                            <div class="form-group col-md-11">
                                <label for="item_type"><b>Item type</b></label>
                                <p class="form-control"> <?= $row['item_type']; ?> </p>
                            </div>

                           

                            <div class="form-group col-md-11">
                                <label for="item_desc"><b>Description</b></label>
                                <p class="form-control"> <?= $row['item_desc']; ?> </p>
                            </div>
                            
                           
                            <div class="form-group col-md-11">
                                <label for="price"><b>Price</b></label>
                                <p class="form-control"> <?= $row['price']; ?> </p>
                            </div>


                            <div class="form-group col-md-11">
                                <label for="status"><b>Item Status</b></label>
                                <p class="form-control"> <?= $row['status']; ?> </p>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="date_sold"><b>Date Sold</b></label>
                                <p class="form-control"> <?= $row['date_sold']; ?> </p>
                            </div>

                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="auction.php" class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                            </center>
                            </div>
                        </form>

                        <?php
                       
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

</div>


<?php include 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
