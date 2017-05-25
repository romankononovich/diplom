<?php
	include("../config.php");
 session_start();
if($_SESSION['login'] AND $_SESSION['pass'])
	{
	$login = $_SESSION['login'];
	$password = $_SESSION['pass'];
	
    
    $result_org = mysql_query("SELECT login from org_user where login ='$login' ",$db);
    $r_org_panel = mysql_fetch_array($result_org);
    
    
     if(empty($r_org_panel['login']))
            {         
               echo "error";
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
	
		<div class="nav">
        
            <div class="nav_first"><h3>Одобренные тесты</h3></div>
	    	<div class="nav_item"><a href="../index.php">Глaвнaя страница</a></div>
	    	<div class="nav_item"> <a href="#" onclick="history.back();">Назад</a></div>
			<div class="nav_item"><a href="../action/exit">Выйти</a></div>
		</div> 
		<div id="container_full" style="width: 80%;position: absolute;right: 0;">
		<?php
   
           $result_kvest = mysql_query("SELECT*FROM kvest_map WHERE verify ='1' and name_creator ='$login' ",$db);
          
           
           while( $res = mysql_fetch_array($result_kvest))
				
			{
				echo '
				<div class="delete_news">
                    <div class="delete_title">Организатор-------'.$res['name_creator'].'</div>
					<div class="delete_title">'.$res['title'].'</div>
					<div class="delete_summary">'.$res['summary'].'</div>
					<div class="date">'.date('d-m-Y H:i:s',$res['date']).'</div>
					<a href="../full.php?id='.$res['id'].'" class="delete_news_link">Подробнее</a>
                    <form action="../admin/verify.php?id='.$res['id'].'" method="post">
                    <input type="submit" name="verify" value="Отменить">
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