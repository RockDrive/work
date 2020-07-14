<?php


class Users
{
    static public $user_id;

    function __construct()
    {
        session_start();
        $this->Session();
    }

    private function Session($id = false)
    {
        $arSes = &$_SESSION['id'];
        if ($id) {
            $arSes = $id;
        }
        self::$user_id = $arSes;
    }

    public function LogOut()
    {
        unset($_SESSION['id']);
        self::$user_id = false;
    }

    private function EncryptionPass($pass)
    {
        $pass = md5($pass);
        return $pass;
    }

    public function Auth($login, $pass)
    {
        $pass = $this->EncryptionPass($pass);
        if ($user = DataBase::Show('users', 'login="' . $login . '" AND password="' . $pass . '"')) {
            $this->Session($user[0]['id']);
        } else {
            return 'Неправильный логин или пароль';
        }
    }

    public function Registration($login, $email, $pass, $fio)
    {
        // проверка заполнения всех обязательных полей
        if ($login && $email && $pass) {
            // проверка занятости логина
            if (!DataBase::Show('users', 'login="' . $login . '"')) {
                $params['fio'] = $fio;
                $params['login'] = $login;
                $params['email'] = $email;
                $params['password'] = $this->EncryptionPass($pass);
                $user_id = DataBase::Add('users', $params);
                $this->Session($user_id);
            } else {
                return 'Данный логин уже зарегистрирован';
            }
        } else {
            return 'Необходимо указать все поля';
        }
    }

    public function UserUpdate($params)
    {
        foreach ($params as $key => $value) {
            if ($value) {
                if ($set) {
                    $set .= ', ' . $key . '="' . $value . '"';
                } else {
                    $set = $key . '="' . $value . '"';
                }
            }
        }
        if ($set) {
            DataBase::Update('users', $set, 'id="' . self::$user_id . '"');
        }
    }
}