<form action="" method="POST">
    <input type="text" name="fio" value="<?= Request::$post['fio'] ?>" placeholder="ФИО">
    <input type="text" name="login" value="<?= Request::$post['login'] ?>" placeholder="Логин*">
    <input type="text" name="email" value="<?= Request::$post['email'] ?>" placeholder="E-Mail*">
    <input type="password" name="pass" value="<?= Request::$post['pass'] ?>" placeholder="Пароль*">
    <input type="hidden" name="set" value="reg">
    <button>Регистрация</button>
</form>