<?php
	session_start();
	include ("../config.php");
	
	$login = $_POST['login'];
	$password = $_POST['password'];
	$login = trim($login);
	$password = trim($password);
	
	$password = md5($password);
	$password = strrev($password);
	$password = $password."ygtr7ur56378238";
	

//$result_user = mysql_query("SELECT * FROM users WHERE login='$login' AND password='$password'",$db);
//	$r_user_panel = mysql_fetch_array($result_user);
//	if(empty($r_user_panel['id']))
//	{
//		exit("error");
//	}
//	else {
//		$_SESSION['pass'] = $r_user_panel['password'];
//		$_SESSION['login'] = $r_user_panel['login'];
//		$_SESSION['id'] = $r_user_panel['id'];
//	}

 
	$result_user = mysql_query("SELECT * FROM users WHERE login='$login' AND password='$password'",$db);
	$r_user_panel = mysql_fetch_array($result_user);

    $result_org = mysql_query("SELECT * FROM org_user WHERE login='$login' AND password='$password'",$db);
	$r_org_panel = mysql_fetch_array($result_org);

    $result_admin = mysql_query("SELECT * FROM admin WHERE login='$login' AND password='$password'",$db);
	$r_admin_panel = mysql_fetch_array($result_admin);
    
    if(empty($r_user_panel['id']))
	{
         
   
        if(empty($r_org_panel['id']))
	{
           if(empty($r_admin_panel['id']))
           {
               exit("error");
           }
            else{
                  $_SESSION['pass'] = $r_admin_panel['password'];
                  $_SESSION['login'] = $r_admin_panel['login'];
		          $_SESSION['id'] = $r_admin_panel['id'];
            }
	}
        else{
        $_SESSION['pass'] = $r_org_panel['password'];
		$_SESSION['login'] = $r_org_panel['login'];
		$_SESSION['id'] = $r_org_panel['id'];
        }
    }
	else {
		$_SESSION['pass'] = $r_user_panel['password'];
		$_SESSION['login'] = $r_user_panel['login'];
		$_SESSION['id'] = $r_user_panel['id'];
	}
  
	
    
    
	echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";
?>