<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Merced Hernandez Greenhills</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <!-- Select2 CSS --> 
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

  <!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

  <!-- Select2 JS --> 
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  

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
    <?php require 'sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'navbar.php'; 
        if(isset($_SESSION['addstatus']))
        {
            ?>
                <div class="alert alert-danger" role="alert" role="alert">
                    <?= $_SESSION['addstatus']; ?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php 
            $_SESSION['edit'] = 10;
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
            $_SESSION['edit'] = 10;
            unset($_SESSION['addstatus1']);
        }
        ?>
        <!-- End of Topbar -->
<style>

.wrapper {
  display: grid;
  grid-template-columns: 550px 560px;
}

</style> 


        <div class="row">
            <div class="col-md-12">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 1200px;">
                    <div class="card-header">
                        <h4><b>New Jewelry Loan</b>                      
                    </div>
                    <div class="card-body">
                        <form action="addloan.php" method="POST">
                            
                        <div class="form-group col-md-11">
                                <label for="CustomerNo"><b>Customer Name *</b></label><br>

                        <?php 

                        

                        echo '<select class="js-example-basic-single" name="customerno" id="select_box" style="width: 1039px">';

                        $cser=mysqli_connect("localhost","root","","mercedhernandezgreenhills");
                        $result = mysqli_query($cser,"SELECT customer_no, first_name, last_name FROM customertbl");
                        

                        if(isset($_GET['edit'])){
                            $query = "SELECT * FROM loansample WHERE edit_no='10' ";
                            $query_run = mysqli_query($cser, $query);
                           
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);  
                                $custno = $row['custno'];
                                $result2 = mysqli_query($cser,"SELECT customer_no, first_name, last_name FROM customertbl WHERE customer_no = $custno");
                                $dropedit = mysqli_fetch_array( $result2 );


                                echo'<option value="'.$row['custno'].'">'.$dropedit['first_name'].' '.$dropedit['last_name'].'</option>' ;
                            } else{
                                
                            }
                               }else{
                                echo'<option value=" " selected="selected">Customer</option>';
                               }


                        if (mysqli_num_rows($result)!=0)
                        {

                        

                        while($drop_2 = mysqli_fetch_array( $result ))
                        {
                            if(in_array($drop_2['transactiontype'] , array(''))){                      
                                
                                echo '<option value="'.$drop_2['customer_no'].'">'.$drop_2['first_name'].' '.$drop_2['last_name'].'</option>' ;
                                }

                        }


                        }
                        echo '</select>';


                        ?> 
                        </div>

                            <div class="form-group col-md-11">
                                <label for="itemtype"><b>Item Type *</b></label>
                                <input type="text" class="form-control" name="item_type" placeholder="Enter Jewelry Type" value="<?= $row['item_type']; ?>" required>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="description"><b>Item Description * </b></label>
                                <textarea class="form-control" rows="3" name="item_desc" placeholder="<?= $row['item_desc'] ?>" value="<?= $row['item_desc'] ?>" required></textarea>
                            </div>

                        <div class="wrapper">

                            <div class="form-group col-md-11">
                                <label for="appraised_value"><b>Appraised Value * </b></label>
                                <input id="avalue" onchange="validateValues()" type="text" class="form-control" name="appraised_value" placeholder="Enter Jewelry Appraised Value" value="<?= $row['appraised_value'] ?>" required>
                            </div>

                            <div class="form-group col-md-11">
                                <label for="principal"><b>Principal * </b></label>
                                <input id="pvalue" onchange="validateValues()" type="text" class="form-control" name="principal" placeholder="Enter Principal" value="<?=$row['principal'] ?>"required>
                            </div>
                        </div>

                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="loan.php" class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                            <button  type="button" id="addloanbtn" class="btn text-white" style="background-color: #81C784;" data-bs-toggle="modal" data-bs-target="#AddModal">Add Loan</button>
                            
                            </center>
                            </div>

                            <!--MODAL FOR Add-->
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
                                        <button type="submit"  name="addloan" class="btn text-white" style="background-color: #81C784;">Yes</button> 
                                        <button type="button" class="btn text-white" style="background-color: #B0B0AB;" data-bs-dismiss="modal">Close</button>
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
<script>
    function validateValues(){
        
        var avalue=document.getElementById('avalue');
        var pvalue=document.getElementById('pvalue');
        var addloanbtn=document.getElementById('addloanbtn');
       /*if(pvalue.value==''||avalue.value==''){
        addloanbtn.disabled=true;
        return;
       }
       
        if(pvalue.value<avalue.value){
            addloanbtn.disabled=false;
        }
        else{
            addloanbtn.disabled=true;
        }*/
    }
</script>
<?php include 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function(){
 
 // Initialize select2
 $("#select_box").select2();

 // Read selected option
 $('#but_read').click(function(){
   var username = $('#select_box option:selected').text();
   var userid = $('#select_box').val();

   $('#result').html("id : " + userid + ", name : " + username);

 });
});
</script>

</body>
</html>
