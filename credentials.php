<?php

// For getting Password
$myfile = fopen("/var/www/html/pass.txt", "r") or die("Unable to open file!");
$pass = fread($myfile,filesize("/var/www/html/pass.txt"));
fclose($myfile);
//MySQL Connection
$con = mysqli_connect("localhost","root",$pass) or die("error in database connection" . mysql_error());
mysqli_select_db($con ,"rent") or die("error to select the db" . mysql_error());

?>
