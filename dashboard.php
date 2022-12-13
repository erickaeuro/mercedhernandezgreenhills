<?php
session_start();
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard | Merced Hernandez Greenhills</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free-5.15.4-web/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- Connection Database --> 
  <?php 
  error_reporting(0);
  include ("connection.php");
?>

</head>
    

<body>

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

    
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Sold Jewelry</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                             $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                                             $result = mysqli_query($cser,"SELECT * FROM inventorytbl where move=1");

                                             if($stockstotal = mysqli_num_rows($result))
                                             {
                                                echo '<h5 class="mb-0"> '.$stockstotal.'</h5>';
                                             }
                                             else
                                             {
                                                echo '<h5="mb-0"> No Data </h5>';
                                             }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list-alt fa-2x text-gray-300 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Redeem Loans</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            <?php 
                                                        $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                                                        $result = mysqli_query($cser,"SELECT * FROM loantbl WHERE loan_status='Redeemed'");

                                                        if($redeemtotal = mysqli_num_rows($result))
                                                        {
                                                            echo '<h5 class="mb-0"> '.$redeemtotal.'</h5>';
                                                        }
                                                        else
                                                        {
                                                            echo '<h5="mb-0"> No Redeems </h5>';
                                                        }
                                                    ?>
                                        </div>
                                        <div class="col-auto">
                                           
                                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Customers
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php 
                                                        $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                                                        $result = mysqli_query($cser,"SELECT * FROM customertbl");

                                                        if($customertotal = mysqli_num_rows($result))
                                                        {
                                                            echo '<h5 class="mb-0"> '.$customertotal.'</h5>';
                                                        }
                                                        else
                                                        {
                                                            echo '<h5="mb-0"> No Data </h5>';
                                                        }
                                                    ?>
                                                </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Employees </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                                        $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                                                        $result = mysqli_query($cser,"SELECT * FROM users");

                                                        if($userstotal = mysqli_num_rows($result))
                                                        {
                                                            echo '<h5 class="mb-0"> '.$userstotal.'</h5>';
                                                        }
                                                        else
                                                        {
                                                            echo '<h5="mb-0"> No Data </h5>';
                                                        }
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>


                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 
        </div>
        <!-- /.container-fluid -->

      
        
        
        <html>
  <head>

<style>

.div{
display:flex;
position:relative;
left: 50px;
}

</style>
        
<?php 

     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['date_loan_granted','maturity_date','expiry_date'],

          <?php
          $query="select * from loantbl";
          $res=mysqli_query($con,$query);
          while($data=mysqli_fetch_array($res)){
            $item_type = $data['item_type'];
            
            $maturity_date =$data['maturity_date'];
            $expiry_date=$data['expiry_date'];

           
            ?>
          ['<?php echo $date_loan_granted;?>', <?php echo $maturity_date;?>, <?php echo $expiry_date;?>],
          <?php
          }
          ?>
          
        ]); 

        var options = {
          title: 'Loans',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
<div>
<div class="col-xl-7 col-md-8 mb-8">
<div class="card border-left-info shadow h-100 py-2">
<div class="card-body">
    <div id="curve_chart" style="width: auto; height: 500px"></div>
    </div>
    </div>
    </div>
  </body>
</html>


<?php 
       $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
          if($con){
              echo "";
          }
          ?>
        <html>
  <head>
 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['item_type', 'itemqty'],
          

          <?php
         
          $sql = "SELECT * FROM inventorytbl where move=0";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){

            echo"['".$result['item_type']."',".$result['itemqty']."],";
          }
          
          ?>
         
        ]);

        var options = {
          title: 'Stocks (Available)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <?php echo str_repeat('&nbsp;', 5);  ?>
  <div class="col-xl-5 col-md-6 mb-8" position="left">
<div class="card border-right-info shadow h-100 py-2">
<div class="card-body">
    <div id="piechart" style="width: auto; height: 500px;"></div>
    </div>
    </div>
    </div>
    </div>
  </body>
</html>

 
 
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
        <?php include 'footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
        
  </div>
  <!-- End of Page Wrapper -->

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
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

<?php include '../scripts.php'; ?>
<script>
    $(document).ready(function() {
    $('table.display').DataTable();
} );
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <!-- <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
</html>
