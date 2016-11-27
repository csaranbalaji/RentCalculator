<html>
<head>
<title>Tenants List</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/rent.css">
<style>
.table {
	width: 70%;
}
</style>
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Rent Calc</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.html">Home</a></li>
      <li class="active"><a href="#">List Tenants</a></li>
      <li><a href="entry.php">Entry</a></li>
      <li><a href="display.php">Display</a></li>
    </ul>
  </div>
</nav>
<body>
	<br/><br/>
		<table class="table table-striped" align="center">
			<tr><th>Tenant</th><th>Rent</th></tr>
	<?php
		include 'credentials.php';
		$sql="select * from Tenants";
		$result = $con->query($sql);
		
		$i=1; // To get number of Tenants
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				echo "<tr><td><label>".$row['Name']."</label></td>"."<td>".$row['Rent']."</td></tr>";
				$i=$i+1;
			}
		}
		
		$sql="select sum(rent) as total from Tenants";
		$result = $con->query($sql);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc())
				echo "<tr style='color:brown;'><td><label>Total</label></td>"."<td>".$row['total']."</td></tr>";
		}
	?>
		</table>	
</body>
</html>
