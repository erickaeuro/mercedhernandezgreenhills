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
  error_reporting(0);
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
        <?php include '../navbar.php';
        if(isset($_SESSION['addstatus']))
        {
            ?>
                <div class="alert alert-danger" role="alert" role="alert">
                    <?= $_SESSION['addstatus']; ?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php 
            unset($_SESSION['addstatus']);
        }

        if(isset($_SESSION['addstatus1']))
        {
            ?>
                <div class="alert alert-warning" role="alert" role="alert">
                    <?= $_SESSION['addstatus1']; ?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php 
            unset($_SESSION['addstatus1']);
        }
        ?>
        <!-- End of Topbar -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><b>Generate New Pawn Ticket</b>                      
                    </div>
                    <div class="card-body">
                    
                    <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-2"> 
                            <input type="text" class="form-control" name="id" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>" placeholder="Search for Loan ID">
                        </div>
                        <div class="col-md-4">

                             <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                    </form>

                        <!--FETCH NAME-->
                        <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];

                            $query = "SELECT * FROM loantbl INNER JOIN customertbl ON loantbl.customer_no = customertbl.customer_no WHERE loantbl.loan_id='$id' AND loantbl.loan_status='Active Loan'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_affected_rows($con) == 0){
                                $_SESSION['addstatus1'] = "Loan already Redeemed";
                                header('Location: transactionbtn.php');
                            }
                            $row = mysqli_fetch_array($query_run);

                        }
                        
            
                        ?>


                        <form action="addtransaction.php" method="POST">

                        <div class="form-group col-md-12">
                            <label for="loanstatus"><b>Transaction Type </b></label><br>
                            <select class="custom-select" name="transctype" style="width:410px; position: relative; left:10px; top:-1px">
                                <option value="" selected="selected">Select Transaction Type </option>
                                <option value="Renewal">Renewal</option>
                                <option value="Redeem">Redemption</option>                                
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="loan_id"><b>Loan ID</b></label>
                            <input type="text" class="form-control" name="loan_id" value="<?php if(isset($_GET['id'])){echo $row['loan_id'];} ?>" readonly>
                        </div>
                        
                        

                        <!--FOR VALIDATION PURPOSES-->
                        <div class="form-group col-md-12">
                            <label for="custfname"><b>First Name</b></label>
                            <input type="text" class="form-control" name="cust_fname" value="<?php if(isset($_GET['id'])){ echo $row['first_name'];}?>" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="custlname"><b>Last Name</b></label>
                            <input type="text" class="form-control" name="cust_lname" value="<?php if(isset($_GET['id'])){ echo $row['last_name'];}?>" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="itemtyoe"><b>Item Type</b></label>
                            <input type="text" class="form-control" name=" " value="<?php if(isset($_GET['id'])){ echo $row['item_desc'];}?>" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="itemdesc"><b>Item Description</b></label>
                            <input type="text" class="form-control" name=" " value="<?php if(isset($_GET['id'])){ echo $row['item_type'];}?>" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="amtdue"><b>Amount Due</b></label>
                            <input type="text" class="form-control" name=" " value="<?php if(isset($_GET['id'])){ echo $row['total_amt_due'];}?>" readonly>
                        </div>
                                                 
                        <div class="form-group col-md-12">
                            <label for="amtpaid"><b>Amount Paid</b></label>
                            <input type="text" class="form-control" name="amount_paid">
                        </div>  


                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="transaction.php" class="btn btn-danger float-end">Back</a>
                            <button type="submit" name="addtransc" class="btn btn-success editbtn">Generate Pawn Ticket</button> 
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
