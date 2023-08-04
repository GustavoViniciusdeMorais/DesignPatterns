<?php

namespace GustavoVinicius\Patterns\PubSub;

class Dispatcher
{
    protected $listeners = [];

    protected function __construct() {}

    /**
     * Implementation of a singleton
     */
    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new static();
        }
        return $instance;
    }

    public static function subscribe($object, $subscriber)
    {
        $instance = self::getInstance();
        $id = spl_object_hash($object);
        $instance->listeners[$id][] = $subscriber;
    }

    public static function publish($object)
    {
        $instance = self::getInstance();
        $id = spl_object_hash($object);
        $subscribers = $instance->listeners[$id];

        foreach ($subscribers as $subscriber) {
            $subscriber->doSomething();
        }
    }
}
