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
	$data_test = $_POST['data_test'];
	$id = intval($_POST['id']);
	$q = mysql_query("UPDATE kvest_map SET title='$title',summary='$summary',full='$full',data_test='$data_test' WHERE id='$id'",$db) or die(mysql_error());




	if($q==true)
	{
        
      
      
         //echo mysql_errno($q) . ": " . mysql_error($q) . "\n";
		echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";
	}
	else {
        echo mysql_errno($q) . ": " . mysql_error($q) . "\n";
	
	}
?>

<!--

,summary='$summary',full='$full', data_test='$data_test'-->
