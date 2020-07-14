<?php require_once('modules/function.php');

// ПОДКЛЮЧЕНИЕ МОДУЛЕЙ
$db = new DataBase("localhost", "root", "", "work"); // база данных
$request = new Request(); // get, post
$user = new Users(); // пользователь

// выход
if(Request::$get['logout'] == 'y') {
    $user::LogOut();
    header('Location: cabinet.php');
}

// функционал авторизации и регистрации
if (!$user::$user_id) {

    // авторизация
    if (Request::$post['set'] == 'auth') {
        $error = $user->Auth(
            Request::$post['login'],
            Request::$post['pass']
        );
    }

    // регистрация
    if (Request::$post['set'] == 'reg') {
        $error = $user->Registration(
            Request::$post['login'],
            Request::$post['email'],
            Request::$post['pass'],
            Request::$post['fio']
        );
    }

    // вывод ошибки
    echo $error;
}

// МЕНЮ
include ('menu.php');

// страницы регистрации и авторизации
if (!$user::$user_id) {
    // регистрация
    if (Request::$get['method'] == 'reg') {
        include('reg.php');
    } else { // авторизация
        include('auth.php');
    }
}

// личный кабинет
if ($user::$user_id) {
    include('account.php');
}