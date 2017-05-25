<?php
	include("../config.php");
 session_start();
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
	    	<div class="nav_item"><a href="../admin_site.php">Кабинет</a></div>
			<div class="nav_item"><a href="../admin/ok.php">Одобренные тесты</a></div>
	
			<div class="nav_item"><a href="../action/exit">Выйти</a></div>
		</div> 
		<div id="container_full" style="width: 80%;position: absolute;right: 0;">
		<?php
   


if($_SESSION['login'] AND $_SESSION['pass'])
	{
	$login = $_SESSION['login'];
	$password = $_SESSION['pass'];
	
    
    $result_org = mysql_query("SELECT login from org_user where login ='$login' ",$db);
    $r_org_panel = mysql_fetch_array($result_org);
    
   if(empty($r_org_panel['login']))
            {         
                $result_admin = mysql_query("SELECT login from admin where login ='$login' ",$db);
                $r_admin_panel = mysql_fetch_array($result_admin);
           if(empty($r_admin_panel['login'])){
               echo "error";
           }
       else{
           $result_kvest = mysql_query("SELECT*FROM kvest_map WHERE verify ='1' ",$db);
          
           
           while( $res = mysql_fetch_array($result_kvest))
				
			{
				echo '
				<div class="delete_news">
                    <div class="delete_title">Организатор-------'.$res['name_creator'].'</div>
					<div class="delete_title">'.$res['title'].'</div>
					<div class="delete_summary">'.$res['summary'].'</div>
					<div class="date">'.date('d-m-Y H:i:s',$res['date']).'</div>
					<a href="../full.php?id='.$res['id'].'" class="delete_news_link">Подробнее</a>
                   
				</div>
				';
			}
       }
        
       
     
       }
       else
       {
           echo '
    <div class="navigation" style="float: right; width: 150px;">
			<div class="nav_item"><a href="org_site"> Здравствуйте организатор '.$r_org_panel['login'].'</a> </div>
			
			<div class="nav_item"><a href="action/exit.php">Выход</a></div>
		</div>
    
    ';}
   }
else{
    echo "Sorry";
}
    

        ?>
        	</div>
	</body>
</html>