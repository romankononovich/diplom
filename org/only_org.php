<?php
	include("../config.php");
    session_start();


if($_SESSION['login'] AND $_SESSION['pass'])
	{
	$login = $_SESSION['login'];
	$password = $_SESSION['pass'];
	
    
    $result_user = mysql_query("SELECT login from org_user where login ='$login' ",$db);
	$r_user_panel = mysql_fetch_array($result_user);
    
   if (empty($r_user_panel['login'])){
       echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";
   }
    else{
        
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../css/style.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js">
		</script>
	</head>
	<body>
	
		<?php include("../admin/nav.php"); ?>
		<div id="container_full" style="width: 80%;position: absolute;right: 0;">
		
		<?php
            $admin = mysql_query("SELECT login FROM org_user WHERE login ='$login'",$db);
            $r_admin = mysql_fetch_array($admin);
          
			$q = mysql_query("SELECT * FROM kvest_map,org_user where kvest_map.name_creator=org_user.login ORDER BY kvest_map.id DESC",$db);
			while($res = mysql_fetch_array($q))
			{
				echo '
				<div class="delete_news">
					<div class="delete_title">'.$res['title'].'</div>
					<div class="delete_summary">'.$res['summary'].'</div>
					<div class="date">'.date('d-m-Y H:i:s',$res['date']).'</div>
					<a href="../admin/edit_news_action?id='.$res['id'].'" class="admin/edit_news_news_link"> Редактировать тест </a>
                    <a href="../admin/delete_news_action.php?id='.$res['id'].'" class="admin/delete_news_link"> Удалить тест </a>
                    <a href="../admin/delete_news_action.php?id='.$res['id'].'" class="admin/delete_news_link"> Отправить на проверку </a>
                    
				</div>
				';
			}
		
		?>
		</div>
	</body>
</html>
<?php 
    }
}
?>