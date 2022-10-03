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
                        <h4><b>Edit Users Details</b>                      
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM userstbl WHERE userid ='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);
                                ?>

                            <form action="edituser.php" method="POST">

                        
                            <input type="hidden" name="id" value='<?= $row['userid']; ?>'>

                    <div class="form-group col-md-12">
                        <label for="userid">User ID</label>
                        <input type="text" class="form-control" name="userid" value="<?= $row['userid']; ?>" disable>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="uname">Username</label>
                        <input type="text" class="form-control" name="uname" value="<?= $row['uname']; ?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" name="pass" value="<?= $row['pass']; ?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="cpass">Confirm Password</label>
                        <input type="password" class="form-control" name="cpass" value="<?= $row['pass']; ?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="emailadd">Email Address</label>
                        <input type="email" class="form-control" name="emailadd" value="<?= $row['emailadd']; ?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="name">Complete Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $row['name']; ?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="contactno">Contact Number</label>
                        <input type="text" class="form-control" name="contactno" value="<?= $row['contactno']; ?>">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" value="<?= $row['address']; ?>">
                    </div>

                    <div class="form-group col-md-12">
                                <label for="usertype"><b>User Type </b></label><br/>
                                <select class="custom-select" name="usertype" style="width:1162px; position: relative; left:2px; top:-1px">
                                    <option value=" " selected="selected">User Type</option>
                                    <option value="Admin" selected="selected">Admin</option>
                                    <option value="Appraiser" selected="selected">Appraiser</option>
                                    <option value="Inventory Clerk" selected="selected">Inventory Clerk</option>
                                </select>
                            </div>  

                        </div>
                            <div class="mb-4">
                            <center> 
                            <a href="users.php" class="btn btn-danger float-end">Back</a>
                            <button type="submit" name="edituser" class="btn btn-success editbtn">Edit User</button> 
                            </center>
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
