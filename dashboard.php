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
$sql2 = "SELECT* FROM cellregistry";
$result2 = mysqli_query($conn, $sql2);
$cellregistry = mysqli_num_rows($result2);

$sql2 = "SELECT* FROM missing";
       $result2 = mysqli_query($conn, $sql2);
       $missing = mysqli_num_rows($result2);

$sql = "SELECT* FROM wanted";
       $result = mysqli_query($conn, $sql);
       $wanted = mysqli_num_rows($result);

$sql1 = "SELECT* FROM assignofficer";
       $result1 = mysqli_query($conn, $sql1);
       $assignofficer = mysqli_num_rows($result1);

$sql2 = "SELECT* FROM complaint";
$result2 = mysqli_query($conn, $sql2);
$complaint = mysqli_num_rows($result2);

$sql2 = "SELECT* FROM missing";
       $result2 = mysqli_query($conn, $sql2);
       $missing = mysqli_num_rows($result2);

 

 include('includes/header.php');
?>
<div class="main-content"style="background-color:#fff;">
   <div class="row col-md-12"style=" margin-top:50px;margin-left:20px;">
     <div class="col-lg-3 col-xs-6">
                <div class="card" >
                <div class="small-box bg-green card-body">
                    <a href="policeviewusers.php" class="small-box-footer">
                       Registered users
                    </a>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="inner">
                        <h3>total (<?php echo $users;  ?>)</h3>
                    </div>
                </div>
                </div>
               </div>
            <div class="col-lg-3 col-xs-6">
                <div class="card">
                <div class="small-box bg-purple card-body">
                    <a href="policecomplaints.php" class="small-box-footer">
                    <b>Complaints</b></a>
                    </a>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="inner">
                        <h3>total (<?php echo $complaint;  ?>)</h3>
                    </div>
                </div>
                </div>    
            </div>
               <div class="col-lg-3 col-xs-6">
                <div class="card">
               <div class="small-box bg-pink card-body">
                    <a href="policeviewcellregistry.php" class="small-box-footer">
                      cellregistry
                    </a>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="inner">
                        <h3>total (<?php echo $cellregistry;  ?>)</h3>
                    </div>
                </div>
                </div>    
            </div>
              <div class="col-lg-3 col-xs-6">
                <div class="card">
                  <div class="small-box bg-aqua card-body">
                    <a href="policeviewmissing.php" class="small-box-footer">
                      Missing
                    </a>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="inner">
                        <h3>total (<?php echo $missing;  ?>)</h3>
                    </div>
                </div>
                </div>    
            </div>
              <div class="col-lg-3 col-xs-6">
                <div class="card">
            <div class="small-box bg-aqua card-body">
                    <a href="policeviewwanted.php" class="small-box-footer">
                      Wanted Persons
                    </a>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="inner">
                        <h3>total (<?php echo $wanted;  ?>)</h3>
                    </div>
                </div>
                </div>    
            </div>
              <div class="col-lg-3 col-xs-6">
                <div class="card">
                <div class="small-box bg-yellow card-body">
                    <a href="policeviewassignedofficer.php" class="small-box-footer">
                      Assigned Officers
                    </a>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="inner">
                        <h3>total (<?php echo $assignofficer;  ?>)</h3>
                    </div>
                </div>
                </div>    
            </div>
          <div class="col-lg-3 col-xs-6">
                <div class="card">
                <div class="small-box bg-yellow card-body">
                    <a href="policecomplaints.php" class="small-box-footer">
                      FIR Reports
                    </a>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="inner">
                        <h3>total (<?php echo $complaint;  ?>)</h3>
                    </div>
                </div>
                </div>    
            </div>
 <div class="col-lg-3 col-xs-6">
                <div class="card">
            <div class="small-box bg-purple card-body">
                    <a href="policeviewusers.php" class="small-box-footer">
                      Signed Users
                    </a>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="inner">
                        <h3>total (<?php echo $users;  ?>)</h3>
             </div>
                </div>
                </div>   
              </div>  
              <div>
              </div>
</div>
<br><br><br>

    <div class="col-md-12 graphs">

    
<?php
     
    $dataPoints = array( 

        
        array("y" => 612.00, "label" => "November" ),
        array("y" => 3373.00, "label" => "December" ),
        array("y" => 2435.00, "label" => "January" ),
        array("y" => 1842.00, "label" => "February" ),
    );
    
    ?>





    <script>
    window.onload = function() {
     
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Reported Crime cases For 4months "
        },
        axisY: {
            title: "Cases "
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## Nos",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
     
    }
    </script>

    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        
    </div>
</div>



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


 <?php
  include('includes/footer.php');
 ?>