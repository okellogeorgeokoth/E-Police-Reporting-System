 <?php 
 session_start();
 require('includes/config.php');
 include('includes/header.php');

$msg='';

if (isset($_POST['update'])){
        $id = $_POST['id'];
        $firstname =$_POST['firstname'];
        $lastname =$_POST['lastname'];
        $phoneno =$_POST['phoneno'];
        $email=$_POST['email'];
        $rank=$_POST['rank'];
        $idno =$_POST['idno'];

        $sql = "UPDATE assignofficer SET firstname = '$firstname',lastname='$lastname',phoneno='$phoneno',email='$email',rank='$rank',idno='$idno' WHERE id='$id'";
         mysqli_query($conn,$sql);
        $msg=" Police Officer  successfully updated";
}


        if(isset($_REQUEST['delete'])){
          $id=intval($_GET['delete']);

          $sql = "DELETE FROM assignofficer WHERE id='$id'";
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
<center>Assigned Officers</center>
  </div>


<div class="col-md-12">
  <?php if (!empty($msg)) { ?>
            <div class="alert alert-primary"><?php echo $msg ?></div>
          <?php } ?>
     
<table class="table " >
                  <thead >
<tr>
 <th scope='col'>ID</th>
      <th scope='col'>Firstname</th>
      <th scope='col'>Lastname</th>
      <th scope='col'>PhoneNo</th>
      <th scope='col'>Email</th>
      <th scope='col'>Rank</th>
      <th scope='col'>IDNO</th>
      <th scope='col'>Assault</th>
      <th scope="col">Edit</th>
  <th scope="col">Delete</th>
</tr>
<?php
$sql = "SELECT * FROM assignofficer";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>
  <tr>
    <td> <?php echo $row["ID"];?></td>
    <td> <?php echo $row["firstname"];?></td>
    <td> <?php echo $row["lastname"];?></td>
    <td> <?php echo $row["phoneno"];?></td>
    <td> <?php echo $row["email"];?></td>
    <td> <?php echo $row["rank"];?></td>
    <td> <?php echo $row["idno"];?></td>
    <td> <?php echo $row["assault"];?></td>
    <td>
        <a href="policeeditassignedofficer.php?edit=<?php echo $row['ID']; ?>"  onclick="return confirm('Do you really want to edit Officers details')" class="btn btn-primary a-btn-slide-text" >Edit</a>
      </td>
      <td>
        <a href="policeviewassignedofficer.php?delete=<?php echo $row['ID']; ?>" onclick="return confirm('Do you really want to delete this Officers')"class="btn btn-danger">Delete</a>
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
</body>
</html>
 <?php
  include('includes/footer.php');
 ?>