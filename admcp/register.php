<?php
session_start();
include'connection.php';
if (array_key_exists("id", $_COOKIE)) {
  $_SESSION['id']=$_COOKIE['id'];
}
if (array_key_exists("id", $_SESSION)) {
  //echo "<p>Logged In!<a href='logout.php'>Log out</a></p>";
}else{
  header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN- BOOTCAMP 2019</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php include'sidebar.php';?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Registration</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Registration</h1>
			</div>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Details of Registered Participant
						
						</div>
					<div class="panel-body">
<?php 
if (isset($_SESSION['failedmsg'])) {
	echo $_SESSION['failedmsg'];
	 unset($_SESSION['failedmsg']);
}
if (isset($_SESSION['successmsg'])) {
	echo $_SESSION['successmsg'];
	 unset($_SESSION['successmsg']);
}

?>
<div class="table-responsive">					            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Name</th>
        <th>Sex</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Course</th>
        <th>Delete</th>


      </tr>
    </thead>
    <tbody>
    	<?php
$sql="SELECT * FROM registered";
$runsql=mysqli_query($conn, $sql);
$counter=1;
while ($rowoutput=mysqli_fetch_array($runsql)) {

		?>
      <tr>
      
        <td><?php echo $counter; ?></td>
        <td><?php echo $rowoutput['name'];?></td>
        <td><?php echo $rowoutput['sex'];?></td>
        <td><?php echo $rowoutput['email'];?></td>
        <td><?php echo $rowoutput['address'];?></td>
        <td><?php echo $rowoutput['phoneno'];?></td>
        <td><?php echo $rowoutput['course'];?></td>
        <td>
         	
         	  <form action="delete.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $rowoutput['id']; ?>">
                  <input type="submit" name="submit" value="Delete" class="btn btn-danger" >
                  </form>
     
</td>
      	<?php $counter++;?>
    </tr>
<?php
    }
   ?>
    </tbody>
  </table>
  </div>

					</div>
				</div>
			</div>
		</div><!--/.row-->
		

		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">Designed by <a href="http://www.damisa.tech">Damisa Gurus Limited</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	  

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
	window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
	var chart3 = document.getElementById("doughnut-chart").getContext("2d");
	window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
	responsive: true,
	segmentShowStroke: false
	});
	var chart4 = document.getElementById("pie-chart").getContext("2d");
	window.myPie = new Chart(chart4).Pie(pieData, {
	responsive: true,
	segmentShowStroke: false
	});
	var chart5 = document.getElementById("radar-chart").getContext("2d");
	window.myRadarChart = new Chart(chart5).Radar(radarData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.05)",
	angleLineColor: "rgba(0,0,0,.2)"
	});
	var chart6 = document.getElementById("polar-area-chart").getContext("2d");
	window.myPolarAreaChart = new Chart(chart6).PolarArea(polarData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	segmentShowStroke: false
	});
};
	</script>	
</body>
</html>
