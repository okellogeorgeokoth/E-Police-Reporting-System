  <?php


$fullnames = "";
$age   = "";
$idno = "";
$nationality   = "";
$dates = "";
$location   = "";
$gender  = "";
$description = "";
$errors = array(); 
$target_path = "image/";

$link = mysqli_connect("localhost", "root", "", "epolice"); 
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $target_path = $target_path . basename( $_FILES['uploadedfilee']['name']);
  $fullnames = mysqli_real_escape_string($link, $_REQUEST['fullnames']);
  $age = mysqli_real_escape_string($link, $_REQUEST['age']);
  $idno = mysqli_real_escape_string($link, $_REQUEST['idno']); 
  $nationality = mysqli_real_escape_string($link, $_REQUEST['nationality']);
  $dates = mysqli_real_escape_string($link, $_REQUEST['date']);
  $location = mysqli_real_escape_string($link, $_REQUEST['location']); 
  $gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
  $description = mysqli_real_escape_string($link, $_REQUEST['description']); 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullnames)) { array_push($errors, "Fullnames are required"); }
  if (empty($age)) { array_push($errors, "age is required"); }
  if (empty($idno)) { array_push($errors, "Idno is required"); }
  if (empty($nationality)) { array_push($errors, "Nationality is required"); }
   if (empty($dates)) { array_push($errors, "Date is required"); }
  if (empty($location)) { array_push($errors, "Location is required"); }
   if (empty($gender)) { array_push($errors, "Gender is required"); }
   if (empty($description)) { array_push($errors, "description is required"); }
  // Finally, register user if there are no errors in the form
 if(move_uploaded_file($_FILES['uploadedfilee']['tmp_name'], $target_path))

{

$conn = new mysqli("localhost", "root", "", "epolice");

  $sql = "INSERT INTO missing (`path`,fullnames,age, idno,nationality,dates, location,gender, description) VALUES ('$target_path','$fullnames', '$age', '$idno','$nationality', '$dates', '$location','$gender','$description')"; 
 if ($link->query($sql) === TRUE) {
     echo "<script>alert('Missing Persons details uploaded successfully!!'); window.location='viewmissing.php'</script>";} 
      else{ echo "<script>alert('ERROR: Could not file the complaint  $sql.!!!');window.location='missing.php'</script>". mysqli_error($link); 
  } // Close connection mysqli_close($link); 
$conn->close();
}
}
?>



