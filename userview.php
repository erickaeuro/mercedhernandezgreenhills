<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>View Users | Merced Hernandez Greenhills</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  

<!-- Connection Database --> 
  <?php include ("connection.php"); 
  
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
        <?php include 'navbar.php'; ?>
        <!-- End of Topbar -->

<style>

.wrapper {
  display: grid;
  grid-template-columns: 510px 510px;
}

</style> 

        <div class="row">
            <div class="col-md-12">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 1200px;">
                    <div class="card-header">
                        <h4><b>View User</b>                      
                    </div>
                    <div class="card-body">


        <form action="adduser.php" method="POST">

        <div class="modal-body">
        <form role="form">
        <div class="card-body">
            <div class="row">

            <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM users WHERE id='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $row = mysqli_fetch_array($query_run);
                                ?>

                    <div class="form-group col-md-11">
                        <label for="uname">Username</label>
                        <p class="form-control"> <?= $row['username']; ?> </p>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="pass">Password</label>
                        <p class="form-control"> <?= $row['password']; ?> </p>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="emailadd">Email Address</label>
                        <p class="form-control"> <?= $row['email']; ?> </p>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="name">Complete Name</label>
                        <p class="form-control"> <?= $row['cname']; ?> </p>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="contactno">Contact Number</label>
                        <p class="form-control"> <?= $row['contactno']; ?> </p>
                    </div>


                    <div class="form-group col-md-11">
                        <label for="address">Address</label>
                        <p class="form-control"> <?= $row['address']; ?> </p>
                    </div>

                    <div class="form-group col-md-11">
                                <label for="usertype"><b>User Type </b></label><br/>
                                <p class="form-control"> <?= $row['usertype']; ?> </p>
                            </div>  

                            <div class="mb-2" text-align=center  >
                            <center> 
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                    <a href="users.php" class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                           
                            
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


<?php include 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
