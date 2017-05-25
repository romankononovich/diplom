<?php
	session_start();
	include("config.php");
	$login = $_SESSION['login'];
	$pass = $_SESSION['pass'];
	$q = mysql_query("SELECT is_admin FROM admin WHERE login='$login' AND password='$pass'",$db);
	$r = mysql_fetch_array($q);
	if($r['is_admin']==0)
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
	    	<div class="nav_item"><a href="index.php">Глaвнaя страница</a></div>
			<div class="nav_item"><a href="admin/add_news.php">Добавить тест</a></div>
			<div class="nav_item"><a href="admin/delete_news">тесты админа</a></div>			
			<div class="nav_item"><a href="org/org_kvest.php">тесты модераторов</a></div>
			<div class="nav_item"><a href="action/exit">Выйти</a></div>
		</div> 
		<div class="add_org">
            <div class="nav_item"><a href="../admin/add_org.php">Добавить модератора</a></div>
			<div class="nav_item"><a href="../admin/delete_news">Удалить модератора</a></div>
			<div class="nav_item"><a href="../admin/edit_news">Редактировать модератора</a></div>
</div>

	</body>
</html>
<?php
}

?>