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
    <?php require '../sidebar.php'; ?>
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
        ?>
        <!-- End of Topbar -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><b>New Jewelry Loan</b>                      
                    </div>
                    <div class="card-body">
                        <form action="addloan.php" method="POST">
                            
                        <div class="form-group col-md-12">
                                <label for="CustomerNo"><b>Cutomer No.</b></label><br>

                        <?php 

                        

                        echo '<select class="custom-select" name="customerno" style="width:410px; position: relative; left:10px; top:-1px">';

                        $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills") or die("connection failed:".mysqli_error());
                        $result = mysqli_query($cser,"SELECT customer_no, name FROM customertbl") or die(mysql_error());


                        if (mysqli_num_rows($result)!=0)
                        {

                        echo'<option value=" " selected="selected">Customer</option>';

                        while($drop_2 = mysqli_fetch_array( $result ))
                        {
                            if(in_array($drop_2['transactiontype'] , array(''))){
                                echo '<option value="'.$drop_2['customer_no'].'">'.$drop_2['customer_no'].'-'.$drop_2['name'].'</option>';
                                }

                        }


                        }
                        echo '</select>';


                        ?> 
                        </div>

                            <div class="form-group col-md-12">
                                <label for="itemtype"><b>Item Type </b></label>
                                <input type="text" class="form-control" name="item_type">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="description"><b>Item Description </b></label>
                                <textarea class="form-control" rows="3" name="item_desc" placeholder="Put item description"></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="appraised_value"><b>Appraised Value </b></label>
                                <input type="text" class="form-control" name="appraised_value">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="principal"><b>Principal </b></label>
                                <input type="text" class="form-control" name="principal">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="interest"><b>Interest </b></label>
                                <input type="text" class="form-control" name="interest">
                            </div>
                        
                            <div class="form-group col-md-12">
                                <label for="Date Loan"><b>Date Loan Granted</b></label>
                                <input type="date" class="form-control" name="dateloangranted" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Mat Date"><b>Maturity Date </b></label>
                                <input type="date" class="form-control" name="maturity_date" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Expire Date"><b>Expiry Date</b></label>
                                <input type="date" class="form-control" name="expiry_date" >
                            </div>

                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="loan.php" class="btn btn-danger float-end">Back</a>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModal">Add Redeem Loan</button>
                            
                            </center>
                            </div>

                            <!--MODAL FOR MOVE-->
                            <div class="modal" id="AddModal">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Confirm Transaction?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        Do you want to finish the transaction?
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="submit" name="addloan" class="btn btn-success editbtn">Yes</button> 
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
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
