  <?php


$idno="";
$dates = "";
$location   = "";
$assault    = "";
$description = "";
$errors = array(); 

$link = mysqli_connect("localhost", "root", "", "epolice"); 
if (isset($_POST['submit'])) {
  // receive all input values from the form
 $idno = mysqli_real_escape_string($link, $_REQUEST['idno']);
  $dates = mysqli_real_escape_string($link, $_REQUEST['date']);
  $location = mysqli_real_escape_string($link, $_REQUEST['location']); 
  $assault = mysqli_real_escape_string($link, $_REQUEST['assault']);
  $description = mysqli_real_escape_string($link, $_REQUEST['description']); 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
    
   if (empty($idno)) { array_push($errors, "IDNO is required"); }
   if (empty($dates)) { array_push($errors, "Date is required"); }
  if (empty($location)) { array_push($errors, "Location is required"); }
  if (empty($assault)) { array_push($errors, "Type of assault is required"); }
   if (empty($description)) { array_push($errors, "description is required"); }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {	
  $idno =$idno;
  $sql = "INSERT INTO complaint (idno,dates, location,assault, description) VALUES ('$idno','$dates', '$location', '$assault', '$description')"; 
 if(mysqli_query($link, $sql)){
     echo "<script>alert('Complaint has been received, we will be back to you shortly.!!!'); window.location='obno.php'</script>";} 
      else{ echo "<script>alert('ERROR: Could not file the complaint  $sql.!!!');window.location='Filecomplaint.php'</script>". mysqli_error($link); 
  } // Close connection mysqli_close($link); 
}
}
?>
