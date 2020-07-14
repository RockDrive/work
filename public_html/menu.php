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
    <? } ?>
</ul>
<hr>