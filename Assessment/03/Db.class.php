<?php

class Db
{
    private static $instance = null;
    private static $host = 'localhost';
    private static $db   = 'project_assessment';
    private static $user = 'root';
    private static $pass = '';

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host='. self::$host.
                                    ';dbname='. self::$db,
                                    self::$user,
                                    self::$pass,
                                    $pdo_options);
        }
        return self::$instance;
    }
}
