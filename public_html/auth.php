<form action="" method="POST">
    <input type="text" name="login" value="<?= Request::$post['login'] ?>">
    <input type="password" name="pass" value="<?= Request::$post['pass'] ?>">
    <input type="hidden" name="set" value="auth">
    <button>Вход</button>
</form>