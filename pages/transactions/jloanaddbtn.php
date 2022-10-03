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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><b>Add Jewelry Loan</b>                      
                    </div>
                    <div class="card-body">
                        <form action="addjloan.php" method="POST">

                        <?php 

                            echo' &nbsp; Pawn Ticket No.';

                            echo '<select class="custom-select" style="width:410px; position: relative; left:10px; top:-1px">';

                            $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills") or die("connection failed:".mysqli_error());
                            $result = mysqli_query($cser,"SELECT pawnticketno FROM pawntickettbl") or die(mysql_error());


                            if (mysqli_num_rows($result)!=0)
                            {

                            echo'<option value=" " selected="selected">Pawn Ticket No</option>';

                            while($drop_2 = mysqli_fetch_array( $result ))
                            {
                            echo '<option value="'.$drop_2['pawnticketno'].'">'.$drop_2['pawnticketno'].'</option>';

                            }


                            }
                            echo '</select>';


                        ?> 


                        <div class="form-group col-md-12">
                                <label for="customerno">Customer No.</label>
                                <input type="text" class="form-control" name="customerno" placeholder="Customer No." required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="principal">Principal</label>
                                <input type="text" class="form-control" name="principal" placeholder="Principal" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="appraisedvalue">Appraised Value</label>
                                <input type="text" class="form-control" name="kindofstone" placeholder="Kind of Stone" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="weight">Description</label>
                                <input type="text" class="form-control" name="weight" placeholder="Weight" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="itemqty">Interest</label>
                                <input type="number" class="form-control" name="itemqty" placeholder="Item Quantity" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="tagprice">Penalty</label>
                                <input type="text" class="form-control" name="tagprice" placeholder="P 0.00">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Date Sold">Redemption Amount</label>
                                <input type="date" class="form-control" name="date_sold" placeholder="Date Sold" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Date Sold">Renewal Amount</label>
                                <input type="date" class="form-control" name="date_sold" placeholder="Date Sold" required>
                            </div>
                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="jloan.php" class="btn btn-danger float-end">Back</a>
                            <button type="submit" name="addjewelryloan" class="btn btn-success editbtn">Add New Stock</button> 
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


