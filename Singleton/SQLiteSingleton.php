<?php

namespace DesignPatterns\Singleton;

class SQLiteSingleton
{
    private static $instance;
    private $connection = null;

    public function __construct($path)
    {
        $this->connection = new \PDO("sqlite:".$path);
    }

    public static function getInstance($path)
    {
        if(self::$instance === null){
            self::$instance = new SQLiteSingleton($path);
        }
        return self::$instance;
    }
}