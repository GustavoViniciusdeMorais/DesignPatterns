<?php

namespace DesignPatterns\Singleton;

class SQLiteSingleton
{
    protected static $instance;
    protected static $connection = null;

    private function __construct($path = null)
    {
        if (empty($path)) {
            $path = 'singleton.db';
        }
        static::$connection = new \PDO("sqlite:".$path);
    }

    public static function getInstance($path = null)
    {
        if(static::$instance === null){
            static::$instance = new static($path);
        }
        return static::$instance;
    }

    public static function createDb()
    {
        static::$connection->exec(
            '
            CREATE TABLE IF NOT EXISTS projects (
                project_id   INTEGER PRIMARY KEY,
                project_name TEXT    NOT NULL
            );
            '
        );
    }

    public static function populateDb()
    {
        static::$connection->exec(
            "
            INSERT INTO projects (project_id, project_name) VALUES (1, 'test');
            "
        );
    }

    public static function readData()
    {
        return static::$connection->exec(
            "
            SELECT project_id, project_name FROM projects;
            "
        );
    }
}

$sqlConnection = SQLiteSingleton::getInstance();
$sqlConnection::createDb();
$sqlConnection::readData();
