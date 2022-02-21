 <?php 
 session_start();
 require('includes/config.php');
if(!isset($_SESSION['username'])){

header("Location:policelogin.php");
}
$sql = "SELECT* FROM users";
       $result = mysqli_query($conn, $sql);
       $users = mysqli_num_rows($result);

$sql1 = "SELECT* FROM complaint";
       $result1 = mysqli_query($conn, $sql1);
       $complaint = mysqli_num_rows($result1);

$sql2 = "SELECT* FROM missing";
       $result2 = mysqli_query($conn, $sql2);
       $missing = mysqli_num_rows($result2);

 $sql2 = "SELECT* FROM missing";
       $result2 = mysqli_query($conn, $sql2);
       $missing = mysqli_num_rows($result2);
 include('includes/header.php');
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
<center>Complaints Reports</center>
  </div>

             <?php
  
  //Change the password to match your configuration
  $link = mysqli_connect("localhost", "root", "", "epolice");

  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  echo "<br>";

  
  $sql = "SELECT * FROM complaint";
  $result = $link->query($sql);
    
  echo "<div class='container'>";
    echo "<div class='row-fluid'>";
    
      echo "<div class='col-xs-8'>";
      echo "<div class='table-responsive'>";
         echo "<br>";
echo "<table class='table table-dark'>";
   echo " <tr>";
     echo " <th scope='col'>ID</th>";
      echo "<th scope='col'>IDNO</th>";
      echo "<th scope='col'>Date of Assault</th>";
      echo "<th scope='col'>Location of Assault</th>";
      echo "<th scope='col'>Type of Assault</th>";
      echo "<th scope='col'>Description of Assault</th>";
    echo "</tr>";
    if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
 echo "<tr>";
            echo "<td>" . $row["ID"] . "</td>";
              echo "<td>" . $row["idno"] . "</td>";
            echo "<td>" . $row["dates"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "<td>" . $row["assault"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "</tr>";     
          }
        } else {
          echo "0 results";
        }?>
</table>



  </div>
</body>
</html>
 <?php
  include('includes/footer.php');
 ?>