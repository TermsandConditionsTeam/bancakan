<?php
	include "dbcon.php";

	$email = trim(strtolower($_POST['email']));
	$email = mysql_escape_string($email);

	$query = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
	$getUsr = mysql_query($query);

	$result=mysql_fetch_array($getUsr);
	$count=mysql_num_rows($getUsr);

	echo $count;
?>