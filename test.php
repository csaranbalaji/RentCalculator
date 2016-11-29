<a href='test.php?test=true&vari=1'>Test</a>
<?php
if(isset($_REQUEST["test"]))
{
	echo "works".$_REQUEST['vari'];
}
?>
