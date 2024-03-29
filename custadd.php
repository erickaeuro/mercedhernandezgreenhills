<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Customer | Merced Hernandez Greenhills</title>

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

         if(isset($_GET['edit'])){                           
            $query = "SELECT * FROM custsample WHERE edit_no='10' ";
            $query_run = mysqli_query($con, $query);
           
            if(mysqli_num_rows($query_run) > 0)
            {
                $row = mysqli_fetch_array($query_run);  
            } else{

            }
               }
        ?>
        <!-- End of Topbar -->
<style>

.wrapper {
  display: grid;
  grid-template-columns: 350px 350px 360px;
}

</style> 

        <div class="row">
            <div class="col-md-12">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 1200px;">
                    <div class="card-header">
                        <h4><b>Add Customer</b>                      
                    </div>
                    <?php
                            if(isset($_SESSION['custstatus'])){
                        ?>
                                <div class="alert alert-warning" role="alert" role ="alert">
                                    <?= $_SESSION['custstatus'];?>
                                    <button type = "button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                            </div>
                            <?php
                            $_SESSION['edit'] = 10;
                            unset($_SESSION['custstatus']);
                            }?>

                    <div class="card-body">
                        <form action="addcustomer.php" method="POST" enctype="multipart/form-data">

                        <div class="wrapper">
                            <div class="form-group col-md-12">
                                <label for="first_name"><b>First Name</b></label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="<?=$row['first_name'];?>" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="middle_name"><b>Middle Name</b></label>
                                <input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name" value="<?=$row['middle_name'];?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="last_name"><b>Last Name</b></label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?=$row['last_name'];?>" required>
                            </div>
                        </div>

                            <div class="form-group col-md-11">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Full Address" value="<?=$row['address'];?>" required>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="cpnum">Contact Number</label>
                                <input type="text" class="form-control" name="cpnum" placeholder="Enter Contact Number" value="<?=$row['cpnum'];?>" required>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" class="form-control" name="BirthDate" placeholder="Birthdate" value="<?=$row['birthdate'];?>" required>
                            </div>

                            <div class="form-group col-md-11">
                              
                                <label for="valid_id">Valid ID</label>
                                <input type="file" class="form-control" accept="image/*" name="file" required>
                            </div>

                            </div>
                            <div class="mb-4">
                            <center> 
                            <a href="customer.php" class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                            <button type="submit" name="addcustomer" class="btn text-white" style="background-color: #81C784;" >Add New Customer</button> 
                            </center>
                            </div>
                        </form>
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
