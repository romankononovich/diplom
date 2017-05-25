<?php
	include("../config.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../css/style.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js">
		</script>
	</head>
	<body>
		<?php include("nav.php");?>
		<div id="container_full" style="width: 80%;position: absolute;right: 0;">
		
		<?php
			$q = mysql_query("SELECT * FROM kvest_map",$db);
			while($res = mysql_fetch_array($q))
			{
				echo '
				<div class="delete_news">
					<div class="delete_title">'.$res['title'].'</div>
					<div class="delete_summary">'.$res['summary'].'</div>
					<div class="date">'.date('d-m-Y H:i:s',$res['date']).'</div>
					<a href="edit_news_action?id='.$res['id'].'" class="delete_news_link">Редактировать тест</a>
				</div>
				';
			}
		?>
		</div>
	</body>
</html>