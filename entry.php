<html>
<head>
<title>Rent Calc</title>
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
      <li><a href="#">List Tenants</a></li>
      <li class="active"><a href="#">Entry</a></li>
      <li><a href="#">Display</a></li>
    </ul>
  </div>
</nav>
<body>
	<br/><br/>
	<form  class="container-fluid" action="" method="post" enctype="multipart/form-data">
		<table class="table table-striped">
			<tr><th>Tenant</th><th>EB Reading</th></tr>
	<?php
		include 'credentials.php';
		$sql="select Name from Tenants";
		$result = $con->query($sql);
		
		$i=1;
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
			$month = 3;
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
