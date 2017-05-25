<?php
	session_start();
	if(!$_SESSION['login'] AND !$_SESSION['pass'])
	{
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
		<div class="auth_form">
			<form action="admin/auth_action.php" method="post">
				<input name="login" type="textbox" placeholder="login">
				<input name="pass" type="password" placeholder="password">
				<input name="submit" type="submit" value="Enter">
			</form>
		</div>
	</body>
</html>
<?php
}
else {
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
		<div class="nav">
			<a href="admin/add_news.php">Добавить новость</a>
			<a href="admin/delete_news.php">Удалить новость</a>
			<a href="admin/edit_news.php">Редактировать новость</a>
		</div>
	</body>
</html>
<?php
}

?>