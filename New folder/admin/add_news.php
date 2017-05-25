<?php
	session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../css/style.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		
	</head>
	<body>
		<div id="container" style="height: 900px;">
			<form action="add_news_action.php" method="post">
				<input type="textbox" name="title" required placeholder="Заголовок статьи">
				<textarea required placeholder="Короткое описание" name="summary"></textarea>
				<textarea required placeholder="Статья" class="article_add" name="full"></textarea>
				<input type="submit" name="submit" value="Добавить статью">
			</form>
		</div>
	</body>
</html>