<?php
	session_start();
	include("../config.php");
	$id = intval($_GET['id']);
	$q = mysql_query("SELECT * FROM articles WHERE id='$id'");
	$res = mysql_fetch_array($q);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../css/style.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script type="text/javascript">
		tinymce.init({
            forced_root_block : false, 
force_br_newlines : true,
force_p_newlines : false,
			selector: "textarea",
			theme: "modern",
			plugins: [
				"advlist autolink lists link image charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen",
				"insertdatetime media nonbreaking save table contextmenu directionality",
				"emoticons template paste textcolor colorpicker textpattern"
			],
			toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
			toolbar2: "print preview media | forecolor backcolor emoticons",
			image_advtab: true,
			templates: [
				{title: 'Test template 1', content: 'Test 1'},
				{title: 'Test template 2', content: 'Test 2'}
			]
		});
		</script>
	</head>
	<body>
		<?php include("nav.php");?>
		<div id="container" style="height: 980px;width: 80%;position: absolute;right: 0;">
			<form action="edit_news_action_update.php" method="post">
				<input type="hidden" value="<?php echo $id;?>" name="id">
				<input type="textbox" name="title"  placeholder="Заголовок теста" value="<?php echo $res['title'];?>">
				<textarea placeholder="Короткое описание" name="summary"><?php echo $res['summary'];?></textarea>
				<textarea placeholder="тест" class="article_add" name="full" novalidate><?php echo $res['full'];?></textarea>
				<textarea placeholder="тест" class="article_add" name="data_test" novalidate><?php echo $res['data_test'];?></textarea>
				<input type="submit" name="submit" value="Изменить тест">
			</form>
		</div>
	</body>
</html>