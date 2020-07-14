<?php require_once('modules/function.php');

// ПОДКЛЮЧЕНИЕ МОДУЛЕЙ
$db = new DataBase("localhost", "root", "", "work"); // база данных
$request = new Request(); // get, post