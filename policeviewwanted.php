 <?php 
 session_start();
 require('includes/config.php');
if(!isset($_SESSION['username'])){

header("Location:policelogin.php");
}
 include('includes/header.php');

  if(isset($_REQUEST['delete'])){
          $id=intval($_GET['delete']);

          $sql = "DELETE FROM wanted WHERE id='$id'";
          mysqli_query($conn,$sql);
          $msg="Wanted Person successfully deleted";
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
<html>
<head>
    <title>E-Police</title>
    <link href="lib/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="lib/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="lib/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="main-content"style="background-color:#fff;">
 <div class="title">
<center>Wanted Persons</center>
  </div>
<div class="col-md-12">

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
  <th scope="col">Edit</th>
  <th scope="col">Delete</th>
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
     <td>
        <a href="policewanted.php?edit=<?php echo $row['ID']; ?>"  onclick="return confirm('Do you really want to edit employee details')" class="btn btn-primary a-btn-slide-text" >Edit</a>
      </td>
      <td>
        <a href="policeviewwanted.php?delete=<?php echo $row['ID']; ?>" onclick="return confirm('Do you really want to delete wanted person?')"class="btn btn-danger">Delete</a>
      </td>
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
  </div>
</body>
</html>
 <?php
  include('includes/footer.php');
 ?>