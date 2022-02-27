<?php

namespace DesignPatterns\Factory;

use DesignPatterns\Singleton\SQLiteSingleton;

class SQLiteFactory
{
    public function createConnection($path)
    {
        return new SQLiteSingleton($path);
    }
}