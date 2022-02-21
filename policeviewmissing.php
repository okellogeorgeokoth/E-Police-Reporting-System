 <?php 
 session_start();
 require('includes/config.php');
if(!isset($_SESSION['username'])){

header("Location:policelogin.php");
}
 include('includes/header.php');
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
<center>Missing Persons</center>
  </div>


<div class="col-md-12">
<table class="table table-hover table-striped">
                  <thead>
<tr>
  <th scope="col">ID</th>
  <th scope="col">Image</th>
  <th scope="col">Name</th>
  <th scope="col">Age</th>
  <th scope="col">IDNO</th>
  <th scope="col">Nationality</th>
  <th scope="col">Last Sight Date</th>
  <th scope="col">Last Sight Location</th>
  <th scope="col">Gender</th>
  <th scope="col">Description</th>
</tr>
<?php
$sql = "SELECT * FROM missing";
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
    <td> <?php echo $row["nationality"];?></td>
    <td> <?php echo $row["dates"];?></td>
    <td> <?php echo $row["location"];?></td>
    <td> <?php echo $row["gender"];?></td>
    <td> <?php echo $row["description"];?></td>
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