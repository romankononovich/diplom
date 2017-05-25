<?php
	include("config.php");
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
		<a href="index.php">
			<div id="header">
				MY CMS
			</div>
		</a>
		<div id="container">
			<?php
				$id = $_GET['id'];
				$q = mysql_query("SELECT title,full,date FROM kvest_map WHERE id='$id'",$db);
				$res = mysql_fetch_array($q);
				echo '
				<div class="title_full">'.$res['title'].'</div>
				<div class="full">'.$res['full'].'</div>
				
				<div class="date"> Дата публикации '.date('H:m',$res['date']).'</div>
				';
			?>
		</div>
	</body>
</html>