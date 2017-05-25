<?php
	include("../config.php");

    session_start();
	if($_SESSION['login'] AND $_SESSION['pass'])
	{
	$login = $_SESSION['login'];
	$password = $_SESSION['pass'];
	
        $result_admin = mysql_query("SELECT login from admin where login ='$login' ",$db);
        $r_admin = mysql_fetch_array($result_admin);
        $login= $r_admin['login'];
    }
       
	function filter_data($var)
	{
		$var = mysql_real_escape_string($var);
		$var = htmlspecialchars($var);
		$var = trim($var);
		return $var;
	}
$id = filter_data($_GET['id']);
   switch ($_POST['verify'])
    {
      
        case 'Одобрить' :
            $q = @mysql_query("UPDATE kvest_map SET verify='1' WHERE id='$id' ",$db);
            $r = @mysql_fetch_array($q);
            	if($q==true)
	               {
		              echo "<html><head><meta http-equiv='Refresh' content='0; URL=../org/org_kvest.php'></head></html>";
	               }
                else {
                    echo 1;
		              mysql_error();
	                   }
        break;
       
       case 'Отменить' :
            $q = mysql_query("UPDATE kvest_map SET verify='0' WHERE id='$id' ",$db);
            $r = mysql_fetch_array($q);
           	    if($q==true)
	               {
		              echo "<html><head><meta http-equiv='Refresh' content='0; URL=../admin/ok.php'></head></html>";
                    }
                    else {
                        mysql_error();
	                       }
        break;
     
        
    }



    
?>