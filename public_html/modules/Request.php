<?php


class Request
{
    static public $get;
    static public $post;

    public function __construct()
    {
        // можно поставить фильтры от инъекций
        self::$get = $_GET;
        self::$post = $_POST;

        // объединение get и post (get приоритет)
        $all = array_merge(self::$post, self::$get);

        return $all;
    }
}