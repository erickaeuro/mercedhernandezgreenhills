<?php
session_start();
error_reporting(0);
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
  grid-template-columns: 500px 550px;
}

</style> 

        <div class="row">
            <div class="col-md-12">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 1200px;">
                    <div class="card-header">
                        <h4><b>Edit Jewelry Stocks</b>                      
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

                            <form action="editcode.php" method="POST" enctype="multipart/form-data">

                            
                            <input type="hidden" name="id" value='<?= $row['id']; ?>'>

                            <div class="form-group col-md-11">
                                <label for="stock_no"><b>Stock No.</b></label>
                                <input type="text" class="form-control" name="stock_no" accept=".jpg, .jpeg, .png" value="<?= $row['stock_no']; ?>" readonly>
                            </div>  

                            <div class="form-group col-md-11">
                                <label for="itemtype"><b>Item Type</b></label>
                                <input type="text" class="form-control" name="item_type" value="<?= $row['item_type']; ?>">
                            </div>
                       

                            <div class="form-group col-md-11">
                                <label for="itemdescription"><b>Item Description</b></label>
                                <textarea class="form-control" rows="3"  name="itemdescription" placeholder="<?= $row['itemdescription']; ?>"><?= $row['itemdescription']; ?></textarea>
                            </div>
                           
                        <div class="wrapper">
                            <div class="form-group col-md-12">
                                <label for="Karat-gold"><b>Karat/Gold</b></label>
                                <input type="text" class="form-control" name="karat_gold" value="<?= $row['karat_gold']; ?>" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="kindofstone"><b>Kind of Stone</b></label>
                                <input type="text" class="form-control" name="kindofstone" value="<?= $row['kindofstone']; ?>" >
                            </div>
                        </div>
                            <div class="form-group col-md-11">
                                <label for="weight"><b>Weight</b></label>
                                <input type="text" class="form-control" name="weight" value="<?= $row['weight']; ?>" >
                            </div>

                            <div class="form-group col-md-11">
                                <label for="itemqty"><b>Item Quantity</b></label>
                                <input type="number" class="form-control" name="itemqty" value="<?= $row['itemqty']; ?>" >
                            </div>

                            <div class="form-group col-md-11">
                                <label for="tagprice"><b>Tag Price</b></label>
                                <input type="text" class="form-control" name="tagprice" value="<?= $row['tagprice']; ?>" >
                            </div>

                            <div class="form-group col-md-11">
                                <label for="Date Sold"><b>Date Sold</b></label>
                                <input type="date" class="form-control" name="date_sold" >
                            </div>

                            <div class="form-group col-md-11">
                                <label for="image"><b>Image of Jewelry</b></label><br/>
                                <a href="stockimgedit.php?id=<?= $id?>" class="btn text-white" style="background-color: #81C784 ">EDIT IMAGE </a>
                            </div>
                        

                        </div>
                        <div class="mb-4">
                            <center> 
                            <a href="stocks.php"  class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                            <button type="button" class="btn text-white" style="background-color: #81C784;" data-bs-toggle="modal" data-bs-target="#EditModal">Edit Stocks</button> 
                            </center>
                            </div>  
                            
                            <!--MODAL FOR EDIT-->
                            <div class="modal" id="EditModal">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Confirm Edit?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        Do you want to save the changes?
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="submit" name="editjewelry" class="btn text-white" style="background-color: #81C784;">Yes</button> 
                                        <button type="button"  class="btn text-white" style="background-color: #B0B0AB;" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
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
