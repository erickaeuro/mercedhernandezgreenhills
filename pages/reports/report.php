<?php

$connect = new PDO("mysql:host=localhost;dbname=mercedhernandezgreenhills", "root", "");

$start_date_error = '';
$end_date_error = '';

if(isset($_POST["export"]))
{
 if(empty($_POST["start_date"]))
 {
  $start_date_error = '<label class="text-danger">Start Date is required</label>';
 }
 else if(empty($_POST["end_date"]))
 {
  $end_date_error = '<label class="text-danger">End Date is required</label>';
 }
 else
 {
  $file_name = 'Order Data.csv';
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=$file_name");
  header("Content-Type: application/csv;");

  $file = fopen('php://output', 'w');

  $header = array("stock_no", "item_type", "itemdescription", "karat_gold", "kindofstone", "weight", "itemqty", "tagprice","date_sold", "date_created");

  fputcsv($file, $header);

  $query = "
  SELECT * FROM inventorytbl
  WHERE date_created >= '".$_POST["start_date"]."' 
  AND date_created <= '".$_POST["end_date"]."' 
  ORDER BY date_created ASC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $data = array();
   $data[] = $row["stock_no"];
   $data[] = $row["item_type"];
   $data[] = $row["itemdescription"];
   $data[] = $row["karat_gold"];
   $data[] = $row["kindofstone"];
   $data[] = $row["weight"];
   $data[] = $row["itemqty"];
   $data[] = $row["tagprice"];
   $data[] = $row["date_sold"];
   $data[] = $row["date_created"];
   fputcsv($file, $data);
  }
  fclose($file);
  exit;
 }
}

$query = "
SELECT * FROM inventorytbl 
ORDER BY stock_no ASC;
";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

?>
<html>
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="row">
                
                <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4 border-left-info border-bottom-info">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-info">Inventory Reports</h6>
                      </div>
                      <!-- Card Body -->
                      <div class="card">
                        <div class="card-body">

     <form method="post">
      <div class="input-daterange">
      
      <center>
      <div class="form-group col-md-4">
        <input type="text" name="start_date" class="form-control" readonly />
        <?php echo $start_date_error; ?>
      </div>
      </center>
      
      <center>
       <div class="form-group col-md-4">
        <input type="text" name="end_date" class="form-control" readonly />
        <?php echo $end_date_error; ?>
       </div>
      </center>

      </div>

      <div class="form-group col-md-12">
       <input type="submit" name="export" value="Export" class="btn btn-info" />
      </div>

    </div>
                            <div class="table-responsive">
                                <table id="datatableid2" class="table table-hover display" width="100%" cellspacing="0">

                            <thead>
                                <tr style="font-size:13px;font-family:sans-serif;">
                                  <th>Stock No</th>
                                  <th>Item Type</th>
                                  <th>Item Description</th>
                                  <th>Karat Gold</th>
                                  <th>Kind of Stone</th>
                                  <th>Weight</th>
                                  <th>Item Qty</th>
                                  <th>Tag Price</th>
                                  <th>Date Created</th>
                                </tr>
                            </thead>
               <tbody>
                    <?php
                if($result)
                  {
                    foreach($result as $row)
                    {

                      ?>

                        <tr>
                          <td><?php echo $row['stock_no']; ?> </td>
                          <td><?php echo $row['item_type']; ?> </td>
                          <td><?php echo $row['itemdescription']; ?> </td>
                          <td><?php echo $row['karat_gold']; ?> </td>
                          <td><?php echo $row['kindofstone']; ?> </td>
                          <td><?php echo $row['weight']; ?> </td>
                          <td><?php echo $row['itemqty']; ?> </td>
                          <td><?php echo $row['tagprice']; ?> </td>
                          <td><?php echo $row['date_created']; ?> </td>

                        </tr>
                    </div>
                    <?php           
                    }
                    
              
                }
                else 
                {
                    echo "No Record Found";
                }

                
          ?>   

     </tbody>
     </form>
    </table>
   </div>
  </div>

  </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->
        
  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Footer -->
  <?php include '../footer.php'; ?>
  <!-- End of Footer -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../login_register/login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<script>
$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });
});

</script>



</body>
</html>