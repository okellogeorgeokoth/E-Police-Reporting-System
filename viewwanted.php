<?php include('insertmissing.php')?>
<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login.php");
  }
?>
<?php
$server="localhost";
$user="root";
$pass="";
$db="epolice";

// Create connection
$conn = mysqli_connect($server, $user, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
        ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Police</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">E-Police <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="Filecomplaint.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Complaints</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

   

      <!-- Heading -->


      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="missing.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Missing Persons</span></a>
      </li>
        <hr class="sidebar-divider my-0">
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="viewassignedofficers.php">
          <i class="fas fa-fw fa-table"></i>
          <span>View asssigned Officers</span></a>
      </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Reports</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">View Wanted Person:</h6>
            <a class="collapse-item" href="viewwanted.php">Wanted Person reports</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">View Missing Persons:</h6>
            <a class="collapse-item" href="viewmissing.php">Missing Persons Report</a>
          </div>
        </div>
      </li>
  
  
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
            <marquee behavior="alternate">Report Missing Persons at your comfort</marquee>
              <div class="input-group-append">
              </div>
            </div>
          </form>
      
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['email'])) : ?>
      <p><strong><center><?php echo $_SESSION['email']; ?></center></strong></p>
    <?php endif ?>
</span>
                <img class="img-profile rounded-circle" src="img/1.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
               <a class="logout" href="index.html"><center>Logout</center></a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

       <div class="card shadow mb-4">
            <div class="card-body"><center><h3><strong>Wanted Persons Reports</strong></h3></center>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
<tr>
  <th scope="col">ID</th>
  <th scope="col">Image</th>
  <th scope="col">Suspects Name</th>
  <th scope="col">Age</th>
  <th scope="col">IDNO</th>
  <th scope="col">Gender</th>
  <th scope="col">Crime Type</th>
  <th scope="col">Most Wanted</th>
</tr>
<?php
$sql = "SELECT * FROM wanted";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>
  <tr>
    <td> <?php echo $row["ID"];?></td>
    <td><?php echo "<img src='".$row['path']."'>"; ?></td>
    <td> <?php echo $row["fullnames"];?></td>
    <td> <?php echo $row["age"];?></td>
    <td> <?php echo $row["idno"];?></td>
    <td> <?php echo $row["gender"];?></td>
    <td> <?php echo $row["offense"];?></td>
    <td> <?php echo $row["wanted"];?></td>
</tr>
<?php

    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>


 </tbody>
                </table>





        </div>
      
       <!--  DATE PICKERS -->
          
        <script src="non-empty.js"></script>
          <!-- /col-lg-12 -->
        </div>
        <!-- row -->
      </section>
      <!-- /wrapper -->
    </section>
  </section>
         
        <!-- /.container-fluid -->
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; 2020 E-Police System</span>
          </div>
        </div>
      </footer>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>