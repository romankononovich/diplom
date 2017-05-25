<?php
	include("../config.php");

    session_start();
	if($_SESSION['login'] AND $_SESSION['pass'])
	{
	$login = $_SESSION['login'];
	$password = $_SESSION['pass'];
	
    
    $result_org = mysql_query("SELECT login from org_user where login ='$login' ",$db);
	$r_org_panel = mysql_fetch_array($result_org);
    if(empty($r_org_panel['login'])){
        $result_admin = mysql_query("SELECT login from admin where login ='$login' ",$db);
        $r_admin = mysql_fetch_array($result_admin);
          $login= $r_admin['login'];
        $verify = 1;
    }
        else{
             $login= $r_org_panel['login'];
            $verify = 0;
        }
    
        
	function filter_data($var)
	{
		$var = mysql_real_escape_string($var);
		$var = htmlspecialchars($var);
		$var = trim($var);
		return $var;
	}
   
	$title = filter_data($_POST['title']);
	$summary = filter_data($_POST['summary']);
	$full = $_POST['full'];
    $data_test = $_POST['data_test'];
	$date = time();
    //$user_count=filter_data($_POST['user_count']);
    //$cost=filter_data($_POST['cost']);
    //$start_time=filter_data($_POST['start_time']);
    $complexity=filter_data($_POST['complexity']);
    //$help_one=filter_data($_POST['help_one']);
    //$help_two=filter_data($_POST['help_two']);
    $code=filter_data($_POST['code']);
	$q = mysql_query("INSERT INTO kvest_map SET title='$title',summary='$summary',full='$full',data_test='$data_test',           complexity='$complexity',date='$date',name_creator='$login', verify ='$verify'",$db) or die(mysql_error());
	if($q==true)
	{
       
		echo "<html><head><meta http-equiv='Refresh' content='0; URL=../'></head></html>";
	}
	else {
		echo 'error';

  
        echo mysql_errno($q) . ": " . mysql_error($q) . "\n";
        
	}
    }
?>










































