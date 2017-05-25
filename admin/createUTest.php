<?php 
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: Authorization, Content-Type');
  exit;
}
header('Access-Control-Allow-Origin: *');

include("../config.php");
session_start();
$id = $_GET['id'];
$login = $_SESSION['login'];

 $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $user = $request->userTest;
//$user = $data;

 
//$user = json_decode(file_get_contents("php://userTest"));

if (file_exists('userSolution.js')) //проверяем, существует ли файл
{
$fp = fopen("userSolution.js","w");//если существуем, открываем файл
//записываем в переменную $user IP адрес и тип браузера (используем конкатенацию).
fwrite($fp, $user);//записываем в файл
fclose($fp);//закрываем файл.
echo $user;//выводим надпись
}
else
{
fopen("userSolution.js","w");//если файла info.txt не существует, создаем его

$fp = fopen("userSolution.js","w");//если существуем, открываем файл
//записываем в переменную $user IP адрес и тип браузера (используем конкатенацию).
fwrite($fp, $user);//записываем в файл
fclose($fp);//закрываем файл.
$user;//выводим надпись
}




?>