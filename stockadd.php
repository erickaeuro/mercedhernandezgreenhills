<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Stocks | Merced Hernandez Greenhills</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  

<!-- Connection Database --> 
  <?php include ("connection.php"); 
  error_reporting(0);
  session_start();
?>

<style type="text/css">
		.error {
			color:red;
		}
	</style>

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
<?php 
if(isset($_SESSION['status']))
              {
                  ?>
                      <div class="alert alert-success" role="alert" role="alert">
                          <?= $_SESSION['status']; ?>
                          <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                      </div>
                      
                  <?php 
                  $_SESSION['edit'] = 10;
                  unset($_SESSION['status']);
              }
?>

<?php 
if(isset($_SESSION['status3']))
              {
                  ?>
                      <div class="alert alert-success" role="alert" role="alert">
                          <?= $_SESSION['status3']; ?>
                          <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                      </div>
                      
                  <?php 
                  unset($_SESSION['status3']);
              }
?>
        <div class="row">
            <div class="col-md-12">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 1200px;">
                    <div class="card-header">
                        <h4><b>Add Jewelry Stocks</b>                      
                    </div>
                    <?php
                     if(isset($_GET['edit'])){                           
                            $query = "SELECT * FROM stockssample WHERE edit_no='10' ";
                            $query_run = mysqli_query($con, $query);
                           
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);  
                            } else{

                            }
                               }

                     

                    ?>
                    <div class="card-body">
                        <form action="addcode.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group col-md-11">
                                <label for="image"><b>Image of Jewelry *</b></label>
                                <input type="file" accept="image/*" class="form-control" name="file" required>
                            </div>
                           
                        

                            <div class="form-group col-md-11">
                                <label for="itemtype"><b>Item Type *</b></label>
                                <input type="text" class="form-control" name="item_type" placeholder="Enter Item Type" value="<?=$row['item_type'];?>" required>
                            </div>

                        
                            <div class="form-group col-md-11">
                                <label for="description"><b>Item Description *</b></label>
                                <input type="text" class="form-control" name="itemdescription" placeholder="<?=$row['itemdescription'];?>" value="<?=$row['itemdescription'];?>" required>
                                <!-- <textarea rows="3" class="form-control" name="itemdescription" placeholder="" value="" required></textarea> -->
                            </div>

                        <div class="wrapper">
                            <div class="form-group col-md-12">
                                <label for="Karat-gold"><b>Karat/Gold</b></label>
                                <input type="text" class="form-control" name="karat_gold" placeholder="Karat/Gold" value="<?=$row['karat_gold'];?>">
                            </div>

                            <div class="form-group col-md-25">
                                <label for="kindofstone"><b>Kind of Stone </b></label>
                                <input type="text" class="form-control" name="kindofstone" placeholder="Kind of Stone" value="<?=$row['kindofstone'];?>">
                            </div>
                        </div>

                            <div class="form-group col-md-11">
                                <label for="weight"><b>Weight *</b></label>
                                <input type="text" class="form-control" name="weight" placeholder="Weight" value="<?=$row['weight'];?>" required>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="itemqty"><b>Item Quantity *</b></label>
                                <input type="number" class="form-control" name="itemqty" placeholder="Item Quantity" value="<?=$row['itemqty'];?>" required>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="tagprice" ><b>Tag Price * </b></label>
                                <input type="text" class="form-control" name="tagprice" placeholder="P 0.00" value="<?=$row['tagprice'];?>" required >
                            </div>
                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="stocks.php" class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                            <button type="submit" name="addjewelry" class="btn text-white" style="background-color: #81C784;">Add New Stock</button> 
                            </center>
                            </div>
                        </form>

                        <?php
                     
                        
                        ?>
                    </div>
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
