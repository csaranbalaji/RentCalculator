<html>
<head>
<title>Display</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/rent.css">
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Rent Calc</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.html">Home</a></li>
      <li><a href="list.php">List Tenants</a></li>
      <li><a href="entry.php">Entry</a></li>
      <li class="active"><a href="display.php">Display</a></li>
    </ul>
  </div>
</nav>
<body>
	<br/><br/>
	<form  class="container-fluid" action="" method="post" enctype="multipart/form-data">
		<table class="table table-striped">
			<tr><td>Select Month</td>
			<td><select required class="sel" name="month"><option value="">Select...</option>
					<option value="1">Jan</option>
					<option value="2">Feb</option>
					<option value="3">Mar</option>
					<option value="4">Apr</option>
					<option value="5">May</option>
					<option value="6">Jun</option>
					<option value="7">Jul</option>
					<option value="8">Aug</option>
					<option value="9">Sep</option>
					<option value="10">Oct</option>
					<option value="11">Nov</option>
					<option value="12">Dec</option>
					</select></td></tr>
			</table><br/>
			<input id="btnSubmit" type="submit" class="btn btn-primary" name="btnSubmit"  value="Submit"/>
	</form><br/>
		<table class="table table-striped">
			<tr><th>Tenant</th><th>Rent</th><th>Last Month</th><th>This Month</th><th>Units</th><th>EB</th><th>Total</th></tr>
	<?php
	include 'credentials.php';
	if(isset($_REQUEST["btnSubmit"]))
	{
		$month = $_REQUEST['month'];
		$sql="select Name,Rent,m".($month-1).",m".$month." from Tenants,EB where Tenants.num=EB.num";
		$result = $con->query($sql);
		
		$i=1;
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				$units = $row['m'.$month] - $row['m'.($month-1)]; // Units Consumed
				$eb = $units*6; // Basic Slab
				if($units>250) 
					$eb = 250*6 + ($units-250)*7.5; // Normal Slab 
				$total = $row['Rent'] + $eb + 250; // Rent + EB + Maintainance cost
				$sum = $sum + $total;
				echo "<tr><td><label>".$row['Name']."</label></td>"."
				<td>".$row['Rent']."</td>
				<td>".$row['m'.($month-1)]."</td>
				<td>".$row['m'.$month]."</td>
				<td>".$units."</td>
				<td>".$eb."</td>
				<td>".$total."</td>
				</tr>";
				$i=$i+1;
			}
		}
		
		$sql="select sum(rent) as total from Tenants";
		$result = $con->query($sql);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc())
				echo "<tr style='color:brown;'><td><label>Total</label></td>"."<td>".$row['total']."</td><td></td><td></td><td></td><td></td><td>".$sum."</td></tr>";
		}
		$con->close();
	}
	?>
		</table>	
</body>
</html>
