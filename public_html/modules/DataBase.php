<?php


class DataBase
{
    static private $mysqli;

    // подключение бд
    function __construct($host, $user, $pass, $db)
    {
        self::$mysqli = new mysqli($host, $user, $pass, $db);
    }

    // вывести
    static public function Show($table, $where = false)
    {
        // формирование запроса
        $query = "SELECT * FROM `" . $table . "`";
        if ($where)
            $query .= " WHERE " . $where;

        // получение результата
        if ($stmt = self::$mysqli->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    // изменить
    static public function Update($table, $set, $where)
    {
        // формирование запроса
        $query = "UPDATE " . $table . " SET " . $set . " WHERE " . $where;

        // отправка запроса
        self::$mysqli->query($query);
    }

    // добавить
    static public function Add($table, $arItem)
    {
        // формирование запроса
        $key = implode("`, `", array_keys($arItem));
        $value = implode("', '", $arItem);
        $query = "INSERT INTO `" . $table . "` (`" . $key . "`) VALUES ('" . $value . "');";

        // отправка запроса
        self::$mysqli->query($query);
        return self::$mysqli->insert_id;
    }

    // удалить
    static public function Delete($table, $where)
    {
        // формирование запроса
        $query = "DELETE FROM " . $table . " WHERE " . $where;

        // отправка запроса
        self::$mysqli->query($query);
    }

}