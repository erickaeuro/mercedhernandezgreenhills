<?php
session_start();
require 'connection.php';

?>

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

<style>

.wrapper {
  display: grid;
  grid-template-columns: 500px 560px;
}

</style>

        <div class="row">
            <div class="col-md-12">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 1200px;">
                    <div class="card-header">
                        <h4><b>View Jewelry Stocks</b>                      
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM inventorytbl WHERE stock_no='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);
                                ?>

                            <div class="form-group col-md-11">
                                <label for="stock_no"><b>Stock No.</b></label>
                                <p class="form-control"> <?= $row['stock_no']; ?>
                            </div>  

                            <div class="form-group col-md-12">
                                <label for="itemtype"><b>Item Type</b></label>
                                <p class="form-control"> <?= $row['item_type']; ?> </p>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="itemdescription"><b>Item Description</b></label>
                                <p class="form-control"> <?= $row['itemdescription']; ?> </p>
                            </div>

                        <div class="wrapper">
                            <div class="form-group col-md-12">
                                <label for="Karat-gold"><b>Karat/Gold</b></label>
                                <p class="form-control"> <?= $row['karat_gold']; ?> </p>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="kindofstone"><b>Kind of Stone</b></label>
                                <p class="form-control"> <?= $row['kindofstone']; ?> </p>
                            </div>
                        </div>

                            <div class="form-group col-md-11">
                                <label for="weight"><b>Weight</b></label>
                                <p class="form-control"> <?= $row['weight']; ?> </p>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="itemqty"><b>Item Quantity</b></label>
                                <p class="form-control"> <?= $row['itemqty'];?> </p>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="tagprice"><b>Tag Price</b></label>
                                <p class="form-control"> <?= $row['tagprice'];?> </p>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="Date Sold"><b>Date Sold</b></label>
                                <p class="form-control"> <?= $row['date_sold']; ?> </p>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="image"><b>Image of Jewelry</b></label>
                                <p class="form-control"> <?= $row['file_name']; ?> </p> 

                            </div>

                                <?php

                                        $stockNo = $row['stock_no'];

                                        $sql=mysqli_query($con,"SELECT file_name FROM inventorytbl where stock_no = $stockNo");

                                        if($sql->num_rows > 0){
                                            while($row=mysqli_fetch_array($sql)){
                                                $imageURL = 'jewelry/'.$row["file_name"];
                                        ?>
                                            <img src="<?php echo $imageURL; ?>" alt="" width="450" height="350" />
                                        <?php }
                                        }else{ ?>
                                            <p>No image(s) found...</p>
                                        <?php } ?>
                          
                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="stocks.php" class="btn text-white" style="background-color: #B0B0AB;">Back</a>
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
