<?php
// автозагрузка классов
spl_autoload_register(function ($class_name) {
    require_once($class_name . '.php');
});

// вспомогательная функция для проверки массивов
function mpr( $array ) {
    echo '<pre>';
        print_r($array);
    echo '</pre>';
}