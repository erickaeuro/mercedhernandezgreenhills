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
                        <h4><b>Edit Loan</b>                      
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM loantbl INNER JOIN customertbl ON loantbl.customer_no = customertbl.customer_no WHERE loantbl.loan_id='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);                                
                                ?>

                            <form action="loaneditbtn.php" method="POST">

                            
                            <input type="hidden" name="id" value='<?= $row['id']; ?>'>

                            <div class="form-group col-md-12">
                                <label for="loan_id"><b>Loan ID</b></label>
                                <input type="text" class="form-control" name="loan_id" value="<?= $row['loan_id']; ?>" readonly>
                            </div>  

                            <div class="form-group col-md-12">
                                <label for="customerno"><b>Customer No. </b></label>
                                <input type="text" class="form-control" name="customerno" value="<?= $row['customer_no']; ?>" readonly>
                            </div> 

                            <div class="form-group col-md-12">
                                <label for="customername"><b>Customer Name </b></label>
                                <input type="text" class="form-control" name="customername" value="<?= $row['name']; ?>" readonly>
                            </div>   

                            <div class="form-group col-md-12">
                                <label for="ItemType"><b>Item Type </b></label>
                                <input type="text" class="form-control" name="item_type" value="<?= $row['item_type']; ?>">
                            </div> 

                            <div class="form-group col-md-12">
                                <label for="ItemDesc"><b>Item Description </b></label>
                                <textarea class="form-control" rows="3" name="item_desc" placeholder="<?= $row['item_desc']; ?>"><?= $row['item_desc']; ?></textarea>
                            </div> 

                            <div class="form-group col-md-12">
                                <label for="AppraisedVal"><b>Appraised Value </b></label>
                                <input type="text" class="form-control" name="appraisal" value="<?= $row['appraised_value']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="principal"><b>Principal </b></label>
                                <input type="text" class="form-control" name="principal" value="<?= $row['principal']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="interest"><b>Interest </b></label>
                                <input type="text" class="form-control" name="interest" value="<?= $row['interest']*100; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Date Loan"><b>Date Loan Granted</b></label>
                                <input type="date" class="form-control" name="date_loan" value="<?= $row['date_loan_granted']; ?>" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Mat Date"><b>Maturity Date </b></label>
                                <input type="date" class="form-control" name="date_mat" value="<?= $row['maturity_date']; ?>" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Expire Date"><b>Expiry Date</b></label>
                                <input type="date" class="form-control" name="date_expire" value="<?= $row['expiry_date']; ?>" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="total_amt_paid"><b>Total Amount Paid</b></label>
                                <input type="text" class="form-control" name="total_amt_paid" value="<?= $row['total_amt_paid']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="loanstatus"><b>Loan Status </b></label><br>
                                <select class="custom-select" name="loan_status" style="width:410px; position: relative; left:10px; top:-1px">
                                    <option value="<?= $row['loan_status']; ?>" selected="selected"><?= $row['loan_status']; ?></option>
                                    <option value="Active Loan">Active Loan</option>
                                    <option value="Redeemed">Redeemed</option>
                                    <option value="For Auction">For Auction</option>
                                </select>
                            </div> 
                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="loan.php" class="btn btn-danger float-end">Back</a>
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
                                        <button type="submit" name="editticket" class="btn btn-success">Yes</button> 
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