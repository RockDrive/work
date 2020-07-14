<?php

// изменение данных
if(Request::$post['set'] == 'update') {
    $params['fio'] = Request::$post['fio'];
    $params['pass'] = Request::$post['pass'];
    $user->UserUpdate($params);
}

// получение данных пользователя
$users = $db::Show('users', 'id="' . $user::$user_id . '"');
$user = $users[0];
?>

<form action="" method="POST">
    <input type="text" name="fio" value="<?= $user['fio'] ?>" placeholder="ФИО">
    <input type="password" name="pass" value="" placeholder="Новый пароль">
    <input type="hidden" name="set" value="update">
    <button>Изменить</button>
</form>