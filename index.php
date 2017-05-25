<?php
  //$dir_name = str_replace('\\','/',dirname(__FILE__));
    //define('ROOT',$dir_name);
    
	include("config.php");
  

	mb_internal_encoding("UTF-8");
	
	function return_substr($s)
	{
		return mb_substr($s,0,300);
	}
session_start();


if( $_SESSION['pass'])
	{
	$login = $_SESSION['login'];
	$password = $_SESSION['pass'];
	
    
    $result_user = mysql_query("SELECT name, login from users where login ='$login' ",$db);
	$r_user_panel = mysql_fetch_array($result_user);
    
   if (empty($r_user_panel['login']))
   {
        $result_org = mysql_query("SELECT login from org_user where login ='$login' ",$db);
	    $r_org_panel = mysql_fetch_array($result_org);
            if(empty($r_org_panel['login']))
            {
                $result_admin = mysql_query("SELECT login from admin where login ='$login' ",$db);
                $r_admin_panel = mysql_fetch_array($result_admin);
            echo '
    <div class="navigation" style="float: right; width: 150px;">
			<div class="nav_item"><a href="admin_site"> Здравствуйте administrator '.$r_admin_panel['login'].'</a> </div>
			
			<div class="nav_item"><a href="action/exit.php">Выход</a></div>
		</div>
    
    ';
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
       
    echo '
    <div class="navigation" style="float: right; width: 150px;">
			<div class="nav_item"><a href="user_site"> Здравствуйте '.$r_user_panel['name'].'</a> </div>
			
			<div class="nav_item"><a href="action/exit.php">Выход</a></div>
		</div>
    
    ';
    }
       
      
       
}
else {
    echo '<div>
				    <div class="my">
                    <button class="btn btn-success"> <a href="my_sign.php">Вход</a></div></button>
                    
                    
				    
				
		
				</div>';
}

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js">
        </script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src="js/bootstrap.min.js">
        </script>
    </head>

    <body>
        <a href="/" style="text-decoration:none;">
            <div id="header"> <img src="img/jsLogo.png" alt="" style="width:100px; height:100px; "> JS Тестирование </div>
        </a>
        <!--	<div class="navigation_two">
			<div class="nav_item"><a href="index">Главная</a></div>
			<div class="nav_item"><a href="unity3d">Пешеходные</a></div>
			<div class="nav_item"><a href="php">Велосипедные</a></div>
			<div class="nav_item"><a href="html_css">Автомобильные</a></div>
		</div>
	-->
        <div id="container" style="margin-top:1%;">
            <div class="row">
               
                <?php

			$on_page = 9;
			$num_pages = ceil((mysql_num_rows(mysql_query("SELECT id FROM kvest_map")))/$on_page);
			$current_page = isset($_GET['page'])? intval($_GET['page']): 1;
			if($current_page < 1)
				$current_page = 1;
			if($current_page > $num_pages)
				$current_page = $num_pages;
			$start_from = ($current_page - 1) * $on_page;
			$query = mysql_query("SELECT * FROM kvest_map where verify='1' ORDER BY DATE DESC LIMIT $start_from, $on_page",$db);
			if(!mysql_num_rows($query)) echo '<h1>тут пусто(...</h1>';
			else {
				while($res = mysql_fetch_array($query))
				{
							echo '<div class="article">
								<div class="top_block">
									<div class="title">'.$res['title'].'</div>
									<div class="summary">'.return_substr($res['summary']).'...</div>
								</div>
								<div >
									<div class="date"> Дата публикации '.date('d-m-Y H:i:s',$res['date']).'</div>
									<div class="more">
										<a OnClick="a();" href="full?id='.$res['id'].'">Подробнее...</a>
									</div>
								</div>
							</div>';
				}
				echo '<div class="nav_page">';
				for ($page = 1; $page <= $num_pages; $page++)
				{
					if ($page == $current_page)
					{
						echo '<strong>'.$page.'</strong> &nbsp;';
					}
					else
					{
						echo '<a href="/?page='.$page.'">'.$page.'</a> &nbsp;';
					}
				}
				echo '</div>';
			}
			?>
            </div>
        </div>
        <script language="javascript">
            function a() {
                window.location.reload(true);
            }
        </script>
        <div class="admin_panel_link"> <a href="admin_site">Admin Site</a> </div>
    </body>

    </html>