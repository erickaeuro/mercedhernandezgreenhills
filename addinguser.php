<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Users | Merced Hernandez Greenhills</title>

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
        <?php include 'navbar.php'; 
        if(isset($_SESSION['userstatus1']))
        {
            ?>
                <div class="alert alert-warning" role="alert" role="alert">
                    <?= $_SESSION['userstatus1']; ?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                </div>
            <?php
            $_SESSION['edit'] = 10;
            unset($_SESSION['userstatus1']);
        }

        if(isset($_GET['edit'])){                           
            $query = "SELECT * FROM usersample WHERE edit_no='10' ";
            $query_run = mysqli_query($con, $query);
           
            if(mysqli_num_rows($query_run) > 0)
            {
                $row = mysqli_fetch_array($query_run);  
            } else{

            }
               }
        
        ?>

        
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
                        <h4><b>Add New Users</b>                      
                    </div>
                    <div class="card-body">


        <form action="adduser.php" method="POST">

        <div class="modal-body">
        <form role="form">
        <div class="card-body">
            <div class="row">

                    <div class="form-group col-md-11">
                        <label for="username">Username *</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" value="<?=$row['username']?>" required>
                    </div>

                <div class="wrapper">
                    <div class="form-group col-md-12">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="cpass">Confirm Password *</label>
                        <input type="password" class="form-control" name="cpass" placeholder="Enter Confirm Password" required>
                    </div>
                </div>

                    <div class="form-group col-md-11">
                        <label for="emailadd">Email Address *</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="<?=$row['email']?>" required>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="name">Complete Name *</label>
                        <input type="text" class="form-control" name="cname" placeholder="Enter Complete Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" value="<?=$row['name']?>" required>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="contactno">Contact Number *</label>
                        <input type="text" class="form-control" name="contactno" placeholder="Enter Contact Number" required pattern="((^(\+)(\d){12}$)|(^\d{11}$))" value="<?=$row['contactno']?>" >
                    </div>


                    <div class="form-group col-md-11">
                        <label for="address">Address *</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?=$row['address']?>"  required>
                    </div>

                    <div class="form-group col-md-11">
                                <label for="usertype"><b>User Type * </b></label><br/>
                                <select class="custom-select" name="usertype" style="width:990px; position: relative; left:2px; top:-1px">
                                    <?php if(isset($_GET['edit'])){echo '<option value="'.$row['user_type'].' " selected="selected">'.$row['user_type'].'</option>';}
                                    else{echo '<option value=" " selected="selected">User Type</option>';}?>                                    
                                    <option value="Admin" selected="selected">Admin</option>
                                    <option value="Appraiser" selected="selected">Appraiser</option>
                                    <option value="Inventory Clerk" selected="selected">Inventory Clerk</option>
                                </select>
                    </div>  

                            <div class="mb-4">
                            <center> 
                            <a href="users.php" class="btn text-white" style="background-color: #B0B0AB;">Back</a>
                            <button type="submit" name="adduser" class="btn text-white" style="background-color: #81C784;" >Add New Users</button> 
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


<?php include 'scripts.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
