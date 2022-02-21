 <?php 
 session_start();
 require('includes/config.php');
if(!isset($_SESSION['username'])){

header("Location:policelogin.php");
}
 include('includes/header.php');

        if(isset($_REQUEST['delete'])){
          $id=intval($_GET['delete']);

          $sql = "DELETE FROM cellregistry WHERE id='$id'";
          mysqli_query($conn,$sql);
          $msg="Police Officer successfully deleted";
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
  <h2><center>CELL REGISTRY DETAILS</center></h2>
</div>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
<tr>
 <th scope='col'>ID</th>
      <th scope='col'>Suspects Name</th>
      <th scope='col'>Age</th>
      <th scope='col'>IdNo</th>
      <th scope='col'>Gender</th>
      <th scope='col'>Occupation</th>
      <th scope='col'>Offense</th>
      <th scope='col'>Location</th>
      <th scope='col'>Most wanted</th>
      <th scope='col'>Date of Arrest</th>
      <th scope='col'>Time</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
</tr>
<?php
$sql = "SELECT * FROM cellregistry";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>
  <tr>
    <td> <?php echo $row["ID"];?></td>
    <td> <?php echo $row["fullnames"];?></td>
    <td> <?php echo $row["age"];?></td>
    <td> <?php echo $row["idno"];?></td>
    <td> <?php echo $row["gender"];?></td>
    <td> <?php echo $row["occupation"];?></td>
    <td> <?php echo $row["offense"];?></td>
    <td> <?php echo $row["location"];?></td>
    <td> <?php echo $row["wanted"];?></td>
     <td> <?php echo $row["dates"];?></td>
    <td> <?php echo $row["tim"];?></td>
    <td>
        <a href="policeeditcellregistry.php?edit=<?php echo $row['ID']; ?>"  onclick="return confirm('Do you really want to edit employee details')" class="btn btn-primary a-btn-slide-text" >Edit</a>
      </td>
      <td>
        <a href="policeviewcellregistry.php?delete=<?php echo $row['ID']; ?>" onclick="return confirm('Do you really want to delete registry detail?')"class="btn btn-danger">Delete</a></td>
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
</body>
</html>
 <?php
  include('includes/footer.php');
 ?>