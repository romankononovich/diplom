<?php
	include("../config.php");

	function sklonenie($n,$s1,$s2,$s3)
	{
		$m = $n%10;
		$j = $n%100;
		if(!$m||$m>=5 || ($j>=10 && $j<=20)) return $n. ' ' .$s3;
		if($m>=2 && $m<=4) return $n. ' ' .$s2;
		return $n. ' ' .$s1;
	}
	$q = mysql_query("SELECT id FROM kvest_map",$db);
	$num = 0;
	if(mysql_num_rows($q)) $num = mysql_num_rows($q);
	$num = sklonenie($num,"тест","теста","тестов");
?>