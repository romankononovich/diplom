<?php
include("config.php");	
session_start();
	
	$login = $_SESSION['login'];
	$pass = $_SESSION['pass'];
	$q = mysql_query("SELECT login FROM org_user WHERE login='$login' AND password='$pass'",$db);
	$r = mysql_fetch_array($q);
	if(empty($r['login']))
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
			Тебе сюда нельзя(
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
	    	<div class="nav_item"><a href="index.php">Главаня страница</a></div>
			<div class="nav_item"><a href="admin/add_news.php">Добавить тест</a></div>
			<div class="nav_item"><a href="org/only_org.php">Мои тесты</a></div>
			<div class="nav_item"><a href="org/ok.php">На проверке</a></div>
			<div class="nav_item"><a href="action/exit">Выйти</a></div>
		</div> 
		

	</body>
</html>
<?php
}

?>