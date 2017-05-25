<?php
   
   include("../config.php");



	function filter_data($var)
	{
		$var = mysql_real_escape_string($var);
		$var = htmlspecialchars($var);
		$var = trim($var);
		return $var;
	}
	$login = filter_data($_POST['login']);
	$pass = filter_data($_POST['pass']);
	
	$q = mysql_query("INSERT INTO org_user SET login='$login',password='$pass'",$db);
	if($q==true)
	{
		echo "<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>";
	}
	else {
		mysql_error();
	}
?>