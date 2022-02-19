<?php

namespace DesignPatterns\BetterCommandExample;

require './Lib/MySimpleORM.php';

use DesignPatterns\Lib\ORM\Model;

abstract class Command
{
    private $data;
    abstract public function execute();
    public function withData($data)
    {
        $this->data = $data;
    }
}

class SaveProductCommand extends Command
{
    public function execute()
    {
        $product = new Product();
        return $product->save($this->data);
    }
}

class GetProductsCommand extends Command
{
    public function execute()
    {
        $product = new Product();
        return $product->all();
    }
}

class Product extends Model
{
    protected $table = "products";
    protected $attributes = ['name', 'price'];
}

class Invoker
{
    private $command;

    public function setCommand($command)
    {
        $this->command = $command;
    }

    public function executeCommand($data = null)
    {
        $this->command->withData($data);
        return $this->command->execute();
    }
}