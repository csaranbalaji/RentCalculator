<html>
<head>
<title>Rent Calc</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Rent Calc</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">List Tenants</a></li>
      <li><a href="#">Entry</a></li>
      <li><a href="#">Display</a></li>
    </ul>
  </div>
</nav>
<body>
	<form action="" method="post" enctype="multipart/form-data">
	<?php
		include 'credentials.php';
		$sql="select Name from Tenants";
		$result = $con->query($sql);
		
		$i=1;
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				echo "<b>".$row['Name'].": </b>"."<input type='text' class='form-control' id='t".$i."' placeholder='t".$i."' name='t".$i."'>"."<br>";
				$i=$i+1;
			}
		}
		
	?>
	<input id="btnSubmit" type="submit" name="btnSubmit"  value="Submit"/>
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
				ob_clean();
				echo nl2br("\n <p1>Registered succesfully!!! </p1>");
			}
			$con->close();
		}
	?>
</body>
