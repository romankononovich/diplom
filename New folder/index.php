<?php
	include("config.php");
	error_reporting(E_ALL);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js">
		</script>
	</head>
	<body>
		<a href="/">
			<div id="header">
				MY CMS
			</div>
		</a>
		<div id="container">
			<?php
				$q = mysql_query("SELECT * FROM kvest_map",$db);
				while($res = mysql_fetch_array($q))
				{
					echo '<div class="article">
						<div class="top_block">
							<div class="title">'.$res['title'].'</div>
							<div class="summary">'.$res['summary'].'</div>
						</div>
						<div class="bottom_block">
							<div class="date"> Дата публикации '.date('H:m',$res['date']).'</div>
							<div class="more">
								<a href="full.php?id='.$res['id'].'">Подробнее...</a>
							</div>
						</div>
					</div>';
				}
			?>
		</div>
	</body>
</html>