<?php
include("../config.php");
	session_start();

	if($_SESSION['login'] AND $_SESSION['pass'])
	{
	$login = $_SESSION['login'];
	$password = $_SESSION['pass'];
	
    
    $result_org = mysql_query("SELECT login from org_user where login ='$login' ",$db);
	$r_org_panel = mysql_fetch_array($result_org);
  
    $result_admin = mysql_query("SELECT login from admin where login ='$login' ",$db);
    $r_admin = mysql_fetch_array($result_admin);
        
      if($r_admin==true or $r_org_panel==true) 
      {
            
        
    
            
            
        

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
			<form action="add_news_action.php" method="post" novalidate>
				<input type="textbox" name="title" required placeholder="Заголовок теста">
				<textarea  placeholder="Короткое описание" name="summary"></textarea>
				Полное описание теста
				<textarea placeholder="тест" class="article_add" name="full"></textarea>
				Напишите юнит-тест
				<textarea placeholder="тест" class="article_add" name="data_test"></textarea>
				
				
<!--				<input type="textbox" name="user_count" required placeholder="Количество участников">-->
<!--
				<input type="textbox" name="cost" required placeholder="Стоимость">
				<input type="textbox" name="start_time" required placeholder="Время проведения">
-->
				<input type="textbox" name="complexity" required placeholder="Сложность">
<!--
				<input type="textbox" name="help_one" required placeholder="Подсказка 1">
				<input type="textbox" name="help_two" required placeholder="Подсказка 2">
				<input type="textbox" name="code"  placeholder="Код">
-->
				
				
				
				<input type="submit" name="submit" value="Добавить тест">
			</form>
		</div>
	</body>
</html>
<?php 
        }
        else{
             echo "error>";
        }
    }
else{
     echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";
}
?>