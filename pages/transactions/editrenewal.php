<?php
session_start();
require '../connection.php';

?>

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
                        <h4><b>Edit Redeem Ticket</b>                      
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM pawntickettbl WHERE pawnticketno='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);

                                $namequery = "SELECT * FROM customertbl WHERE customerno='".$row['customerno']."'" ;
                                $namequery_run = mysqli_query($con, $namequery);
                                $row2 = mysqli_fetch_array($namequery_run);

                                $redid = mysqli_real_escape_string($con, $_GET['redid']);

                                $query2 = "SELECT * FROM renewaltbl WHERE renewalid='$redid'" ;
                                $query_run2 = mysqli_query($con, $query2);
                                $row3 = mysqli_fetch_array($query_run2);

                                ?>

                            <form action="editrenewalbtn.php" method="POST">

                            
                            <input type="hidden" name="id" value='<?= $row['id']; ?>'>

                            <div class="form-group col-md-12">
                                <label for="renewalid"><b>Renewal ID</b></label>
                                <input type="text" class="form-control" name="renewalid" value="<?= $row3['renewalid']; ?>" >
                            </div> 

                            <div class="form-group col-md-12">
                                <label for="pawnticketno"><b>Pawn Ticket Number</b></label>
                                <input type="text" class="form-control" name="pawnticketno" value="<?= $row['pawnticketno']; ?>" >
                            </div>  

                            <div class="form-group col-md-12">
                                <label for="customername"><b>Customer Name </b></label>
                                <input type="text" class="form-control" name="customername" value="<?= $row2['name']; ?>" disabled>
                            </div>  

                            <div class="form-group col-md-12">
                                <label for="Date Loan"><b>Date Loan Granted</b></label>
                                <input type="date" class="form-control" name="dateloangranted" value="<?= $row['dateloangranted']; ?>" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Mat Date"><b>Maturity Date </b></label>
                                <input type="date" class="form-control" name="maturity_date" value="<?= $row['maturity_date']; ?>" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Expire Date"><b>Expiry Date</b></label>
                                <input type="date" class="form-control" name="expiry_date" value="<?= $row['expiry_date']; ?>" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="principal"><b>Principal </b></label>
                                <input type="text" class="form-control" name="principal" value="<?= $row['principal']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="interest"><b>Interest </b></label>
                                <input type="text" class="form-control" name="interest" value="<?= $row['interest']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="penalty"><b>Penalty</b></label>
                                <input type="text" class="form-control" name="penalty" value="<?= $row['penalty']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="service_charge">Service Charge</label>
                                <input type="text" class="form-control" name="service_charge" value="<?=$row3['service_charge'];?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="total_amount_due">Total Amount Due</label>
                                <input type="text" class="form-control" name="total_amount_due" value="<?=$row3['total_amount_due'];?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="renewal_amnt"><b>Renewal Amount</b></label>
                                <input type="text" class="form-control" name="renewal_amnt" value="<?= $row3['renewal_amnt']; ?>">
                            </div>
                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="renewal.php" class="btn btn-danger float-end">Back</a>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EditModal">Edit Ticket</button>
                            
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
                                        Do you want to save the changes
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" name="editrenewal" class="btn btn-success">Yes</button> 
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>