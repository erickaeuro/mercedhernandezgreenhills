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
        <?php include '../navbar.php'; ?>
        <!-- End of Topbar -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><b>New Redeem Loan</b>                      
                    </div>
                    <div class="card-body">
                        <form action="addredeem.php" method="POST">

                        <?php 

                        echo' &nbsp; Pawn Ticket No.';

                        echo '<select class="custom-select" name="pawnticketno" style="width:410px; position: relative; left:10px; top:-1px">';

                        $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills") or die("connection failed:".mysqli_error());
                        $result = mysqli_query($cser,"SELECT pawnticketno, transactiontype FROM pawntickettbl") or die(mysql_error());


                        if (mysqli_num_rows($result)!=0)
                        {

                        echo'<option value=" " selected="selected">Pawn Ticket No</option>';

                        while($drop_2 = mysqli_fetch_array( $result ))
                        {
                            if(in_array($drop_2['transactiontype'] , array(''))){
                                echo '<option value="'.$drop_2['pawnticketno'].'">'.$drop_2['pawnticketno'].'</option>';
                                }

                        }


                        }
                        echo '</select>';


                        ?> 
                        
                        <div class="form-group col-md-12">
                                <label for="Date Loan"><b>Date Loan Granted</b></label>
                                <input type="date" class="form-control" name="dateloangranted"  >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Mat Date"><b>Maturity Date </b></label>
                                <input type="date" class="form-control" name="maturity_date" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Expire Date"><b>Expiry Date</b></label>
                                <input type="date" class="form-control" name="expiry_date" >
                            </div>

                            <div class="form-group col-md-12">
                                <label for="description"><b>Description </b></label>
                                <input type="text" class="form-control" name="description" >
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
                                <label for="penalty"><b>Penalty</b></label>
                                <input type="text" class="form-control" name="penalty">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="redemption_amnt"><b>Redemption Amount</b></label>
                                <input type="text" class="form-control" name="redemption_amnt">
                            </div>

                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="redeem.php" class="btn btn-danger float-end">Back</a>
                            <button type="submit" name="addredeem" class="btn btn-success editbtn">Add Redeem Loan</button> 
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
