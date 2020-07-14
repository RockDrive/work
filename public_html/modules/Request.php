<?php


class Request
{
    static public $get;
    static public $post;
    static public $all;

    public function __construct()
    {
        // можно поставить фильтры от инъекций
        self::$get = $_GET;
        self::$post = $_POST;

        // объединение get и post (get приоритет)
        self::$all = array_merge(self::$post, self::$get);
    }
}