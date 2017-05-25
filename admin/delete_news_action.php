<?php
	include("../config.php");
	$id = $_GET['id'];
	if(is_numeric($id))
	{
		if($id!=-1)
		{
			$q = mysql_query("DELETE FROM kvest_map WHERE id='$id'",$db);
            $u = mysql_query("DELETE FROM user_game WHERE id_kvest='$id'",$db);
			if($q==true)
			{
                echo $id;
				//echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";
			}
			else {
				mysql_error();
			}
		}
		else {
			$q = mysql_query("DELETE FROM articles",$db);
			if($q==true)
			{
                echo 2;
				//echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";
			}
			else {
				mysql_error();
			}
		}
	}
?>