<a href='test.php?test=true&vari=1'>Test</a>
<?php
$var=0;
if(isset($_REQUEST["test"]))
{	$var=$_REQUEST['vari'];
	echo "works".$_REQUEST['vari'];
}
echo "wokring".$var;

	if(isset($_REQUEST["edit"]))
	{
		$new = $_REQUEST['new'];
		$num = $_REQUEST['num'];
		$sql="update EB set m$month = $new where Num = $num";
		$result = $con->query($sql);
		if($result)
		{	
			//header("location: display.php?btnSubmit=true&month=$month");
		}
		else
			echo nl2br("\n <div class='alert alert-danger' align='center'><strong>Failure!</strong> Data has not been Updated due to an ERROR.</div>");

	}
?>
<button onclick="edit(5)">click</button>
<script>
	function edit(i){
		alert("clicked"+i);
		}
</script>
