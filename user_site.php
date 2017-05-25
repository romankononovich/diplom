<?php
	session_start();
	include("config.php");
	$login = $_SESSION['login'];
	$pass = $_SESSION['pass'];
	$q = mysql_query("SELECT login FROM users WHERE login='$login' AND password='$pass'",$db);
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
			Войдите в аккаунт
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
            <div class="nav_first"><h3>Кабинет пользователя</h3></div>
	    	<div class="nav_item"><a href="../index.php">Глaвнaя страница</a></div>
	    	<div class="nav_item"><a href="../user/user_game.php">Мои тесты</a></div>
			<div class="nav_item"><a href="user/all.php">Просмотреть доступные тесты</a></div>
			<div class="nav_item"><a href="action/exit">Выйти</a></div>
		</div> 
	

	</body>
</html>
<?php
}

?>