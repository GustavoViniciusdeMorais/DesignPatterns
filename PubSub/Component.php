<?php

namespace GustavoVinicius\Patterns\PubSub;

class Component
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function doSomething()
    {
        echo strtoupper($this->name)."\n";
    }
}
