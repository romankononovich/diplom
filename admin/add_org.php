<?php
	session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../css/style.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		
		
	</head>
	<body>
		<?php include("nav.php");?>
		<div id="container" style="height: 980px;width: 80%;position: absolute;right: 0;">
			<form action="add_org_action.php" method="post">
				<input type="textbox" name="login" required placeholder="Логин">
				<input type="textbox" name="pass" required placeholder="Пароль">
				<input type="submit" name="submit" value="Добавить организатора">
			</form>
		</div>
	</body>
</html>