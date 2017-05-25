<?php
session_start();
include("config.php");
if($_SESSION['login'] AND $_SESSION['pass'])
	{
	$login = $_SESSION['login'];
	$password = $_SESSION['pass'];
	}
	else {
		$page = $_GET['page'];
		if($page=='login' OR $page=='' OR $page=='index')
		{
	?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js">
		</script>
		<script type="text/javascript" src="js/bootstrap.min.js">
		</script>
	</head>
	<body>
	
	<ul class="nav nav-pills">
  <li role="presentation" class="active"> <a href="index" >Главная страница</a></li>
  <li role="presentation"><a href="?page=reg">Регистрация</a></li>
  
</ul>
	
	
		
		<div class="auth_form">
						Вход
						<form action="action/auth_action.php" method="POST">
							<input type="textbox" name="login" placeholder="Логин" style="width: 290px;"/><br/>
							<input type="password" name="password" placeholder="Пароль" style="width: 290px;"/><br/>
							<input type="submit" name="submit" value="Войти"/>
						</form>
		</div>
	</body>
	</html>
	<?php
	}
	else if($page=='reg'){
	?>
		<!DOCTYPE HTML>
	<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js">
		</script>
		<script type="text/javascript" src="js/bootstrap.min.js">
		</script>
	</head>
	<body>
		<ul class="nav nav-pills">
  <li role="presentation" class="active"> <a href="index" >Главная страница</a></li>
  <li role="presentation"><a href="my_sign.php">Вход</a></li>
  
</ul>
		<div class="auth_form" style="height: 450px">
				Регистрация
				<form action="action/reg.php" method="POST">
					<input type="textbox" name="login" placeholder="Логин" required autocomplete="off" style="width: 290px;"/><br/>
					<input type="email" name="email" placeholder="E-mail" required autocomplete="off" style="width: 290px;"/><br/>
					<input type="textbox" name="name" placeholder="Имя" required autocomplete="off" style="width: 290px;"/><br/>
					<input type="textbox" name="second_name" placeholder="Фамилия" required autocomplete="off" style="width: 290px;"/><br/>
					
					<select name="sex" style="width: 290px;">
						
						<option value="0" selected>Женщина</option>
						<option value="1">Мужчина</option>
					</select><br/>
					
					
					<select name="org" style="width: 290px;">
						
						<option value="0" selected>Организатор</option>
						<option value="1">Пользователь</option>
					</select><br/>
					
					<input type="password" name="password" placeholder="Пароль" required style="width: 290px;"/><br/>
					<input type="password" name="r_password" placeholder="Повторите пароль" required style="width: 290px;"/><br/>
					
					<input type="submit" name="sumbit" value="Зарегистрироваться"/>
				</form>
			</div>
	</body>
	</html>
	<?php
	}
	}
?>