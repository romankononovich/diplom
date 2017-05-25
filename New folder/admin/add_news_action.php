<?php
	include("../config.php");
	function filter_data($var)
	{
		$var = mysql_real_escape_string($var);
		$var = htmlspecialchars($var);
		$var = trim($var);
		return $var;
	}
	$title = filter_data($_POST['title']);
	$summary = filter_data($_POST['summary']);
	$full = $_POST['full'];
	$date = time();
	$q = mysql_query("INSERT INTO kvest_map SET title='$title',summary='$summary',full='$full',date='$date'",$db);
	if($q==true)
	{
		echo "<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>";
	}
	else {
		mysql_error();
	}
?>