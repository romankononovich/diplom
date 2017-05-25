<?php
	session_start();
	header("Content-Type: text/html; charset=utf-8");
	include("../config.php");
	
	$password = $_POST['password'];
	$r_password = $_POST['r_password'];
	$login = $_POST['login'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$s_name = $_POST['second_name'];
	$sex = $_POST['sex'];
    $org = $_POST['org'];
	if($password!=$r_password)
	{
		exit ("Пароли должны совпадать");
	}
	if(strlen($login)<3 or strlen($login) > 15)
	{
		exit("Логин должен быть не меньше 3х символов и не больше 15");
	}
	
	if(strlen($name)<2 or strlen($name) > 20)
	{
		exit("Имя должно быть не меньше 2х символов и не больше 20");
	}
	if(strlen($s_name)<3 or strlen($s_name) > 25)
	{
		exit("Фамилия должна быть не меньше 3х символов и не больше 25");
	}
	if(!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i",$email))
	{
		exit ("Почта неверная");
	}
	$login = mysql_real_escape_string($login);
	$name = mysql_real_escape_string($name);
	$email = mysql_real_escape_string($email);
	$s_name = mysql_real_escape_string($s_name);
	$password = mysql_real_escape_string($password);
	
	$login = htmlspecialchars($login);
	$name = htmlspecialchars($name);
	$email = htmlspecialchars($email);
	$s_name = htmlspecialchars($s_name);
	$password = htmlspecialchars($password);
	
	$login = trim($login);
	$name = trim($name);
	$email = trim($email);
	$s_name = trim($s_name);
	$password = trim($password);
	
	
	$name = ucfirst($name);
	$s_name = ucfirst($s_name);
	$q = mysql_query("SELECT login FROM users WHERE login='$login'",$db) or die(mysql_error());
	$r = mysql_fetch_array($q);
	if(!empty($r['login']))
	{
		exit("Такой логин уже есть");
	}
	
	
	$q2 = mysql_query("SELECT email FROM users WHERE email='$email'",$db) or die(mysql_error());
	$r2 = mysql_fetch_array($q2);
	if(!empty($r2['email']))
	{
		exit("Такой email уже есть");
	}
	$password = md5($password);
	$password = strrev($password);
	
    $password = $password."ygtr7ur56378238";
	
	$date = time();
    
    if($org==0)
    {
        $save_org = mysql_query("INSERT INTO org_user (login, password) VALUES('$login','$password')",$db);
        if($save_org==true)
	{
		echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";
	}
	else {
		echo "Пользователь не зареган";
	}
        
        
        
        
        
    }
    else{
        
        $save_user = mysql_query("INSERT INTO users (login, email, password, name, second_name, sex, date) VALUES('$login','$email','$password','$name','$s_name','$sex','$date')",$db);

	if($save_user==true)
	{
		echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";
	}
	else {
		echo "Пользователь не зареган";
	}
        
    }
	
	
?>