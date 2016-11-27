<html>
<head>
<title>Data Entry</title>
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
      <li class="active"><a href="#">Entry</a></li>
      <li><a href="display.php">Display</a></li>
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
			</table><br/><br/>
			<table class="table table-striped">
			<tr><th>Tenant</th><th>EB Reading</th></tr>
	<?php
		include 'credentials.php';
		$sql="select Name from Tenants";
		$result = $con->query($sql);
		
		$i=1; // To get number of tenants 
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				echo "<tr><td><label>".$row['Name']."</label></td>"."<td><input type='text' class='form-control' id='t".$i."' placeholder='Meter ".$i."' name='t".$i."'>"."</td></tr>";
				$i=$i+1;
			}
		}
		
	?>
	</table>
	<input id="btnSubmit" type="submit" class="btn btn-primary" name="btnSubmit"  value="Submit"/>
	
	</form>
	<?php
		if(isset($_REQUEST["btnSubmit"]))
		{
			$month = $_REQUEST['month'];
			for($inc=1;$inc<$i;$inc++)
			{		 
				$sql="update EB set  m".$month."=".$_REQUEST['t'.$inc.'']." where Num=".$inc;
				$result = $con->query($sql);
			}		
			if($result>0)
			{
				echo nl2br("\n <div class='alert alert-success' align='center'><strong>Success!</strong> Data Has Been Entered Successfully.</div>");
			}
			$con->close();
		}
	?>
</body>
</html>
