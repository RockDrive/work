<ul>
    <li>
        <a href="/">Главная</a>
    </li>
    <li>
        <a href="/cabinet.php">Личный кабинет</a>
    </li>
    <? if (Users::$user_id) { ?>
        <li>
            <a href="/cabinet.php?logout=y">Выйти</a>
        </li>
    <? } else { ?>
        <li>
            <a href="/cabinet.php?method=reg">Регистрация</a>
        </li>
    <? } ?>
</ul>
<hr>