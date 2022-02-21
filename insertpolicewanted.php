  <?php


$fullnames = "";
$age    = "";
$idno = "";
$gender  = "";
$offense = "";
$wanted    = "";
$errors = array(); 
$target_path = "image/";

$link = mysqli_connect("localhost", "root", "", "epolice"); 
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $target_path = $target_path . basename( $_FILES['uploadedfilee']['name']);
  $fullnames = mysqli_real_escape_string($link, $_REQUEST['fullnames']);
  $age = mysqli_real_escape_string($link, $_REQUEST['age']);
  $idno = mysqli_real_escape_string($link, $_REQUEST['idno']); 
  $gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
  $offense = mysqli_real_escape_string($link, $_REQUEST['offense']);
  $wanted = mysqli_real_escape_string($link, $_REQUEST['wanted']);


  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullnames)) { array_push($errors, "Fullnames are required"); }
  if (empty($age)) { array_push($errors, "Phoneno is required"); }
  if (empty($idno)) { array_push($errors, "Idno is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
   if (empty($offense)) { array_push($errors, "Offense is required"); }
  if (empty($wanted)) { array_push($errors, "Most wanted is required"); }

 
  // Finally, register user if there are no errors in the form
  if(move_uploaded_file($_FILES['uploadedfilee']['tmp_name'], $target_path))

{

$conn = new mysqli("localhost", "root", "", "epolice");
$sql = "INSERT INTO wanted(`path`,fullnames,age, idno,gender,offense,wanted) VALUES ('$target_path','$fullnames', '$age', '$idno','$gender','$offense','$wanted')"; 
 if(mysqli_query($link, $sql)){
     echo "<script>alert('Successfully Uploaded.Click Ok button to view!!!'); window.location='policeviewwanted.php'</script>";} 
      else{ echo "<script>alert('ERROR: Could not file the complaint  $sql.!!!');window.location='policewanted.php'</script>". mysqli_error($link); 
  } // Close connection mysqli_close($link); 
}
}
?>



