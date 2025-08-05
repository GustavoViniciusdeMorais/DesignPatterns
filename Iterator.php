<?php

namespace Gustavo\Api;

class Collection
{
    private static $instance;
    private array $data;

    private function __construct() {}

    public function __invoke(array $args)
    {
        foreach ($args as $arg) {
            array_push(self::$data, $arg);
        }

        return self::getInstance();
    }

    public static function getInstance()
    {
        if(static::$instance === null){
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function each(callable $fn)
    {

    }
}
