 <?php 
 session_start();
 require('includes/config.php');
if(!isset($_SESSION['username'])){

header("Location:policelogin.php");
}
 include('includes/header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Police</title>
    <link href="lib/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->

  <!-- Custom styles for this page -->
 <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="lib/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="lib/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="main-content"style="background-color:#fff;">
 <div class="title">
<center>Registered Users</center>
  </div>


<div class="col-md-12">
  <div class="col-md-12">  
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand"></a>
       <form class="form-inline active-cyan-3 active-cyan-4" action=""  method="GET">
  <a href="" value="Search"><i class="fas fa-search"  aria-hidden="true"></i></a>
  <input class="form-control form-control-sm ml-3 w-75" type="text"   placeholder="Search"
    aria-label="Search">
</form>
      </nav>
  </div>

<table class="table table-hover table-striped">
      <thead>
          <tr>
            <th>ID</th>
            <th>Names</th>
            <th>PhoneNo</th>
            <th>Age</th>
            <th>Gender</th>
            <th>IDNO</th>
            <th>Address</th>
            <th>Residence</th>
           <th>Email</th>
          </tr>
      </thead>



<tbody>
<?php 

  $sql='SELECT * from users';

  $results = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($results);

//check if there are products
if ($resultCheck > 0) {
{
foreach($results as $result)
{  ?>

<tr>
  <td><?php echo $result["ID"]?></td>
    <td><?php echo $result["firstname"]?> <?php echo $result["middlename"]?>  <?php echo $result["lastname"]?></td>
    <td><?php echo $result["phoneno"]?></td>
    <td><?php echo $result["age"]?></td>
    <td><?php echo $result["gender"]?></td>
    <td><?php echo $result["idno"]?></td>
     <td><?php echo $result["address"]?></td>
    <td><?php echo $result["residence"]?></td>
    <td><?php echo $result["email"]?></td>
</tr>
   <?php  }}} ?>
                   
</tbody>
</table>
  </div>
  </div>
</body>
</html>
 <?php
  include('includes/footer.php');
 ?>