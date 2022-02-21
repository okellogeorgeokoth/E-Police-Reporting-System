<?php 
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
 
    <title>E-Police</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript">
    
function valid(){
    //document.forms contains all elements inside registration form ie input,submit etc
    // this validation will ensure that user gets an alert if tries to submit password
    var password = document.forms["registration"]["password"].value;
    var cpassword = document.forms["registration"]["cpassword"].value;
    if(password!=cpassword){
        alert("password and password confirm did not match");
        return false;
    }
    return true;
}
</script>
</head>
<body>
 <nav class="my-nav navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
              <h4><a href="#" class="logo"><b>E-<span>Police</span></b></a></h4>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">    <span class="navbar-toggler-icon"></span>
               </button>
                <?php
    $sql="SELECT * FROM complaint";

    $results = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($results);
    if ($resultCheck>0) { ?>
        <span><a style="margin-left:600px; border-radius:200px;" class="btn btn-sm btn-success " href="policecomplaints.php">
      <?php echo "You have"." $resultCheck"." new complaints"; ?>
      </a></span>
   <?php }
    ?>

    <?php
    $sql="SELECT * FROM missing";

    $results = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($results);
    if ($resultCheck>0) { ?>
        <span><a style="margin-left:50px; border-radius:200px;" class="btn btn-sm btn-danger " href="policeviewmissing.php">
      <?php echo "You have"." $resultCheck"." missing persons"; ?>
      </a></span>
   <?php }
    ?>
            
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="index.html"><button class="btn btn-info">Logout</button></a></li>
        </ul>
      </div>
            </div>
        </nav>
         <div class="side-nav" style="background-color:#fff;">
            <nav>
                <ul>
                    <li>
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

    <center><img src="img/1.png" class="img-circle" width="80"></center>
    <?php  if (isset($_SESSION['username'])) : ?>
      <p><center><strong>Welcome</strong><br><?php echo $_SESSION['username']; ?></center></p>
    <?php endif ?>
                    </li>
                     <li>
                        <a href="dashboard.php">
                            <span><i class="fa fa-dashboard"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="policecellregistry.php">
                            <span><i class="fa fa-star"></i></span>
                            <span>Cell Registry</span>
                        </a>
                    </li>
                      <li>
                        <a href="policewanted.php">
                            <span><i class="fa fa-star"></i></span>
                            <span>Wanted Person</span>
                        </a>
                    </li>
                    <li>
                        <a href="policeviewmissing.php">
                            <span><i class="fa fa-user"></i></span>
                            <span>Missing Persons</span>
                        </a>
                    </li>

                    <li>
                        <a href="policeassignofficer.php">
                            <span><i class="fa fa-user"></i></span>
                            <span>Assign Officer</span>
                        </a>
                    </li>
                   
              
  <li>                          
<center><img src="img/images/flag.gif" width="30%"></center>
  </li>
                </ul>
            </nav>

</div>
        




 