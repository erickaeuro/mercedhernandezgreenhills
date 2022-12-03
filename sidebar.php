

<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

 <!-- Divider -->
 <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
      <img class="img-profile rounded-circle" src="logobg.png" width="130%">
      <div id="banner">

      </div>    
      </a>
      
      <br> 
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
        <i class="fa fa-th" aria-hidden="true"></i>
          <span><b>Dashboard</b></span></a>
      </li>

      </li>
           
        <?php if ($_SESSION['username'] == "Appraiser"){
            echo "
            <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities'
                aria-expanded='true' aria-controls='collapseUtilities'>
                <i class='fas fa-folder'></i>
                <span><b>Transactions</b></span>
            </a>


            <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                <a class='collapse-item' href='transaction.php'>Pawn Ticket</a>
                <a class='collapse-item' href='loan.php'>Loans</a>
                <a class='collapse-item' href='renewal.php'>Renewal</a>
                <a class='collapse-item' href='redeem.php'>Redeem</a>
                <a class='collapse-item' href='auction.php'>Auction</a>
                <a class='collapse-item' href='soldauction.php'>Sold Auction</a>
                </div>
            </div>
        </li>

        <li class='nav-item'>
        <a class='nav-link' href='customer.php'>
          <i class='fas fa-users'></i>
          <span><b>Customers</b></span></a>
      </li>";
          }
            else{
              //echo "<span></span>";
            }
        ?>

        <?php if ($_SESSION['username'] == "InventoryClerk"){
        echo " <li class='nav-item'>
        <a class='nav-link' href='#' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
          <i class='fas fa-boxes'></i>
          <span><b>Inventory</b></span></a>
          <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
            <div class='bg-white py-2 collapse-inner rounded'>
                <a class='collapse-item' href='stocks.php'>Stocks</a>
                <a class='collapse-item' href='soldstocks.php'>Sold Jewelry</a>
            </div>
        </div>
        </li>
              <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities'
                aria-expanded='true' aria-controls='collapseUtilities'>
                <i class='fas fa-folder'></i>
                <span><b>Transactions</b></span>
            </a>
            <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <a class='collapse-item' href='auction.php'>Auction</a>
                    <a class='collapse-item' href='soldauction.php'>Sold Auction</a>
                </div>
            </div>
        </li>

      <li class='nav-item'>
        <a class='nav-link' href='report.php'>
          <i class='fas fa-file-csv'></i>
          <span><b>Reports</b></span></a>
      </li>
          ";
          }
            else{
              //echo "<span></span>";
            }
        ?>

<?php if ($_SESSION['username'] == "Admin"){
            echo "
            <li class='nav-item'>
          <a class='nav-link' href='' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
            <i class='fas fa-boxes'></i>
            <span><b>Inventory</b></span></a>
            <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
              <div class='bg-white py-2 collapse-inner rounded'>
                  <a class='collapse-item' href='stocks.php'>Stocks</a>
                  <a class='collapse-item' href='soldstocks.php'>Sold Jewelry</a>
              </div>
          </div>
      </li>
            

            <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities'
                aria-expanded='true' aria-controls='collapseUtilities'>
                <i class='fas fa-folder'></i>
                <span><b>Transactions</b></span>
            </a>
            <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <a class='collapse-item' href='transaction.php'>Pawn Ticket</a>
                    <a class='collapse-item' href='loan.php'>Loans</a>
                    <a class='collapse-item' href='renewal.php'>Renewal</a>
                    <a class='collapse-item' href='redeem.php'>Redeem</a>
                    <a class='collapse-item' href='auction.php'>Auction</a>
                    <a class='collapse-item' href='soldauction.php'>Sold Auction</a>
                </div>
            </div>
        </li>


        <li class='nav-item'>
        <a class='nav-link' href='report.php'>
          <i class='fas fa-file-csv'></i>
          <span><b>Reports</b></span></a>
      </li>


        <li class='nav-item'>
        <a class='nav-link' href='customer.php'>
          <i class='fas fa-users'></i>
          <span><b>Customers</b></span></a>
      </li>



      <li class='nav-item'>
            <a class='nav-link' href='users.php'>
              <i class='fas fa-users'></i>
              <span><b>Users</b></span></a>
          </li>
          
      ";
          }
            else{
              //echo "<span></span>";
            }
        ?>

      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

    </ul>