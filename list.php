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
      <li class="active"><a href="list.php">Show Tenants</a></li>
      <li><a href="entry.php">Entry</a></li>
      <li><a href="display.php">Display</a></li>
    </ul>
  </div>
</nav>
<body>
	<br/><br/>
		<table class="table table-striped table-bordered" align="center">
			<tr><th>Tenant</th><th>Rent</th><th></th></tr>
	<?php
		include 'credentials.php';
		$sql="select * from Tenants";
		$result = $con->query($sql);
		
		$i=1; // To get number of Tenants
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				echo "<tr><td><label>".$row['Name']."</label></td>"."<td>".$row['Rent']."</td><td><a href='list.php?del=true&num=".$i."'><span class='glyphicon glyphicon-remove'></span></a></td></tr>";
				$i=$i+1;
			}
		}
		
		$sql="select sum(rent) as total from Tenants";
		$result = $con->query($sql);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc())
				echo "<tr style='color:brown;'><td><label>Total</label></td>"."<td>".$row['total']."</td><td></td></tr>";
		}
	?>
		</table><br/><br/>
		<form  class="container-fluid" action="" method="post" enctype="multipart/form-data">
			<table class="table table-striped table-bordered" align="center">
				<th>Add a new Tenant</th><th></th><th></th>
				<tr width=40%><td><input id="Name" class="form-control" type="text" name="Name"  placeholder="Name" required maxlength="15" /></td>
				<td width=30%><input id="Rent" class="form-control" type="text" name="Rent"  placeholder="Rent" required /></td>
				<td><input id="btnadd" type="submit" class="btn btn-primary" name="btnadd"  value="Add"/></td></tr>
			</table>	
		</form>
	<?php
		if(isset($_REQUEST["btnadd"]))
		{	
			$name = $_REQUEST['Name'];
			$rent = $_REQUEST['Rent'];
			$sql="insert into Tenants values('$name',$rent,$i)";
			$result = $con->query($sql);
			if($result)
			{	
				header("location: list.php");
			}
			else
				echo nl2br("\n <div class='alert alert-danger' align='center'><strong>Failure!</strong> Data has not been entered due to an ERROR.</div>");
		}
		if(isset($_REQUEST["del"]))
		{	
			$num = $_REQUEST['num'];
			$sql="delete from Tenants where Num=$num";
			$result = $con->query($sql);
			if($result)
			{	
				header("location: list.php");
			}
			else
				echo nl2br("\n <div class='alert alert-danger' align='center'><strong>Failure!</strong> Data has not been Deleted due to an ERROR.</div>");
		}
		$con->close();
	?>
</body>
</html>
