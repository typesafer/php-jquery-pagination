<?php
$host = "localhost";
  $user = "root";
	$password = "";
	$database = "world";

	$db = mysql_connect($host, $user, $password);
	if($db)
	{
		$select_db = mysql_select_db($database);
		if(!$select_db)
		{
			echo 'Database Error:'. mysql_error();
		}
	}else
	{
		echo 'Connection Error:'. mysql_error();
	}
?>
