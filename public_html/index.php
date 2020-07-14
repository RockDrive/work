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


// повторяющийся E-Mail
$query = 'SELECT email FROM users GROUP BY email HAVING COUNT(email) > 1';
$result = $db::Select($query);
mpr($result);

// список пользователей, не сделавших заказ
$query = 'SELECT users.login FROM users LEFT JOIN orders ON users.id=orders.user_id WHERE orders.user_id IS NULL';
$result = $db::Select($query);
mpr($result);

// список пользователей, сделавших более 2-х заказов
$query = 'SELECT users.login FROM users LEFT JOIN orders ON users.id=orders.user_id GROUP BY users.login HAVING COUNT(orders.user_id) > 1';
$result = $db::Select($query);
mpr($result);