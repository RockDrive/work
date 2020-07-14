<?php require_once('modules/function.php');

// ПОДКЛЮЧЕНИЕ МОДУЛЕЙ
$db = new DataBase("localhost", "root", "", "work"); // база данных
$request = new Request(); // get, post
$user = new Users();

// МЕНЮ
include ('menu.php');

//$result = $db::Delete('users', 'id=2');
//$result = $db::Add('users', ['login'=>'admin', 'email'=>'test2@site.com']);
//$db::Update('users', 'password="'.md5('test').'"', 'id=2');

$result = $db::Show('users');
mpr($result);