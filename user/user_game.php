<?php
	session_start();
	include("../config.php");
if($_SESSION['login'] AND $_SESSION['pass'])
	{
	$login = $_SESSION['login'];
	$pass = $_SESSION['pass'];
	$q = mysql_query("SELECT login FROM users WHERE login='$login' AND password='$pass'",$db);
	$r = mysql_fetch_array($q);
	
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
		
		<div class="nav">
        
            <div class="nav_first"><h3>Мои тесты</h3></div>
	    	<div class="nav_item"><a href="../index.php">Глaвнaя страница</a></div>
	    	<div class="nav_item"> <a href="#" onclick="history.back();">Назад</a></div>
			<div class="nav_item"><a href="../action/exit">Выйти</a></div>
		</div> 
		<div id="container_full" style="width: 80%;position: absolute;right: 0;">
		
		<?php
			
				
   
			$q = mysql_query("SELECT * FROM kvest_map, user_game where kvest_map.id=user_game.id_kvest ORDER BY kvest_map.id DESC",$db);
	 	
    while($res = mysql_fetch_array($q))
			
			{
				echo '
				<div class="delete_news">
                   <div class="delete_title">'.$res['title'].'</div>
					<div class="delete_summary">'.$res['summary'].'</div>
					<div class="date">'.date('d-m-Y H:i:s',$res['date']).'</div>
					<a href="../full.php?id='.$res['id'].'" class="delete_news_link">Подробнее</a>
                    ';
            }
		?>
		</div>
	</body>
</html>
<?php
}
else
{
    echo 'Erorr';
}
?>