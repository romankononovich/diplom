<?php
	include("../config.php");
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
            <div class="nav_first"><h3>тесты без подтверждения</h3></div>
	    	<div class="nav_item"><a href="../index.php">Глaвнaя страница</a></div>
	    	<div class="nav_item"><a href="../admin_site.php">Кабинет</a></div>
			<div class="nav_item"><a href="../admin/ok.php">Одобренные тесты</a></div>
	
			<div class="nav_item"><a href="../action/exit">Выйти</a></div>
		</div> 
		
		<div id="container_full" style="width: 80%;position: absolute;right: 0;">
		
		<?php
			$q = mysql_query("SELECT * FROM kvest_map where verify='0'",$db);
            
			while($res = mysql_fetch_array($q))
			{
				echo '
				<div class="delete_news">
                    <div class="delete_title">Организатор-------'.$res['name_creator'].'</div>
					<div class="delete_title">'.$res['title'].'</div>
					<div class="delete_summary">'.$res['summary'].'</div>
					<div class="date">'.date('d-m-Y H:i:s',$res['date']).'</div>
					<a href="../full.php?id='.$res['id'].'" class="delete_news_link">Подробнее</a>
                    <a href="../admin/edit_news_action?id='.$res['id'].'" class="admin/edit_news_news_link"> Редактировать тест </a>
                    <a href="../admin/delete_news_action.php?id='.$res['id'].'" class="admin/delete_news_link"> Удалить тест </a>
                    
				</div>
				';
			}
			echo '<div class="delete_news">
				<a href="delete_news_action.php?id=-1" class="delete_news_link">Удалить все тесты</a>
			</div>
			';
		?>
		</div>
	</body>
</html>