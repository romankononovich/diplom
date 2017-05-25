<?php 
include("config.php");
session_start();
$id = $_GET['id'];
$login = $_SESSION['login'];
$password = $_SESSION['pass'];

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <meta charset="UTF-8" http-equiv="Pragma" content="no-cache" />
        <title></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="/Qunit/qunit-2.0.1.css">
       
        <style>
            [ng\:cloak],
            [ng-cloak],
            [data-ng-cloak],
            [x-ng-cloak],
            .ng-cloak,
            .x- ng-cloak {
                display: none !important;
            }
        </style>
    </head>

    <body ng-cloak ng-app="DiplomApp" ng-controller="bufer">
        <div id="container_full">
            <a href="index">
                <div> <img src="img/jsLogo.png"> </div>
            </a>
            <?php   
            	
            
                    $q = mysql_query("SELECT * FROM kvest_map WHERE id='$id'",$db);
				    $res = mysql_fetch_array($q);

                            
	
    
                            $result_admin = mysql_query("SELECT login from admin where login ='$login' ",$db);
                            $r_admin_panel = mysql_fetch_array($result_admin);
                                if(empty($r_admin_panel['login']))
                                    {
	                                   $result_user = mysql_query("SELECT name, login from users where login ='$login' ",$db);
                                        $r_user_panel = mysql_fetch_array($result_user);
    
                   
				   
                      
                    if (empty($r_user_panel['login']))
                            {                 
				echo '
                
				<div class="title_full">'.$res['title'].'</div>
           
				<div class="full">'.$res['full'].'</div>
           
                <div class="full">Сложность '.$res['complexity'].'</div>
              
				
				<div class="date"> Дата публикации '.date('d-m-Y H:i:s',$res['date']).'</div>
				';
                    }           
                    else{
                            $res_user = mysql_query("SELECT * from user_game where id_kvest='$id' and login='$login' ",$db);
                            $r_u = mysql_fetch_array($res_user);
              
                       
				echo '
				<div class="delete_news">
                   <div class="title_full">'.$res['title'].'</div>
               
				<div class="full">'.$res['full'].'</div>
                
                <div class="full">Сложность '.$res['complexity'].'</div>
              
              
				
				<div class="date"> Дата публикации '.date('d-m-Y H:i:s',$res['date']).'</div>
                    
                    
				</div>
				';
			
                        
                    }
                                }
            else{
                $res_count = mysql_query("SELECT count(id_kvest) from user_game where id_kvest='$id' ",$db);
                            $r_c = mysql_fetch_array($res_count);
                  echo '<div class="full">Количество зарегистрированных '.$r_c[0].'</div>';
                
                echo '
				<div class="delete_news">
                   <div class="title_full">'.$res['title'].'</div>
              
				<div class="full">'.$res['full'].'</div>
               
                <div class="full">Сложность '.$res['complexity'].'</div>

                <div class="full">Стоимость '.$res['cost'].'</div>
				
				<div class="date"> Дата публикации '.date('d-m-Y H:i:s',$res['date']).'</div>
                    
                    <form action="../admin/verify.php?id='.$res['id'].'" method="post">
                    <input type="submit" name="verify" value="Одобрить">
                    <input type="submit" name="verify" value="Отменить">
                    
				</div>
				';
                
                
            }
                        
                
			?>
                <textarea id="myArea" ng-model="areaMain"></textarea>
                <!--                <button type="button" id="button1">Отправить запрос</button>-->
<!--
                <div id="qunit"></div>
                <div id="qunit-fixture"></div>
-->
                
<!--                <h2 id="qunit-userAgent"></h2>-->
  <ol id="qunit-tests">
  </ol>
                
                
                
                <p>
                    <input type="submit" id="button1" value="Проверить" name="verify" ng-click="sendTest()"> </p>
               
        </div>
        <?php
            
        $result_test = mysql_query("SELECT data_test from kvest_map WHERE id='$id'",$db);
        $r_test = mysql_fetch_array($result_test);
        
        
        
if (file_exists('Tests/test1.js')) //проверяем, существует ли файл
{
$fp = fopen("Tests/test1.js","w");//если существуем, открываем файл

fwrite($fp, $r_test['data_test']);//записываем в файл
fclose($fp);//закрываем файл.
echo 'sdsd' .'222'.$user;//выводим надпись
}
else
{
fopen("Tests/test1.js","w");//если файла info.txt не существует, создаем его
$fp = fopen("Tests/test1.js","w");//если существуем, открываем файл

fwrite($fp, $r_test['data_test']);//записываем в файл
fclose($fp);
}
        
        ?>
           
                      
           
           
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        
        <script src="/Sinon/sinon-1.17.6.js"></script>
        <script src="/Qunit/qunit.js"></script>
           
           
           
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>
            <script src="js/app.js"></script>
    </body>

    </html>